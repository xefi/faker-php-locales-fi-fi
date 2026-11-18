<?php

namespace Xefi\Faker\FiFi\Extensions;

use Xefi\Faker\Extensions\PhoneExtension as BasePhoneExtension;

class PhoneExtension extends BasePhoneExtension
{
    public string $defaultPrefix = '0';

    public string $indicator = '+358';

    protected array $landlineFormats = [
        '9{separator}{d}{d}{d}{separator}{d}{d}{d}{d}',
        '2{separator}{d}{d}{d}{separator}{d}{d}{d}{d}',
        '3{separator}{d}{d}{d}{separator}{d}{d}{d}{d}',
        '5{separator}{d}{d}{d}{separator}{d}{d}{d}{d}',
        '6{separator}{d}{d}{d}{separator}{d}{d}{d}{d}',
        '8{separator}{d}{d}{d}{separator}{d}{d}{d}{d}',
        '14{separator}{d}{d}{d}{separator}{d}{d}{d}{d}',
        '17{separator}{d}{d}{d}{separator}{d}{d}{d}{d}',
    ];

    protected array $cellFormats = [
        '40{separator}{d}{d}{d}{separator}{d}{d}{d}{d}',
        '41{separator}{d}{d}{d}{separator}{d}{d}{d}{d}',
        '44{separator}{d}{d}{d}{separator}{d}{d}{d}{d}',
        '45{separator}{d}{d}{d}{separator}{d}{d}{d}{d}',
        '46{separator}{d}{d}{d}{separator}{d}{d}{d}{d}',
        '50{separator}{d}{d}{d}{separator}{d}{d}{d}{d}',
    ];

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
     * Generate a phone number, keeping a separator between the indicator and the number.
     *
     * @param string|null $format
     * @param string      $separator
     * @param string|null $prefix
     *
     * @return string
     */
    public function phoneNumber(?string $format = null, string $separator = '', ?string $prefix = null): string
    {
        if ($prefix === $this->indicator) {
            $prefix .= $separator;
        }

        return parent::phoneNumber($format, $separator, $prefix);
    }
}
