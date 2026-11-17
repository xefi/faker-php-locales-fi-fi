<?php

namespace Xefi\Faker\FiFi\Extensions;

use Xefi\Faker\Calculators\Luhn;
use Xefi\Faker\Extensions\FinancialExtension as BaseFinancialExtension;

class FinancialExtension extends BaseFinancialExtension
{
    /**
     * Returns the locale handled by this extension.
     *
     * @return string|null
     */
    public function getLocale(): ?string
    {
        return 'fi_FI';
    }

    /**
     * Generate a Finnish IBAN (FIkk + 14 digits). The default BBAN is a 6-digit bank and branch code
     * followed by a 7-digit account number and its Luhn check digit.
     *
     * @param string|null $countryCode
     * @param string|null $format      [{d} => digit, {l} => letter, {a} => any]
     *
     * @return string
     */
    public function iban(?string $countryCode = 'FI', ?string $format = null): string
    {
        if ($format === null) {
            $account = $this->randomizer->getInt(1, 8).$this->randomizer->getBytesFromString('0123456789', 12);
            $format = (string) Luhn::create((int) $account);
        }

        return parent::iban($countryCode, $format);
    }
}
