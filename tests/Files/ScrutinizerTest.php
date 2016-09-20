<?php


namespace Skeleton\Files;

use Exception;
use Symfony\Component\Yaml\Yaml;

class ScrutinizerTest extends \PHPUnit_Framework_TestCase
{
    protected $fullPath;

    /**
     * @var Scrutinizer
     */
    protected $scrutinizer;

    public function setup()
    {
        $this->fullPath = __DIR__ . '/test';

        $this->scrutinizer = new Scrutinizer($this->fullPath);
    }

    public function testCanGetInstanceOf()
    {
        $this->assertInstanceOf(Scrutinizer::class, $this->scrutinizer);
    }

    public function testCreateScrutinizer()
    {
        $this->scrutinizer->createFile();
        $this->assertFileExists($this->fullPath . '/.scrutinizer.yml');
    }

    public function testCanWriteScrutinizer()
    {
        $this->scrutinizer->writeFile();
        $this->assertNotEmpty($this->fullPath . '/.scrutinizer.yml');

        $data = Yaml::parse(file_get_contents($this->fullPath . '/.scrutinizer.yml'));
        $this->assertArrayHasKey('build', $data);
        $this->assertArrayHasKey('checks', $data);
    }

    public function testWillThrowExceptionIfNotString()
    {
        $this->expectException(Exception::class);
        $this->scrutinizer = new Scrutinizer(111);
    }
}
