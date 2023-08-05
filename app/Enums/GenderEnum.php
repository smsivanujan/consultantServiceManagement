<?php

namespace App\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self MALE()
 * @method static self FEMALE()
 * @method static self OTHER()
 */
class GenderEnum extends Enum
{
    const MAP_VALUE = [
        'MALE' => 'male',
        'FEMALE' => 'female',
        'OTHER' => 'other',
    ];
}
