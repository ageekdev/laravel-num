<?php

use AgeekDev\Num\Facades\Num;
use Illuminate\Support\Facades\Config;

it('converts english to myanmar', function () {
    expect(Num::convert($this->englishNumber(), 'mm', 'en'))
        ->toEqual($this->myanmarNumber());
});

it('converts to myanmar ', function () {
    expect(Num::toMyanmar($this->englishNumber()))
        ->toEqual($this->myanmarNumber());
});

it('converts to thai', function () {
    expect(Num::toThai($this->englishNumber()))
        ->toEqual($this->thaiNumber());
});

it('converts to english', function () {
    expect(Num::toEnglish($this->thaiNumber()))
        ->toEqual($this->englishNumber());
});

it('throws $to invalid argument exception', function () {
    Num::convert($this->englishNumber(), 'shan', 'en');
})->throws(InvalidArgumentException::class);

it('throws $from invalid argument exception', function () {
    Num::convert($this->englishNumber(), 'en', 'shan');
})->throws(InvalidArgumentException::class);

it('converts to myanmar shan', function () {
    Config::set('num.zeros.shan', '႐');

    expect(Num::convert($this->englishNumber(), 'shan'))
        ->toEqual($this->myanmarShanNumber());
});

it('converts null', function () {
    expect(Num::convert(null))->toEqual(null)
        ->and(Num::toMyanmar(null))->toEqual(null)
        ->and(Num::toThai(null))->toEqual(null)
        ->and(Num::toEnglish(null))->toEqual(null);
});

it('converts empty string', function () {
    expect(Num::convert(''))->toEqual('')
        ->and(Num::toMyanmar(''))->toEqual('')
        ->and(Num::toThai(''))->toEqual('')
        ->and(Num::toEnglish(''))->toEqual('');
});
