<?php


namespace Skeleton\Files;

use Exception;
use PHPUnit_Framework_TestCase;

class ChangelogTest extends PHPUnit_Framework_TestCase
{
    protected $fullPath;

    /**
     * @var Changelog
     */
    protected $changelog;

    public function setup()
    {
        $this->fullPath = __DIR__ . '/test';

        $this->changelog = new Changelog($this->fullPath);
    }

    public function testCanGetInstanceOf()
    {
        $this->assertInstanceOf(Changelog::class, $this->changelog);
    }

    public function testCanCreateChangeLog()
    {
        $this->changelog->createChangelog();
        $this->assertFileExists($this->fullPath . '/changelog.md');
    }

    public function testCanWriteChangelog()
    {
        $this->changelog->writeChangelog();
        $this->assertNotEmpty($this->fullPath . '/changelog.md');
    }

    public function testWillThrowExceptionIfNotString()
    {
        $this->expectException(Exception::class);
        $this->changelog = new Changelog(111);
    }
}
