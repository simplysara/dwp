<?php

namespace App\Tests\Command;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Tester\CommandTester;
use Symfony\Component\Console\Exception\RuntimeException;

class MORCommandTest extends KernelTestCase
{
    /** @var CommandTester|null  */
    private ?CommandTester $commandTester;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $kernel = self::bootKernel();
        $application = new Application($kernel);

        $this->commandTester = new CommandTester($application->find('app:process:mor'));
    }

    /**
     * @return void
     */
    protected function tearDown(): void
    {
        parent::tearDown();
        $this->commandTester = null;
    }

    /**
     * @return void
     */
    public function testNoFileArgument(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Not enough arguments (missing: "filePath").');

        if (!$this->commandTester instanceof CommandTester) {
            throw new \RuntimeException('Class property [$commandTester] is null');
        }

        $this->commandTester->execute([]);
    }

    /**
     * @return void
     */
    public function testExecuteFileNotFound(): void
    {
        $filePath = 'data/mor-file-clean.txt2';

        if (!$this->commandTester instanceof CommandTester) {
            throw new \RuntimeException('Class property [$commandTester] is null');
        }
        $this->commandTester->execute([
            'filePath'      => $filePath,
            '--limit'       =>  10,
            '--showResults' =>  '',
        ]);

        $this->assertStringContainsString(sprintf("File: %s was not found.", $filePath), $this->commandTester->getDisplay());

        if (!$this->commandTester instanceof CommandTester) {
            throw new \RuntimeException('Class property [$commandTester] is null');
        }
        $this->assertEquals(Command::FAILURE, $this->commandTester->getStatusCode());
    }

    /**
     * @return void
     */
    public function testExecuteLoad(): void
    {
        if (!$this->commandTester instanceof CommandTester) {
            throw new \RuntimeException('Class property [$commandTester] is null');
        }

        $filePath = 'data/mor-file-clean.txt';

        $this->commandTester->execute([
            'filePath'      => $filePath,
            '--limit'       =>  10,
            '--showResults' =>  '',
        ]);

        $this->assertEquals(Command::SUCCESS, $this->commandTester->getStatusCode());
    }
}