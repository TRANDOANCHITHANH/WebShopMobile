<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class TypeSizeEnum extends Enum
{
    const INCH = 1;
    const GB = 2;
    public static function getName($type)
    {
        if ($type == 1) return 'Inch';
        else if ($type == 2) return 'GB';
    }
}
