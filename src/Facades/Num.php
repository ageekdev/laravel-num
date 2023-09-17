<?php

namespace AgeekDev\Num\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string|null convert(int|string|null $string, string $to = 'en' , string $from = null)
 * @method static string|null toMyanmar(int|string|null $string)
 * @method static string|null toEnglish(int|string|null $string)
 * @method static string|null toThai(int|string|null $string)
 *
 * @see \AgeekDev\Num\Num
 */
class Num extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return 'num';
    }
}
