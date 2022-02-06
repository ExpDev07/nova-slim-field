<h1>
    Nova Slim Field
</h1>

[![Latest Stable Version](http://poser.pugx.org/expdev07/nova-slim-field/v)](https://packagist.org/packages/expdev07/nova-slim-field) [![Total Downloads](http://poser.pugx.org/expdev07/nova-slim-field/downloads)](https://packagist.org/packages/expdev07/nova-slim-field) [![Latest Unstable Version](http://poser.pugx.org/expdev07/nova-slim-field/v/unstable)](https://packagist.org/packages/expdev07/nova-slim-field) [![License](http://poser.pugx.org/expdev07/nova-slim-field/license)](https://packagist.org/packages/expdev07/nova-slim-field) [![PHP Version Require](http://poser.pugx.org/expdev07/nova-slim-field/require/php)](https://packagist.org/packages/expdev07/nova-slim-field)

This package adds a new Laravel Nova field for cropping images using the "Slim Image Cropper" (https://pqina.nl/slim/). This is an 
alternative to Doka (now Pintura) for those who want a less expensive cropping experience.

## Install

#### Composer install the package:

``composer require expdev07/nova-slim-field``

#### Publish the config:

``php artisan vendor:publish --provider="ExpDev07\NovaSlimField\SlimFieldServiceProvider" --tag="config"``

#### Configure the Slim assets:

```php
/**
 * Configure the path to the slim assets.
 */
'slim' => [
    'jquery' => asset('/js/jquery.js'),
    'js' => asset('/js/slim.js'),
    'css' => asset('/css/slim.css'),
]
```

## Using

Slim extends the <a href="https://nova.laravel.com/docs/1.0/resources/fields.html#image-field">Image Field</a>, so you have all your normal options such as deciding how to store the image.

```php
/**
 * Get the fields displayed by the resource.
 *
 * @param Request $request
 * @return array
 */
public function fields(Request $request): array
{
    return [
        Slim::make('Featured Image')->cropable(true)->ratio('1:1')->size('300,300'),
    ];
}
```

## Thanks to

- ExpDev07 - Creator and maintainer.
- ... All the creators and maintainers of Nova.

## Screenshots

#### Empty state

<p>
    <img src="https://github.com/ExpDev07/nova-slim-field/blob/main/screenshots/screenshot_1.JPG" alt="">
</p>

#### Image uploaded

<p>
    <img src="https://github.com/ExpDev07/nova-slim-field/blob/main/screenshots/screenshot_2.JPG" alt="">
</p>

#### Cropping image

<p>
    <img src="https://github.com/ExpDev07/nova-slim-field/blob/main/screenshots/screenshot_3.JPG" alt="">
</p>

#### Image cropped

<p>
    <img src="https://github.com/ExpDev07/nova-slim-field/blob/main/screenshots/screenshot_4.JPG" alt="">
</p>

