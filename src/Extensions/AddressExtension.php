<?php

namespace Xefi\Faker\FiFi\Extensions;

use Xefi\Faker\Extensions\Extension;

class AddressExtension extends Extension
{
    protected $regions = [
        'Uusimaa', 'Varsinais-Suomi', 'Satakunta', 'Kanta-Häme', 'Pirkanmaa', 'Päijät-Häme', 'Kymenlaakso',
        'Etelä-Karjala', 'Etelä-Savo', 'Pohjois-Savo', 'Pohjois-Karjala', 'Keski-Suomi', 'Etelä-Pohjanmaa',
        'Pohjanmaa', 'Keski-Pohjanmaa', 'Pohjois-Pohjanmaa', 'Kainuu', 'Lappi', 'Ahvenanmaa',
    ];

    protected $cities = [
        'Helsinki', 'Espoo', 'Tampere', 'Vantaa', 'Oulu', 'Turku', 'Jyväskylä', 'Kuopio', 'Lahti', 'Pori',
        'Kouvola', 'Joensuu', 'Lappeenranta', 'Hämeenlinna', 'Vaasa', 'Seinäjoki', 'Rovaniemi', 'Mikkeli',
        'Kotka', 'Salo', 'Porvoo', 'Kokkola', 'Lohja', 'Hyvinkää', 'Nurmijärvi', 'Järvenpää', 'Rauma',
        'Kirkkonummi', 'Tuusula', 'Kajaani',
    ];

    protected $streetTypes = [
        'katu', 'tie', 'kuja', 'polku', 'väylä', 'rinne', 'raitti', 'kaari', 'piha', 'aukio',
    ];

    protected $streetNames = [
        'Koivu', 'Mänty', 'Kuusi', 'Pihlaja', 'Tammi', 'Vaahtera', 'Haapa', 'Leppä', 'Kataja', 'Järvi',
        'Ranta', 'Mäki', 'Niitty', 'Pelto', 'Kirkko', 'Koulu', 'Asema', 'Mylly', 'Satama', 'Puisto',
        'Tori', 'Kauppa', 'Tehdas', 'Metsä', 'Kallio', 'Hämeen', 'Aleksanterin', 'Runebergin', 'Snellmanin',
        'Sibeliuksen', 'Lönnrotin', 'Kalevan', 'Väinämöisen', 'Ilmarisen', 'Linnan', 'Kuninkaan',
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
     * Return a random Finnish region (maakunta).
     *
     * @return string
     */
    public function region(): string
    {
        return $this->pickArrayRandomElement($this->regions);
    }

    /**
     * Return a random Finnish city.
     *
     * @return string
     */
    public function city(): string
    {
        return $this->pickArrayRandomElement($this->cities);
    }

    /**
     * Return a random 5-digit Finnish postal code (postinumero).
     *
     * @return string
     */
    public function postcode(): string
    {
        return sprintf('%05d', $this->randomizer->getInt(100, 99999));
    }

    /**
     * Return a random house number.
     *
     * @return int
     */
    public function houseNumber(): int
    {
        return $this->randomizer->getInt(1, 150);
    }

    /**
     * Return a random street name, written as a single compound word (e.g. "Koivukuja").
     *
     * @return string
     */
    public function streetName(): string
    {
        $name = $this->pickArrayRandomElement($this->streetNames);
        $streetType = $this->pickArrayRandomElement($this->streetTypes);

        return $name.$streetType;
    }

    /**
     * Return a random street address, optionally with a staircase letter and an apartment number.
     *
     * @return string
     */
    public function streetAddress(): string
    {
        $streetAddress = sprintf('%s %d', $this->streetName(), $this->houseNumber());

        if ($this->randomizer->getInt(0, 1) === 1) {
            $staircase = $this->pickArrayRandomElement(['A', 'B', 'C', 'D']);
            $streetAddress .= sprintf(' %s %d', $staircase, $this->randomizer->getInt(1, 60));
        }

        return $streetAddress;
    }

    /**
     * Return a full address on one line: street address, postal code and city.
     *
     * @return string
     */
    public function fullAddress(): string
    {
        return sprintf('%s, %s %s', $this->streetAddress(), $this->postcode(), $this->city());
    }
}
