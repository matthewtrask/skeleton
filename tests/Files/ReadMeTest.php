<?php


namespace Skeleton\Files;


use Exception;
use PHPUnit_Framework_TestCase;

class ReadMeTest extends PHPUnit_Framework_TestCase
{
    protected $fullPath;

    /**
     * @var ReadMe
     */
    protected $readme;

    protected $title;

    public function setup()
    {
        $this->fullPath = __DIR__ . '/test';

        $this->title = "Test Project";

        $this->readme = new ReadMe($this->fullPath, $this->title);
    }

    public function testCanGetInstanceOf()
    {
        $this->assertInstanceOf(ReadMe::class, $this->readme);
    }

    public function testWillThrowExceptionIfNotString()
    {
        $this->expectException(Exception::class);
        $this->readme = new ReadMe(111, $this->title);
    }

    public function testCanCreateReadMe()
    {
        $this->readme->createReadMe();
        $this->assertEquals('/Users/matthewtrask/Documents/personal-dev/Skeleton/tests/Files/test/readme.md', $this->fullPath . '/readme.md');
    }

    public function testCanWriteToReadMe()
    {
        $this->readme->writeReadMe();
        $this->assertNotEmpty($this->fullPath . '/readme.md');
    }
}
