<?php


namespace Skeleton\Files;

use Exception;

class PackageTest extends \PHPUnit_Framework_TestCase
{

    private $fullPath;

    /**
     * @var Packages
     */
    private $package;

    public function setup()
    {
        $this->fullPath = __DIR__ . '/test';
        $this->package = new Packages($this->fullPath);
    }

    public function testCanCreatePackage()
    {
        $this->package->createFile();
        $this->assertFileExists($this->fullPath . '/package.json');
    }

    public function testCanWriteFile()
    {
        $this->package->writeFile();
        $this->assertNotEmpty($this->fullPath . '/package.json');
    }

    public function testWillThrowExceptionForNonString()
    {
        $this->expectException(Exception::class);
        $packages = new Packages(111);
    }
}
