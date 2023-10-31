## A simple Laravel package that integrates Microsoft Teams webhook.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/laravel-teams-notification/laravel-teams-notification.svg?style=flat-square)](https://packagist.org/packages/laravel-teams-notification/laravel-teams-notification)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/isaacdarcilla/laravel-teams-notification/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/isaacdarcilla/laravel-teams-notification/actions?query=workflow%3Arun-tests+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/laravel-teams-notification/laravel-teams-notification.svg?style=flat-square)](https://packagist.org/packages/laravel-teams-notification/laravel-teams-notification)

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
    | The webhook URL where we post a request
    | You can generate test webhook URL in https://typedwebhook.tools/ 
    | or through MS Teams Incoming WebHook
    |
    */
    'webhook_url' => env('WEBHOOK_URL', 'your_webhook_url'),
];
```

Then, you can add `WEBHOOK_URL` in your `.env` file. More information about how to setup webhook in MS teams in
this [link](https://learn.microsoft.com/en-us/microsoftteams/platform/webhooks-and-connectors/how-to/add-incoming-webhook?tabs=dotnet).

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

#### Screenshot

More samples and screenshot of how the message should look can be found in `screenshots` folder.

#### Testing

```bash
composer test
```

#### Credits

- [Isaac D. Arcilla](https://github.com/isaacdarcilla)

#### License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
