<?php

namespace AgeekDev\Num\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method string convert(int|string $string, string $to = 'en' , string $from = null)
 * @method string toMyanmar(string $string)
 * @method string toEnglish(string $string)
 * @method string toThai(string $string)
 *
 * @see \AgeekDev\Num\Num
 */
class Num extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'num';
    }
}
