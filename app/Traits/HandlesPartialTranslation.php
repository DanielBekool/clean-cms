<?php

namespace App\Traits;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;

/**
 * Trait HandlesPartialTranslation
 *
 * Extends default Spatie translatable behavior to support "partial" translations
 * with a deep, multi-stage, and prioritized fallback mechanism.
 *
 * This trait is self-contained and does not require other custom traits.
 *
 * IMPORTANT: This trait should be used on models that also use:
 * - Spatie\Translatable\HasTranslations
 */
trait HandlesPartialTranslation
{
    /**
     * Get a translated field with a deep, automatic, and prioritized fallback.
     *
     * @param string $field The field name to get a translation for.
     * @param string|null $locale The locale to get a translation for (defaults to current app locale).
     * @return mixed The translated value or the best available fallback.
     */
    public function getTranslatedField(string $field, ?string $locale = null): mixed
    {
        $locale = $locale ?? App::getLocale();
        $defaultLanguage = Config::get('cms.default_language', 'en');

        if (!method_exists($this, 'getTranslations')) {
            return $this->{$field} ?? null;
        }

        $allTranslations = $this->getTranslations($field);

        // Priority 1: Check the requested locale.
        if (isset($allTranslations[$locale]) && $this->isContentFilled($allTranslations[$locale])) {
            return $allTranslations[$locale];
        }

        // Priority 2: Check the default language if it's different from the requested one.
        if ($locale !== $defaultLanguage) {
            if (isset($allTranslations[$defaultLanguage]) && $this->isContentFilled($allTranslations[$defaultLanguage])) {
                return $allTranslations[$defaultLanguage];
            }
        }

        // Priority 3: Find the first available translation in any other language.
        foreach ($allTranslations as $langCode => $value) {
            // Skip locales we've already checked.
            if ($langCode === $locale || $langCode === $defaultLanguage) {
                continue;
            }
            if ($this->isContentFilled($value)) {
                return $value;
            }
        }

        return null; // Return null if no content is found in any language.
    }

    /**
     * Helper function to determine if a translated value has actual content.
     */
    private function isContentFilled($value): bool
    {
        return !empty($value) && $value !== 'null' && trim(strip_tags($value)) !== '';
    }

    /**
     * Override the default Eloquent attribute getter.
     *
     * This makes the partial fallback behavior seamless. When you access a property
     * like `$model->title`, this method intercepts the call and uses the
     * `getTranslatedField` logic if the attribute is translatable.
     *
     * @param string $key The attribute key.
     * @return mixed The attribute value.
     */
    public function getAttribute($key)
    {
        // If the attribute is translatable, use our custom getter.
        if (method_exists($this, 'isTranslatableAttribute') && $this->isTranslatableAttribute($key)) {
            return $this->getTranslatedField($key);
        }

        // For non-translatable attributes, use the default Eloquent behavior.
        return parent::getAttribute($key);
    }

    /**
     * Check if the model has a partial translation for a given locale.
     *
     * A translation is considered partial if at least one translatable
     * attribute is missing a value for the specified locale.
     *
     * @param string|null $locale The locale to check (defaults to current app locale).
     * @return bool True if the translation is partial.
     */
    public function isPartialTranslation(?string $locale = null): bool
    {
        $locale = $locale ?? App::getLocale();

        if (!method_exists($this, 'getTranslatableAttributes')) {
            return false;
        }

        // A translation is partial if any of its fields are effectively empty in the requested locale.
        foreach ($this->getTranslatableAttributes() as $field) {
            $value = $this->getTranslation($field, $locale, false); // Check raw value
            if (!$this->isContentFilled($value)) {
                return true; // Found a field that needs to fall back.
            }
        }

        return false;
    }

    /**
     * Get an array of field names that are falling back.
     *
     * @param string|null $locale The locale to check (defaults to current app locale).
     * @return array A list of field names.
     */
    public function getFallbackFields(?string $locale = null): array
    {
        $locale = $locale ?? App::getLocale();
        $fallbackFields = [];

        if (!method_exists($this, 'getTranslatableAttributes')) {
            return [];
        }

        foreach ($this->getTranslatableAttributes() as $field) {
            $value = $this->getTranslation($field, $locale, false);
            if (!$this->isContentFilled($value)) {
                $fallbackFields[] = $field;
            }
        }

        return $fallbackFields;
    }
}