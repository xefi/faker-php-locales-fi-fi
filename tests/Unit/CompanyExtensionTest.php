<?php

namespace Xefi\Faker\FiFi\Tests\Unit;

use Random\Randomizer;
use ReflectionClass;
use Xefi\Faker\FiFi\Extensions\CompanyExtension;

final class CompanyExtensionTest extends TestCase
{
    protected array $companies = [];

    protected function setUp(): void
    {
        parent::setUp();

        $companyExtension = new CompanyExtension(new Randomizer());
        $this->companies = (new ReflectionClass($companyExtension))->getProperty('companies')->getValue($companyExtension);
    }

    public function testCompany(): void
    {
        $results = [];
        for ($i = 0; $i < count($this->companies); $i++) {
            $results[] = $this->faker->unique()->company();
        }

        $this->assertEqualsCanonicalizing(
            $this->companies,
            $results
        );
    }

    public function testYTunnus(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $yTunnus = $this->faker->yTunnus();

            $this->assertMatchesRegularExpression('/^\d{7}-\d$/', $yTunnus);
            $this->assertSame($this->expectedYTunnusCheckDigit(substr($yTunnus, 0, 7)), (int) substr($yTunnus, -1));
        }
    }

    public function testVat(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $vat = $this->faker->vat();

            $this->assertMatchesRegularExpression('/^FI\d{8}$/', $vat);
            $this->assertSame($this->expectedYTunnusCheckDigit(substr($vat, 2, 7)), (int) substr($vat, -1));
        }
    }

    private function expectedYTunnusCheckDigit(string $digits): int
    {
        $sum = 0;
        foreach ([7, 9, 10, 5, 8, 4, 2] as $index => $weight) {
            $sum += (int) $digits[$index] * $weight;
        }

        $remainder = $sum % 11;
        $this->assertNotSame(1, $remainder, 'A remainder of 1 never yields a valid Y-tunnus');

        return $remainder === 0 ? 0 : 11 - $remainder;
    }
}
