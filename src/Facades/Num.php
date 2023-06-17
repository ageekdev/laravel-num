<?php

namespace AgeekDev\Num\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string convert(int|string $string, string $to = 'en' , string $from = null)
 * @method static string toMyanmar(string $string)
 * @method static string toEnglish(string $string)
 * @method static string toThai(string $string)
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
