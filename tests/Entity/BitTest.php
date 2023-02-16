<?php

namespace App\Tests\Entity;

use App\Entity\Bit;
use App\Entity\Record;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class BitTest extends KernelTestCase
{
    /**
     * @return void
     */
    protected function setUp(): void
    {
        self::bootKernel();
    }

    /**
     * @return void
     */
    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @return void
     * @throws \Exception
     */
    public function testRecordKBits(): void
    {
        $record = Record::buildFromLine(Record::TEST_K_LINE);

        /** @var Bit[] $bits */
        $bits = $record->getBits();
        foreach ([
                     10,
                     24,
                     37,
                     48,
                     55,
                     70,
                     71,
                     76,
                     77,
                     81,
                     91,
                     99,
                     107,
                     109,
                 ] as $index => $expected) {
            $this->assertEquals($expected, $bits[$index]->getBit());
        }
    }

    /**
     * @return void
     * @throws \Exception
     */
    public function testRecordIBits(): void
    {
        $record = Record::buildFromLine(Record::TEST_I_LINE);

        /** @var Bit[] $bits */
        $bits = $record->getBits();
        foreach ([
                     1,
                     15,
                     28,
                     39,
                     46,
                     61,
                     62,
                     67,
                     68,
                     72,
                     82,
                     90,
                     98,
                     100,
                 ] as $index => $expected) {
            $this->assertEquals($expected, $bits[$index]->getBit());
        }
    }
}