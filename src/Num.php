<?php

namespace AgeekDev\Num;

use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Macroable;
use InvalidArgumentException;

class Num
{
    use Macroable;

    private const LANG_EN = 'en';

    private const LANG_MM = 'mm';

    private const LANG_TH = 'th';

    /**
     * Convert the number to another language.
     *
     * @param  int|string|null  $string  Number to convert
     * @param  string  $to  Target language code (en|mm|th)
     * @param  string|null  $from  Source language code
     *
     * @throws InvalidArgumentException
     */
    public function convert(int|string|null $string, string $to = self::LANG_EN, ?string $from = null): ?string
    {
        if ($string === null || $string === '') {
            return $string;
        }

        $zeros = config('num.zeros');

        if (! Arr::has($zeros, $to)) {
            throw new InvalidArgumentException("Target language [{$to}] is not configured in num.zeros config.");
        }

        $toZero = $zeros[$to];
        $toNumber = num_range($toZero);

        if ($from !== null) {
            if (! Arr::has($zeros, $from)) {
                throw new InvalidArgumentException("Source language [{$from}] is not configured in num.zeros config.");
            }

            return $this->replaceNumber((string) $string, $zeros[$from], $toNumber);
        }

        $result = (string) $string;
        foreach (Arr::except($zeros, $to) as $zero) {
            $result = $this->replaceNumber($result, $zero, $toNumber);
        }

        return $result;
    }

    /**
     * Replace numbers between number systems.
     *
     * @param  string  $string  Input string or number
     * @param  string  $fromZero  Source zero character
     * @param  array<int,string>  $toNumber  Target number array
     */
    private function replaceNumber(string $string, string $fromZero, array $toNumber): string
    {
        return str_replace(num_range($fromZero), $toNumber, $string);
    }

    /**
     * Convert to Myanmar number.
     */
    public function toMyanmar(int|string|null $string): ?string
    {
        return $this->convert($string, self::LANG_MM);
    }

    /**
     * Convert to Thai number.
     */
    public function toThai(int|string|null $string): ?string
    {
        return $this->convert($string, self::LANG_TH);
    }

    /**
     * Convert to English number.
     */
    public function toEnglish(int|string|null $string): ?string
    {
        return $this->convert($string, self::LANG_EN);
    }
}
