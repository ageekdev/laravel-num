<?php

it('converts english to myanmar', function () {
    expect(num_convert($this->englishNumber(), 'mm', 'en'))
        ->toEqual($this->myanmarNumber());
});

it('converts to myanmar ', function () {
    expect(num_to_mm($this->englishNumber()))
        ->toEqual($this->myanmarNumber());
});

it('converts to thai', function () {
    expect(num_to_th($this->englishNumber()))
        ->toEqual($this->thaiNumber());
});

it('converts to english', function () {
    expect(num_to_eng($this->thaiNumber()))
        ->toEqual($this->englishNumber());
});

it('throws $to invalid argument exception', function () {
    num_convert($this->englishNumber(), 'shan', 'en');
})->throws(InvalidArgumentException::class);

it('throws $from invalid argument exception', function () {
    num_convert($this->englishNumber(), 'en', 'shan');
})->throws(InvalidArgumentException::class);

it('converts null', function () {
    expect(num_convert(null))->toEqual(null)
        ->and(num_to_mm(null))->toEqual(null)
        ->and(num_to_th(null))->toEqual(null)
        ->and(num_to_eng(null))->toEqual(null);
});

it('converts empty string', function () {
    expect(num_convert(''))->toEqual('')
        ->and(num_to_mm(''))->toEqual('')
        ->and(num_to_th(''))->toEqual('')
        ->and(num_to_eng(''))->toEqual('');
});
