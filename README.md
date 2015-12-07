# PolyFAQ - Simple FAQ Provider for your Laravel 5 Application

## Installation

Install with composer.

```php
composer require websight/l5-polyfaq
```

Add the ServiceProvider to your ``app/config/app.php``

```php
Websight\Polyfaq\PolyfaqServiceProvider::class,
```

Install the config.

```
php artisan vendor:publish --provider="Websight\Polyfaq\PolyfaqServiceProvider" --tag="config"
```

Install the migrations.

```
php artisan vendor:publish --provider="Websight\Polyfaq\PolyfaqServiceProvider" --tag="migrations"
```

Run the migrations.

```
php artisan migrate
```

## Usage

There's basically three ways to use this package with your own model classes.

### 1. Include a trait

This is the easiest solution. Simply ``use`` the trait.

```php

use Websight\Polyfaq\FaqTrait;

class MyModel extends Model {

    use FaqTrait;
    
}
```

That way, you can use ``$model->faqs`` to retrieve the collection of associated FAQs.

### 2. Make your own Polymorphic relation

If you don't like the field name ``faqs``, you can also mix your own [polymorphic relationship](http://laravel.com/docs/5.1/eloquent-relationships#polymorphic-relations)

```php
class MyModel extends Model {

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function coolfaqs()
    {
        return $this->morphMany('Websight\Polyfaq\Faq', 'faqable');
    }

}
```

That way, you would access them through ``$model->coolfaqs``.

### 3. Use a many to many relationship

_to be done_

## Customization

You can make this package your own.

### Views

The views of this package are referenced via ``polyfaq::`` prefix, described in the [documentation](http://laravel.com/docs/5.1/packages#views).

If you need to override a template, you will need to place it in ``resources/views/vendor/polyfaq/$templatename.blade.php``.

### Language strings

The language files of this package are also referenced with the ``polyfaq::`` prefix.

You can publish the translations as well, if you need to.

```
php artisan vendor:publish --provider="Websight\Polyfaq\PolyfaqServiceProvider" --tag="translations"
```

## License

The MIT License (MIT)

Copyright (c) 2015 

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.

