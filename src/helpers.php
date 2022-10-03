<?php

use AgeekDev\Num\Facades\Num;

if (! function_exists('num_convert')) {
    /**
     * Convert the number to another language.
     *
     * @param  int|string  $string
     * @param  string  $to
     * @param  string|null  $from
     *
     * Support Language: "Myanmar", "English", "Thai"
     * @return string
     */
    function num_convert(int|string $string, string $to = 'en', string $from = null): string
    {
        return Num::convert($string, $to, $from);
    }
}
if (! function_exists('num_to_mm')) {
    /**
     * Convert the number to Myanmar language.
     *
     * @param  int|string  $string
     * @return string
     */
    function num_to_mm(int|string $string): string
    {
        return Num::toMyanmar($string);
    }
}

if (! function_exists('num_to_th')) {
    /**
     * Convert the number to Thai language.
     *
     * @param  int|string  $string
     * @return string
     */
    function num_to_th(int|string $string): string
    {
        return Num::toThai($string);
    }
}

if (! function_exists('num_to_eng')) {
    /**
     * Convert the number to English language.
     *
     * @param  int|string  $string
     * @return string
     */
    function num_to_eng(int|string $string): string
    {
        return Num::toEnglish($string);
    }
}

if (! function_exists('num_range')) {
    /**
     * Range of unicode numbers
     *
     * @param  string  $start
     * @return array
     */
    function num_range(string $start): array
    {
        $_result = [];

        // get unicodes of start and end
        [, $_start] = unpack('N*', mb_convert_encoding($start, 'UTF-32BE', 'UTF-8'));

        $_end = $_start + 9;

        $_current = $_start;
        while ($_current <= $_end) {
            $_result[] = mb_convert_encoding(pack('N*', $_current), 'UTF-8', 'UTF-32BE');
            $_current++;
        }

        return $_result;
    }
}
