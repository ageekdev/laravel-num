<?php

it('convert english to myanmar', function () {
    expect(num_convert($this->englishNumber(), 'mm', 'en'))
        ->toEqual($this->myanmarNumber());
});

it('convert to myanmar ', function () {
    expect(num_to_mm($this->englishNumber()))
        ->toEqual($this->myanmarNumber());
});

it('convert to thai', function () {
    expect(num_to_th($this->englishNumber()))
        ->toEqual($this->thaiNumber());
});

it('convert to english', function () {
    expect(num_to_eng($this->thaiNumber()))
        ->toEqual($this->englishNumber());
});
