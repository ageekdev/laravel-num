<?php

use AgeekDev\Num\Facades\Num;
use Illuminate\Support\Facades\Config;

it('convert english to myanmar', function () {
    expect(Num::convert($this->englishNumber(), 'mm', 'en'))
        ->toEqual($this->myanmarNumber());
});

it('convert to myanmar ', function () {
    expect(Num::toMyanmar($this->englishNumber()))
        ->toEqual($this->myanmarNumber());
});

it('convert to thai', function () {
    expect(Num::toThai($this->englishNumber()))
        ->toEqual($this->thaiNumber());
});

it('convert to english', function () {
    expect(Num::toEnglish($this->thaiNumber()))
        ->toEqual($this->englishNumber());
});

it('throws $to invalid argument exception', function () {
    Num::convert($this->englishNumber(), 'shan', 'en');
})->throws(InvalidArgumentException::class);

it('throws $from invalid argument exception', function () {
    Num::convert($this->englishNumber(), 'en', 'shan');
})->throws(InvalidArgumentException::class);

it('convert to myanmar shan', function () {
    Config::set('num.zeros.shan', '႐');

    expect(Num::convert($this->englishNumber(), 'shan'))
        ->toEqual($this->myanmarShanNumber());
});
