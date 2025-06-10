<?php

namespace App\Traits;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

trait HasTranslationsWithFallback
{
    /**
     * Get translated attribute with fallback to default language
     */
    public function getTranslationWithFallback(string $key, ?string $locale = null, bool $returnFallbackInfo = false)
    {
        $locale = $locale ?? app()->getLocale();
        $defaultLocale = Config::get('cms.default_language', 'en');

        // First try requested locale
        $value = $this->getTranslation($key, $locale);

        if ($value !== null && $value !== '') {
            if ($returnFallbackInfo) {
                return [
                    'value' => $value,
                    'locale' => $locale,
                    'is_fallback' => false,
                    'original_locale' => $locale,
                ];
            }
            return $value;
        }

        // Fallback to default language if different
        if ($locale !== $defaultLocale) {
            $value = $this->getTranslation($key, $defaultLocale);

            if ($value !== null && $value !== '') {
                if ($returnFallbackInfo) {
                    return [
                        'value' => $value,
                        'locale' => $defaultLocale,
                        'is_fallback' => true,
                        'original_locale' => $locale,
                    ];
                }
                return $value;
            }
        }

        return $returnFallbackInfo ? [
            'value' => null,
            'locale' => null,
            'is_fallback' => false,
            'original_locale' => $locale,
        ] : null;
    }

    /**
     * Get translated slug with fallback support
     */
    public function getSlugWithFallback(?string $locale = null)
    {
        return $this->getTranslationWithFallback('slug', $locale);
    }

    /**
     * Check if content has translation for given locale
     */
    public function hasTranslation(string $key, ?string $locale = null): bool
    {
        $locale = $locale ?? app()->getLocale();
        $value = $this->getTranslation($key, $locale);
        return $value !== null && $value !== '';
    }

    /**
     * Check if content is fully translated
     */
    public function isFullyTranslated(?string $locale = null, array $requiredFields = ['title', 'slug']): bool
    {
        $locale = $locale ?? app()->getLocale();

        foreach ($requiredFields as $field) {
            if (!$this->hasTranslation($field, $locale)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Get translation status for all fields
     */
    public function getTranslationStatus(?string $locale = null): array
    {
        $locale = $locale ?? app()->getLocale();
        $defaultLocale = Config::get('cms.default_language', 'en');
        $translatableFields = $this->translatable ?? [];
        $status = [];

        foreach ($translatableFields as $field) {
            $hasTranslation = $this->hasTranslation($field, $locale);
            $fallbackValue = null;
            $usedFallback = false;

            if (!$hasTranslation && $locale !== $defaultLocale) {
                $fallbackValue = $this->getTranslation($field, $defaultLocale);
                $usedFallback = $fallbackValue !== null && $fallbackValue !== '';
            }

            $status[$field] = [
                'has_translation' => $hasTranslation,
                'used_fallback' => $usedFallback,
                'fallback_locale' => $usedFallback ? $defaultLocale : null,
                'value' => $hasTranslation ? $this->getTranslation($field, $locale) : $fallbackValue,
            ];
        }

        return $status;
    }

    /**
     * Scope to find by slug with fallback support
     */
    public function scopeWhereSlugWithFallback($query, string $slug, ?string $locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        $defaultLocale = Config::get('cms.default_language', 'en');

        if ($locale === $defaultLocale) {
            // If requesting default language, only check default language
            return $query->whereJsonContains("slug->{$defaultLocale}", $slug);
        }

        // Check both requested locale and default locale
        return $query->where(function ($q) use ($slug, $locale, $defaultLocale) {
            $q->whereJsonContains("slug->{$locale}", $slug)
                ->orWhereJsonContains("slug->{$defaultLocale}", $slug);
        });
    }

    /**
     * Get the URL slug for the current locale with fallback
     */
    public function getLocalizedSlug(?string $locale = null): string
    {
        $slug = $this->getSlugWithFallback($locale);
        return $slug ?: Str::slug($this->getTranslationWithFallback('title', $locale) ?: 'untitled');
    }

    /**
     * Check if this content is using a fallback slug for the given locale
     */
    public function isUsingFallbackSlug(?string $locale = null): bool
    {
        $locale = $locale ?? app()->getLocale();
        $defaultLocale = Config::get('cms.default_language', 'en');

        if ($locale === $defaultLocale) {
            return false;
        }

        return !$this->hasTranslation('slug', $locale) && $this->hasTranslation('slug', $defaultLocale);
    }
}