<?php

use AgeekDev\Num\Facades\Num;
use Illuminate\Support\Facades\Config;

it('convert english to myanmar', function () {
    $this->assertSame($this->myanmarNumber(), Num::convert($this->englishNumber(), 'mm', 'en'));
});

it('convert to myanmar ', function () {
    $this->assertSame($this->myanmarNumber(), Num::toMyanmar($this->englishNumber()));
});

it('convert to thai', function () {
    $this->assertSame($this->thaiNumber(), Num::toThai($this->englishNumber()));
});

it('convert to english', function () {
    $this->assertSame($this->englishNumber(), Num::toEnglish($this->thaiNumber()));
});

it('throws $to invalid argument exception', function () {
    Num::convert($this->englishNumber(), 'shan', 'en');
})->throws(InvalidArgumentException::class);

it('throws $from invalid argument exception', function () {
    Num::convert($this->englishNumber(), 'en', 'shan');
})->throws(InvalidArgumentException::class);

it('convert to myanmar shan', function () {
    Config::set('num.zeros.shan', '႐');
    $this->assertSame($this->myanmarShanNumber(), Num::convert($this->englishNumber(), 'shan'));
});
