# A simple Laravel package that integrates Microsoft Teams notification.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/notification/laravel-teams-notification.svg?style=flat-square)](https://packagist.org/packages/notification/laravel-teams-notification)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/notification/laravel-teams-notification/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/notification/laravel-teams-notification/actions?query=workflow%3Arun-tests+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/notification/laravel-teams-notification.svg?style=flat-square)](https://packagist.org/packages/notification/laravel-teams-notification)

#### Installation

You can install the package via composer:

```bash
composer require laravel-teams-notification/laravel-teams-notification
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-teams-notification-config"
```

This is the contents of the published config file:

```php
return [
    /*
    |--------------------------------------------------------------------------
    | Webhook URL
    |--------------------------------------------------------------------------
    |
    | The webhook URl where we post a request
    | You can generate test webhook URL in https://typedwebhook.tools/ 
    | or through MS Teams Incoming WebHook
    |
    */
    'webhook_url' => env('WEBHOOK_URL', 'your_webhook_url'),
];
```

Then, you can add `WEBHOOK_URL` in your `.env` file.

#### Usage

```php
TeamsNotification::create()
    ->webHookUrl('your_webhook_url')
    ->payload([
        'type' => 'MessageCard',
        'context' => 'https://schema.org/extensions',
        'themeColor' => '0076D7',
        'summary' => 'Hello, World',
        'sections' => [
            [
                'activityTitle' => 'Hello, World!',
            ]
        ]
    ])
    ->dispatch();
```

Optionally, you can use `OrderStatusEvent::class` and `OrderNotificationListener::class` to dispatch order status to MS
Teams notifications.

#### Testing

```bash
composer test
```

#### Credits

- [Isaac D. Arcilla](https://github.com/isaacdarcilla)

#### License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
