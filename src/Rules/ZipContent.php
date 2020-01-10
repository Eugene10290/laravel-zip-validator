<?php

namespace Orkhanahmadov\ZipValidator\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Orkhanahmadov\ZipValidator\Exceptions\ZipException;

class ZipContent implements Rule
{
    /**
     * @var Collection
     */
    private $files;
    /**
     * @var Collection
     */
    private $failedFiles;

    /**
     * Create a new rule instance.
     *
     * @param array|string $files
     */
    public function __construct($files)
    {
        $this->files = is_array($files) ? collect($files) : collect(func_get_args());
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param UploadedFile $zip
     * @return bool
     */
    public function passes($attribute, $zip): bool
    {
        $content = $this->readContent($zip);

        $this->failedFiles = $this->files->reject(function ($file) use ($content) {
            return $content->contains($file);
        });

        return ! $this->failedFiles->count();
    }

    /**
     * Reads ZIP file content and returns collection with result.
     *
     * @param UploadedFile $value
     * @return Collection
     */
    private function readContent(UploadedFile $value): Collection
    {
        $zip = zip_open($value->path());

        throw_unless(!is_int($zip), new ZipException($zip));

        $content = collect();
        while ($file = zip_read($zip)) {
            $content->add(zip_entry_name($file));
        }

        zip_close($zip);

        return $content;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return __('zipValidator::messages.not_found', [
            'files' => $this->failedFiles->implode(', '),
        ]);
    }
}
