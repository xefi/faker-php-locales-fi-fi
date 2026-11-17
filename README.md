# Faker PHP — fi_FI locale

Finnish (`fi_FI`) locale for [Faker PHP](https://github.com/xefi/faker-php).

## Installation

```bash
composer require --dev xefi/faker-php-locales-fi-fi
```

The service provider is discovered automatically through Composer.

## Usage

```php
use Xefi\Faker\Faker;

$faker = new Faker('fi_FI');
```

Generators without a `fi_FI` variant fall back to the default locale.

## Extensions

This package provides `fi_FI` variants of the address, colors, company, financial, person, phone and text extensions.
On top of the standard generators, it adds:

| Method | Extension | Description |
| --- | --- | --- |
| `henkilotunnus(?string $gender = null)` | Person | Personal identity code (`DDMMYYCZZZQ`) with century sign and modulo 31 control character |
| `yTunnus()` | Company | Business ID (`1234567-8`) with modulo 11 check digit |
| `vat()` | Company | VAT number (`FI` + Y-tunnus digits) |

## Contributing

1. Fork the repository and create a branch from `main`.
2. Add an extension under `src/Extensions/` and register it in `FakerFiFiServiceProvider::boot()`.
3. Add a test under `tests/Unit/`.
4. Run the suite with `vendor/bin/phpunit` (or `docker compose run php vendor/bin/phpunit`).
5. Open a pull request against `main`.

## License

MIT
