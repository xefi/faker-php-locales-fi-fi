<?php

namespace Xefi\Faker\FiFi\Extensions;

use Xefi\Faker\Extensions\TextExtension as BaseTextExtension;

class TextExtension extends BaseTextExtension
{
    /**
     * Text in format => Paragraphs => Sentences => Words.
     *
     * @var array|array[]
     */
    protected array $paragraphs = [
        [
            ['Palvelujen', 'laatu', 'on', 'edelleen', 'keskeinen', 'tavoite', 'koko', 'alalla.'],
            ['Jokainen', 'projekti', 'vaatii', 'huolellista', 'suunnittelua', 'ja', 'selkeää', 'vastuunjakoa.'],
            ['Tiimit', 'tekevät', 'tiivistä', 'yhteistyötä', 'yhteisten', 'tavoitteiden', 'saavuttamiseksi.'],
            ['Avoin', 'viestintä', 'parantaa', 'työn', 'tuottavuutta', 'ja', 'lisää', 'luottamusta.'],
        ],
        [
            ['Resurssien', 'hallinta', 'on', 'ratkaiseva', 'tekijä', 'kokonaistuloksen', 'kannalta.'],
            ['Työtavat', 'kehittyvät', 'tarpeiden', 'ja', 'uusien', 'teknologioiden', 'myötä.'],
            ['Muutoskyky', 'auttaa', 'yrityksiä', 'pysymään', 'kilpailukykyisinä', 'ja', 'innovatiivisina.'],
            ['Prosesseja', 'tarkastellaan', 'säännöllisesti,', 'jotta', 'tulokset', 'paranisivat', 'ja', 'markkinoiden', 'vaatimuksiin', 'voitaisiin', 'vastata.'],
        ],
        [
            ['Asiakastyytyväisyys', 'riippuu', 'palvelun', 'laadusta', 'ja', 'nopeasta', 'reagoinnista.'],
            ['Mittareita', 'käytetään', 'suorituskyvyn', 'seurantaan', 'ja', 'strategisten', 'päätösten', 'tukena.'],
            ['Päivittäiset', 'haasteet', 'ratkaistaan', 'osaavan', 'henkilöstön', 'ja', 'hyvän', 'johtamisen', 'avulla.'],
            ['Toimintatapojen', 'säännöllinen', 'arviointi', 'paljastaa', 'uusia', 'kehityskohteita.'],
        ],
        [
            ['Koulutus', 'ja', 'osaamisen', 'kehittäminen', 'ovat', 'yrityksille', 'tärkeitä', 'painopisteitä.'],
            ['Työntekijöitä', 'kannustetaan', 'oppimaan', 'uutta', 'ja', 'kokeilemaan', 'rohkeasti.'],
            ['Jatkuvan', 'parantamisen', 'menetelmillä', 'vähennetään', 'riskejä', 'ja', 'nostetaan', 'tehokkuutta.'],
            ['Henkilökohtaiset', 'koulutusohjelmat', 'tukevat', 'sekä', 'yksilön', 'että', 'yhteisön', 'kasvua.'],
        ],
        [
            ['Tietojen', 'analysointi', 'auttaa', 'löytämään', 'kasvun', 'ja', 'kehityksen', 'mahdollisuuksia.'],
            ['Tavoitteita', 'päivitetään', 'markkinoiden', 'ja', 'asiakkaiden', 'odotusten', 'muuttuessa.'],
            ['Edistymisen', 'tiivis', 'seuranta', 'nopeuttaa', 'sopeutumista', 'muutoksiin.'],
            ['Päätöksenteko', 'perustuu', 'luotettaviin', 'tietoihin', 'ja', 'huolelliseen', 'analyysiin.'],
            ['Määräaikaiset', 'katsaukset', 'mahdollistavat', 'strategian', 'tarkistamisen', 'ja', 'korjaavat', 'toimenpiteet.'],
        ],
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
}
