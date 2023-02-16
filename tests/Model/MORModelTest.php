<?php

namespace App\Tests\Command;

use App\Model\MORModel;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Tester\CommandTester;

class MORModelTest extends KernelTestCase
{
    /** @var EntityManagerInterface|null  */
    private ?EntityManagerInterface $entityManager;

    /** @var MORModel|null  */
    private ?MORModel $morModel;

    protected function setUp(): void
    {
        self::bootKernel();

        $this->entityManager = $this
            ->getMockBuilder(EntityManagerInterface::class)
            ->getMock();

        $this->morModel = new MORModel($this->entityManager);
    }

    /**
     * @return void
     */
    protected function tearDown(): void
    {
        parent::tearDown();
        if ($this->entityManager instanceof EntityManagerInterface) {
            $this->entityManager = null;
        }
        $this->morModel = null;
    }

    /**
     * @return void
     * @throws \Exception
     */
    public function testExecuteFileNotFound(): void
    {
        $filePath = 'path/not/found.txt';

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage(sprintf("File: %s was not found.", $filePath));

        if ($this->morModel instanceof MORModel) {
            $this->morModel->processMOR($filePath);
        }
    }
}