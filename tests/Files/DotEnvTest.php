<?php


namespace Skeleton\Files;


use PHPUnit_Framework_TestCase;
use Exception;

class DotEnvTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var string
     */
    private $fullPath;

    /**
     * @var DotEnv
     */
    private $dotenv;

    public function setup()
    {
        $this->fullPath = __DIR__ . '/test';

        $this->dotenv = new DotEnv($this->fullPath);
    }

    public function testCanCreateInstanceOf()
    {
        $this->assertInstanceOf(DotEnv::class, $this->dotenv);
    }

    public function testCanCreateFile()
    {
        $this->dotenv->createFile();
        $this->assertFileExists($this->fullPath . '/.env');
    }

    public function testCanWriteFile()
    {
        $this->dotenv->writeFile();
        $this->assertNotEmpty($this->fullPath . '/.env');
    }

    public function testWillThrowExceptionIfNotString()
    {
        $this->expectException(Exception::class);
        $dotenv = new DotEnv(111);
    }
}
