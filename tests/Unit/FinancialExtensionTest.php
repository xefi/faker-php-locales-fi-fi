<?php

namespace Xefi\Faker\FiFi\Tests\Unit;

use Xefi\Faker\Calculators\Iban;
use Xefi\Faker\Calculators\Luhn;

final class FinancialExtensionTest extends TestCase
{
    public function testIban(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $iban = $this->faker->iban();

            $this->assertMatchesRegularExpression('/^FI\d{16}$/', $iban);
            $this->assertTrue(Iban::isValid($iban));
            $this->assertTrue(Luhn::isValid((int) substr($iban, 4)), 'The BBAN must end with a valid Luhn check digit');
        }
    }
}
