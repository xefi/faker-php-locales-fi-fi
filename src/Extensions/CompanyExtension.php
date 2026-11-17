<?php

namespace Xefi\Faker\FiFi\Extensions;

use Xefi\Faker\Extensions\Extension;

class CompanyExtension extends Extension
{
    private array $companies = [
        'Pohjolan Rakennus Oy', 'Saimaan Puutuote Oy', 'Kalliola & Kumppanit Ky',
        'Revontuli Ohjelmistot Oy', 'Lapin Matkailu Oy', 'Hämeen Kuljetus Ay',
        'Kuusiston Konepaja Oy', 'Järvisen Sähkö Tmi', 'Itämeren Logistiikka Oy',
        'Aurinkokoski Energia Oyj', 'Karjalan Leipomo Oy', 'Tampereen Teknologia Oy',
        'Merituuli Varustamo Oyj', 'Savon Metsäpalvelu Ky', 'Kultaranta Kiinteistöt Oy',
        'Pohjanmaan Maitokunta osk', 'Virtasen Putki Ay', 'Koivulehdon Puutarha Tmi',
        'Suomen Datapalvelut Oy', 'Hiidenkiven Arkkitehdit Oy', 'Laineen Lääkintä Oy',
        'Oulun Muovityö Oy', 'Kalevan Kone Oyj', 'Pirkanmaan Tilitoimisto Ky',
        'Saariston Kalastus Ay', 'Hopeajärvi Design Oy', 'Mäkelän Maalaus Tmi',
        'Vaskiluodon Satama Oy', 'Tunturin Rakennuttajat Oyj', 'Kotimaan Elintarvike osk',
    ];

    /**
     * Weights applied to the seven digits of a Y-tunnus to compute its check digit.
     *
     * @var int[]
     */
    private array $yTunnusWeights = [7, 9, 10, 5, 8, 4, 2];

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
     * Return a random company name.
     *
     * @return string
     */
    public function company(): string
    {
        return $this->pickArrayRandomElement($this->companies);
    }

    /**
     * Generate a Finnish business ID (Y-tunnus), formatted as 1234567-8 with a valid modulo 11 check digit.
     *
     * @return string
     */
    public function yTunnus(): string
    {
        do {
            $digits = $this->randomizer->getBytesFromString('0123456789', 7);

            $sum = 0;
            foreach ($this->yTunnusWeights as $index => $weight) {
                $sum += (int) $digits[$index] * $weight;
            }

            $remainder = $sum % 11;
        } while ($remainder === 1);

        $checkDigit = $remainder === 0 ? 0 : 11 - $remainder;

        return sprintf('%s-%d', $digits, $checkDigit);
    }

    /**
     * Generate a Finnish VAT number (ALV-numero): "FI" followed by the Y-tunnus without its hyphen.
     *
     * @return string
     */
    public function vat(): string
    {
        return 'FI'.str_replace('-', '', $this->yTunnus());
    }
}
