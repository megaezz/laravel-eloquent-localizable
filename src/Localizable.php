<?php

namespace Megaezz\LaravelEloquentLocalizable;

use Illuminate\Support\Facades\App;

trait Localizable
{
    /**
     * Retrieve the value of a localizable attribute based on the current locale.
     *
     * @param  string  $attribute
     * @return mixed
     */
    public function __get($attribute)
    {
        // Check if the attribute is in the list of localizable attributes
        if (property_exists($this, 'localizable') and in_array($attribute, $this->localizable)) {
            // Determine the current locale and fallback
            $locale = App::getLocale();
            $localeSpecificAttribute = $attribute . '_' . $locale;
            $localeDefaultAttribute = $attribute . '_' . $this->getFallbackLocale();

            // Return the localized value or fallback or parent
            return $this->{$localeSpecificAttribute} ?? $this->{$localeDefaultAttribute} ?? parent::__get($attribute);
        }

        // Default behavior for non-localizable attributes
        return parent::__get($attribute);
    }

    public function getFallbackLocale()
    {
        return $this->fallback_locale ?? config('app.locale');
    }
}
