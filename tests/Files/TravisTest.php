<?php


namespace Skeleton\Files;


use Exception;
use Symfony\Component\Yaml\Yaml;

class TravisTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var string
     */
    protected $fullPath;

    /**
     * @var Travis
     */
    protected $travis;

    public function setup()
    {
        $this->fullPath = __DIR__ . '/test';

        $this->travis = new Travis($this->fullPath);
    }

    public function testCanGetInstanceOf()
    {
        $this->assertInstanceOf(Travis::class, $this->travis);
    }

    public function testCanCreateTravis()
    {
        $this->travis->createTravis();
        $this->assertFileExists($this->fullPath . '/.travis.yml');
    }

    public function testCanWriteTravis()
    {
        $this->travis->writeTravis();
        $this->assertNotEmpty($this->fullPath . '/.travis.yml');
        $yaml = Yaml::parse(file_get_contents($this->fullPath . '/.travis.yml'));
        $this->assertArrayHasKey('sudo', $yaml);
        $this->assertArrayHasKey('language', $yaml);
        $this->assertArrayHasKey('php', $yaml);
    }

    public function testWillThrowExceptionForNonString()
    {
        $this->expectException(Exception::class);
        $travis = new Travis(111);
    }
}
