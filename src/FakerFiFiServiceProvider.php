<?php

namespace Xefi\Faker\FiFi;

use Xefi\Faker\FiFi\Extensions\AddressExtension;
use Xefi\Faker\FiFi\Extensions\ColorsExtension;
use Xefi\Faker\FiFi\Extensions\CompanyExtension;
use Xefi\Faker\FiFi\Extensions\FinancialExtension;
use Xefi\Faker\FiFi\Extensions\PersonExtension;
use Xefi\Faker\FiFi\Extensions\PhoneExtension;
use Xefi\Faker\FiFi\Extensions\TextExtension;
use Xefi\Faker\Providers\Provider;

class FakerFiFiServiceProvider extends Provider
{
    /**
     * Register the fi_FI extensions.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->extensions([
            AddressExtension::class,
            ColorsExtension::class,
            CompanyExtension::class,
            FinancialExtension::class,
            PersonExtension::class,
            PhoneExtension::class,
            TextExtension::class,
        ]);
    }
}
