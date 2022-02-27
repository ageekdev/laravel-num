<?php

namespace GenieFintech\Num;

use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Macroable;
use InvalidArgumentException;

class Num
{
    use Macroable;

    /**
     * Convert the number to another language.
     *
     * @param int|string $string
     * @param string $to
     * @param string|null $from
     *
     * @return string
     * Supported Languages: "Myanmar", "English", "Thai"
     */
    public function convert(int|string $string, string $to = 'en', string $from = null): string
    {
        $zeros = config('num.zeros');

        if (Arr::has($zeros, $to)) {
            $toZero = $zeros[$to];
        } else {
            throw new InvalidArgumentException("\$to zero language [{$to}] is not defined.");
        }

        $toNumber = num_range($toZero);

        unset($zeros[$to]);

        if ($from != null) {
            if (Arr::has($zeros, $from)) {
                $fromZero = $zeros[$from];
            } else {
                throw new InvalidArgumentException("\$from zero language [{$from}] is not defined.");
            }

            return $this->replaceNumber($string, $fromZero, $toNumber);
        }

        foreach ($zeros as $zero) {
            $string = $this->replaceNumber($string, $zero, $toNumber);
        }

        return $string;
    }

    private function replaceNumber($string, $zero, $toNumber): string
    {
        $fromNumbers = num_range($zero);

        return str_replace($fromNumbers, $toNumber, $string);
    }

    /**
     * Convert to the myanmar number.
     *
     * @param int|string $string
     * @return string
     */
    public function toMyanmar(int|string $string): string
    {
        return $this->convert($string, 'mm');
    }

    /**
     * Convert to the thai number.
     *
     * @param int|string $string
     * @return string
     */
    public function toThai(int|string $string): string
    {
        return $this->convert($string, 'th');
    }

    /**
     * Convert to the english number.
     *
     * @param int|string $string
     * @return string
     */
    public function toEnglish(int|string $string): string
    {
        return $this->convert($string);
    }
}
