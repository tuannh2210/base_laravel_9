<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class MediaCollectionEnum extends Enum
{
    const PRODUCT = [
        'MAIN_IMAGE' => 'mainImage',
    ];
}
