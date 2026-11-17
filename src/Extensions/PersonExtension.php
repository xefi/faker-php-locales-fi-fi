<?php

namespace Xefi\Faker\FiFi\Extensions;

use Xefi\Faker\Extensions\PersonExtension as BasePersonExtension;

class PersonExtension extends BasePersonExtension
{
    protected $firstNameMale = [
        'Juhani', 'Johannes', 'Mikael', 'Olavi', 'Antero', 'Tapani', 'Kalevi', 'Matti', 'Pekka', 'Mikko',
        'Timo', 'Jari', 'Kari', 'Antti', 'Jukka', 'Markku', 'Heikki', 'Ville', 'Juha', 'Hannu',
        'Petri', 'Janne', 'Sami', 'Tuomas', 'Lauri', 'Eero', 'Aleksi', 'Onni', 'Väinö', 'Eino',
        'Toivo', 'Veikko', 'Otto', 'Leevi', 'Elias', 'Oliver', 'Niilo', 'Ilmari', 'Aatos', 'Joonas',
    ];

    protected $firstNameFemale = [
        'Maria', 'Helena', 'Johanna', 'Anneli', 'Kaarina', 'Marjatta', 'Anna', 'Liisa', 'Tuula', 'Päivi',
        'Sari', 'Minna', 'Riitta', 'Leena', 'Anne', 'Pirjo', 'Tiina', 'Satu', 'Sanna', 'Elina',
        'Hanna', 'Laura', 'Emilia', 'Aino', 'Eveliina', 'Sofia', 'Aada', 'Venla', 'Ella', 'Iida',
        'Pihla', 'Siiri', 'Kerttu', 'Hilja', 'Lyydia', 'Ilona', 'Linnea', 'Noora', 'Katariina', 'Marjukka',
    ];

    protected $lastName = [
        'Korhonen', 'Virtanen', 'Mäkinen', 'Nieminen', 'Mäkelä', 'Hämäläinen', 'Laine', 'Heikkinen', 'Koskinen', 'Järvinen',
        'Lehtonen', 'Lehtinen', 'Saarinen', 'Salminen', 'Heinonen', 'Niemi', 'Heikkilä', 'Kinnunen', 'Salonen', 'Turunen',
        'Salo', 'Laitinen', 'Tuominen', 'Rantanen', 'Karjalainen', 'Jokinen', 'Mattila', 'Savolainen', 'Lahtinen', 'Ahonen',
        'Hiltunen', 'Leinonen', 'Peltonen', 'Kallio', 'Lindholm', 'Räsänen', 'Hirvonen', 'Laaksonen', 'Väisänen', 'Söderberg',
    ];

    protected $titleMale = ['Herra', 'Tohtori', 'Professori', 'Maisteri'];

    protected $titleFemale = ['Rouva', 'Neiti', 'Tohtori', 'Professori', 'Maisteri'];

    /**
     * Characters used as the henkilötunnus control character, indexed by the remainder modulo 31.
     *
     * @var string
     */
    protected string $henkilotunnusControlCharacters = '0123456789ABCDEFHJKLMNPRSTUVWXY';

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
     * Generate a Finnish personal identity code (henkilötunnus), formatted as DDMMYYCZZZQ.
     *
     * C is the century sign ("-" for the 1900s, "A" for the 2000s), ZZZ the individual number
     * (odd for men, even for women) and Q the control character of DDMMYYZZZ modulo 31.
     *
     * @param string|null $gender One of static::GENDER_MALE or static::GENDER_FEMALE, random when null.
     *
     * @return string
     */
    public function henkilotunnus(?string $gender = null): string
    {
        $birthDate = $this->randomizer->getInt(gmmktime(0, 0, 0, 1, 1, 1920), gmmktime(0, 0, 0, 12, 31, 2020));
        $centurySign = (int) gmdate('Y', $birthDate) >= 2000 ? 'A' : '-';

        if ($gender === null) {
            $gender = $this->randomizer->getInt(0, 1) === 0 ? static::GENDER_FEMALE : static::GENDER_MALE;
        }

        $individualNumber = $this->randomizer->getInt(1, 449) * 2;
        if ($gender === static::GENDER_MALE) {
            $individualNumber++;
        }

        $date = gmdate('dmy', $birthDate);
        $individualNumber = sprintf('%03d', $individualNumber);
        $controlCharacter = $this->henkilotunnusControlCharacters[(int) ($date.$individualNumber) % 31];

        return $date.$centurySign.$individualNumber.$controlCharacter;
    }
}
