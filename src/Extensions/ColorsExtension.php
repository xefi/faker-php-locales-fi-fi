<?php

namespace Xefi\Faker\FiFi\Extensions;

use Xefi\Faker\Extensions\ColorsExtension as BaseColorsExtension;

class ColorsExtension extends BaseColorsExtension
{
    protected array $safeColorNames = [
        'Musta', 'Kastanjanruskea', 'Vihreä', 'Laivastonsininen', 'Oliivinvihreä',
        'Purppura', 'Sinivihreä', 'Limetinvihreä', 'Sininen', 'Hopea',
        'Harmaa', 'Keltainen', 'Fuksia', 'Vedensininen', 'Valkoinen',
    ];

    protected array $colorNames = [
        'Musta', 'Kastanjanruskea', 'Vihreä', 'Laivastonsininen', 'Oliivinvihreä',
        'Purppura', 'Sinivihreä', 'Limetinvihreä', 'Sininen', 'Hopea',
        'Harmaa', 'Keltainen', 'Fuksia', 'Vedensininen', 'Valkoinen',
        'Beige', 'Suklaanruskea', 'Koralli', 'Syaani', 'Karmiininpunainen',
        'Tummansininen', 'Tummanoranssi', 'Tiilenpunainen', 'Merenvihreä', 'Kukanvalkoinen',
        'Metsänvihreä', 'Kulta', 'Vaaleanpunainen', 'Indigo', 'Khaki',
        'Laventeli', 'Vaaleansininen', 'Vaaleakoralli', 'Vaaleanvihreä', 'Vaaleanlohenpunainen',
        'Pellavanvalkoinen', 'Magenta', 'Keskisininen', 'Keskiorkidea', 'Mokkasiini',
        'Oranssi', 'Punainen', 'Luumunvioletti', 'Perunruskea', 'Kuninkaansininen',
        'Lohenpunainen', 'Hiekanruskea', 'Taivaansininen', 'Lumenvalkoinen', 'Turkoosi',
        'Violetti', 'Savunvalkoinen',
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
