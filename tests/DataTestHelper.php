<?php

namespace GenieFintech\Num\Tests;

trait DataTestHelper
{
    protected function myanmarNumber(): string
    {
        return '၁၂၃၄၅၆၇၈၉၀';
    }

    protected function englishNumber(): string
    {
        return 1234567890;
    }

    protected function thaiNumber(): string
    {
        return "๑๒๓๔๕๖๗๘๙๐";
    }

    protected function myanmarShanNumber(): string
    {
        return "႑႒႓႔႕႖႗႘႙႐";
    }
}
