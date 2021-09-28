# Laravel Xero

This package provides the standard timesheets migration and provides a base model.

## Installation

You can install the package via composer:

```bash
composer require dcodegroup/laravel-timesheets
```

Then run the install command.

```bash
php artsian laravel-timesheets:install
```

This will publish the configuration file and the migration file.

Run the migrations

```bash
php artsian migrate
```

## Configuration

Most of configuration has been set the fair defaults. However you can review the configuration file at `config/laravel-timesheets.php` and adjust as needed

## Usage

If the table does not already exist the install command `php artsian laravel-timesheets:install` will install the timesheets table for you.

The package also contains a model `Timesheet::class` You  can use this else use it as a base mode in your own Timesheet Model.