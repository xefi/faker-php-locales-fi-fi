<?php

namespace Xefi\Faker\FiFi\Tests\Unit;

use Random\Randomizer;
use ReflectionClass;
use Xefi\Faker\FiFi\Extensions\AddressExtension;

final class AddressExtensionTest extends TestCase
{
    protected AddressExtension $extension;
    protected array $regions = [];
    protected array $cities = [];
    protected array $streetTypes = [];
    protected array $streetNames = [];

    protected function setUp(): void
    {
        parent::setUp();

        $this->extension = new AddressExtension(new Randomizer());
        $reflection = new ReflectionClass($this->extension);

        $this->regions = $reflection->getProperty('regions')->getValue($this->extension);
        $this->cities = $reflection->getProperty('cities')->getValue($this->extension);
        $this->streetTypes = $reflection->getProperty('streetTypes')->getValue($this->extension);
        $this->streetNames = $reflection->getProperty('streetNames')->getValue($this->extension);
    }

    public function testRegion(): void
    {
        $results = [];
        for ($i = 0; $i < count($this->regions); $i++) {
            $results[] = $this->faker->unique()->region();
        }

        $this->assertEqualsCanonicalizing(
            $this->regions,
            $results
        );
    }

    public function testCity(): void
    {
        $results = [];
        for ($i = 0; $i < count($this->cities); $i++) {
            $results[] = $this->faker->unique()->city();
        }

        $this->assertEqualsCanonicalizing(
            $this->cities,
            $results
        );
    }

    public function testPostcode(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $result = $this->faker->postcode();

            $this->assertIsString($result);
            $this->assertMatchesRegularExpression('/^\d{5}$/', $result);
            $this->assertGreaterThanOrEqual(100, (int) $result);
        }
    }

    public function testHouseNumber(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $result = $this->faker->houseNumber();

            $this->assertIsInt($result);
            $this->assertGreaterThanOrEqual(1, $result);
            $this->assertLessThanOrEqual(150, $result);
        }
    }

    public function testStreetName(): void
    {
        $pattern = sprintf(
            '/^(%s)(%s)$/u',
            implode('|', array_map('preg_quote', $this->streetNames)),
            implode('|', array_map('preg_quote', $this->streetTypes))
        );

        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression($pattern, $this->faker->streetName());
        }
    }

    public function testStreetAddress(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression('/^\p{Lu}\p{Ll}+ \d{1,3}( [A-D] \d{1,2})?$/u', $this->faker->streetAddress());
        }
    }

    public function testFullAddress(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression('/^\p{Lu}\p{Ll}+ \d{1,3}( [A-D] \d{1,2})?, \d{5} [\p{L}\- ]+$/u', $this->faker->fullAddress());
        }
    }
}
