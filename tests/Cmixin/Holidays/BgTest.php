<?php

namespace Tests\Cmixin\Holidays;

use Cmixin\BusinessDay;
use PHPUnit\Framework\TestCase;

class BgTest extends TestCase
{
    const CARBON_CLASS = 'Carbon\Carbon';

    protected function setUp()
    {
        BusinessDay::enable(static::CARBON_CLASS);
        $carbon = static::CARBON_CLASS;
        $carbon::resetHolidays();
    }

    public function testHolidays()
    {
        $carbon = static::CARBON_CLASS;
        $carbon::resetHolidays();
        $carbon::setHolidaysRegion('bg-national');

        self::assertFalse($carbon::parse('2019-04-18')->isHoliday());
        self::assertTrue($carbon::parse('2019-04-19')->isHoliday());
        self::assertTrue($carbon::parse('2019-04-20')->isHoliday());
        self::assertTrue($carbon::parse('2019-04-21')->isHoliday());
        self::assertTrue($carbon::parse('2019-04-22')->isHoliday());
        self::assertFalse($carbon::parse('2019-04-23')->isHoliday());
    }
}
