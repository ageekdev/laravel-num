<?php

it('convert english to myanmar', function () {
    $this->assertSame($this->myanmarNumber(), num_convert($this->englishNumber(), 'mm', 'en'));
});

it('convert to myanmar ', function () {
    $this->assertSame($this->myanmarNumber(), num_to_mm($this->englishNumber()));
});

it('convert to thai', function () {
    $this->assertSame($this->thaiNumber(), num_to_th($this->englishNumber()));
});

it('convert to english', function () {
    $this->assertSame($this->englishNumber(), num_to_eng($this->thaiNumber()));
});
