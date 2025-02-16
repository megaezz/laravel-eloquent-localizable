# LaravelEloquentLocalizable

A simple trait for making Eloquent models localizable in Laravel. This trait allows you to easily manage model attributes in different languages by using the current locale or a fallback locale.

## Installation

1. Install the package via Composer:

```bash
composer require megaezz/laravel-eloquent-localizable
```

2. Apply the Localizable trait to your Eloquent model:

```
use Megaezz\LaravelEloquentLocalizable\Localizable;

class Article extends Model
{
    use Localizable;

    protected $localizable = ['title', 'description'];
    // Optionally, specify fallback locale, or the one defined in app.locale will be used.
    protected $fallback_locale = 'en';
}
```

## Make sure your database table contains the necessary fields for each localized attribute. For example:
	•	title_en, title_ru
	•	description_en, description_ru

## Retrieving Localized Attributes
Once the trait is applied, you can access the localizable attributes like usual. The value returned will be based on the current locale of the application:

```
$article->title; // Will return the title based on the current locale or fallback value
$article->description; // Will return the description based on the current locale or fallback value
```