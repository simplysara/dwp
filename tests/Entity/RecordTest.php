<?php

namespace App\Tests\Entity;

use App\Entity\Record;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class RecordTest extends KernelTestCase
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
    public function testRecordKLoad(): void
    {
        $record = Record::buildFromLine(Record::TEST_K_LINE);

        $this->assertEquals("K", $record->getType());
        $this->assertEquals("1FDNQ1G3YB7", $record->getBeneficiaryId());
        $this->assertEquals("RUECKER", $record->getLastName());
        $this->assertEquals("RANSOM", $record->getFirstName());
        $this->assertEquals("H", $record->getInitial());
        $this->assertEquals("1960-11-06", $record->getBirthDate()->format('Y-m-d'));
        $this->assertEquals(Record::getGenderChoices()[1], $record->getGenderString());
    }

    /**
     * @return void
     * @throws \Exception
     */
    public function testRecordILoad(): void
    {
        $record = Record::buildFromLine(Record::TEST_I_LINE);

        $this->assertEquals("I", $record->getType());
        $this->assertEquals("1FDNQ1G3YB7", $record->getBeneficiaryId());
        $this->assertEquals("RUECKER", $record->getLastName());
        $this->assertEquals("RANSOM", $record->getFirstName());
        $this->assertEquals("H", $record->getInitial());
        $this->assertEquals("1960-11-06", $record->getBirthDate()->format('Y-m-d'));
        $this->assertEquals(Record::getGenderChoices()[1], $record->getGenderString());
    }
}