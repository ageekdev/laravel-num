<?php

namespace AgeekDev\Num\Tests;

trait DataTestHelper
{
    public function myanmarNumber(): string
    {
        return '၁၂၃၄၅၆၇၈၉၀';
    }

    public function englishNumber(): string
    {
        return 1234567890;
    }

    public function thaiNumber(): string
    {
        return '๑๒๓๔๕๖๗๘๙๐';
    }

    public function myanmarShanNumber(): string
    {
        return '႑႒႓႔႕႖႗႘႙႐';
    }
}
