# Nova Slim Field

This package adds a new field for cropping images using the "Slim Image Cropper" (https://pqina.nl/slim/). This is an 
alternative to Doka (now Pintura) for those who want a less expensive cropping experience.

## Install

#### Composer install the package:

``composer install expdev07/nova-slim-field``

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


