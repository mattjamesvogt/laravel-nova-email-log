# Adds an Email Log resource so that you can see all outgoing emails from your app.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/cloudest-co/laravel-eloquent-email-log.svg?style=flat-square)](https://packagist.org/packages/cloudest-co/:package_name)
[![Build Status](https://img.shields.io/travis/cloudest-co/laravel-eloquent-email-log/master.svg?style=flat-square)](https://travis-ci.org/cloudest-co/:package_name)
[![Quality Score](https://img.shields.io/scrutinizer/g/cloudest-co/laravel-eloquent-email-log.svg?style=flat-square)](https://scrutinizer-ci.com/g/cloudest-co/:package_name)
[![Total Downloads](https://img.shields.io/packagist/dt/cloudest-co/laravel-eloquent-email-log.svg?style=flat-square)](https://packagist.org/packages/cloudest-co/:package_name)


Logs all outbound emails to the database, and allows you to view them in Laravel Nova.

## Installation

You can install the package via composer:

```bash
composer require cloudest-co/laravel-nova-email-log
```

## Add to your NovaServiceProvider

``` php
    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [
            new \Cloudest\NovaEmailLog\NovaEmailLog,
        ];
    }
```

## Relationships

Add the trait to your user model so that you can reference the logs.

``` php
    <?php
    
    use Cloudest\LaravelEloquentEmailLog\HasEmailLogs;

    class User extends Authenticatable
    {
        use HasEmailLogs;
        
        ...
    }
```

Add the relation to your Nova User resource so that you can see a list of email logs per user.

``` php
    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            
            ...

            MorphMany::make('Email Logs', 'emailLogs', \Cloudest\NovaEmailLog\EmailLogResource::class),
        ];
    }
```

### Security

If you discover any security related issues, please email chris@cloudest.co.uk instead of using the issue tracker.

## Credits

- [Chris Reid](https://github.com/ChrisReid)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
