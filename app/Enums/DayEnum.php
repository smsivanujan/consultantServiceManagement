<?php

namespace App\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self SUNDAY()
 * @method static self MONDAY()
 * @method static self TUESDAY()
 * @method static self WEDNESDAY()
 * @method static self THURSDAY()
 * @method static self FRIDAY()
 * @method static self SATURDAY()
 */
class DayEnum extends Enum
{
    const MAP_VALUE = [
        'SUNDAY' => 'Sunday',
        'MONDAY' => 'Monday',
        'TUESDAY' => 'Tuesday',
        'WEDNESDAY' => 'Wednesday',
        'THURSDAY' => 'Thursday',
        'FRIDAY' => 'Friday',
        'SATURDAY' => 'Saturday',
    ];
}
