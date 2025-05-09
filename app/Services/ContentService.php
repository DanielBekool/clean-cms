<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use App\Enums\ContentStatus;

class ContentService
{
    /**
     * Find published content by slug and language.
     *
     * @param string $modelClass The fully qualified class name of the model.
     * @param string $lang The language code.
     * @param string $contentSlug The slug of the content.
     * @return Model|null The found content model, or null if not found.
     */
    public function findPublishedContentBySlug(string $modelClass, string $lang, string $contentSlug): ?Model
    {
        if (!class_exists($modelClass) || !is_subclass_of($modelClass, Model::class)) {
            // Log an error or throw an exception if the model class is invalid
            // For now, returning null
            return null;
        }

        return $modelClass::whereJsonContains('slug->' . $lang, $contentSlug)
            ->where('status', ContentStatus::Published)
            ->first(); // Using first() instead of firstOrFail() to allow handling not found outside the service
    }

    /**
     * Find published content by slug and language, or fail.
     *
     * @param string $modelClass The fully qualified class name of the model.
     * @param string $lang The language code.
     * @param string $contentSlug The slug of the content.
     * @return Model The found content model.
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findPublishedContentBySlugOrFail(string $modelClass, string $lang, string $contentSlug): Model
    {
        if (!class_exists($modelClass) || !is_subclass_of($modelClass, Model::class)) {
            // Log an error or throw an exception if the model class is invalid
            throw new \InvalidArgumentException("Invalid model class provided: {$modelClass}");
        }

        return $modelClass::whereJsonContains('slug->' . $lang, $contentSlug)
            ->where('status', ContentStatus::Published)
            ->firstOrFail();
    }
}