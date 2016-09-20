<?php


namespace Skeleton\Files;

use Exception;

class DirectoriesTest extends \PHPUnit_Framework_TestCase
{
    private static $fullPath;

    /**
     * @var Directories
     */
    private $directories;

    public function setup()
    {
        self::$fullPath = __DIR__ . '/test';
        $this->directories = new Directories(self::$fullPath);
    }

    public function testCanGetInstanceOf()
    {
        $this->assertInstanceOf(Directories::class, $this->directories);
    }

    public function testCanCreateSrcDir()
    {
        $this->directories->createSrcDir();
        $this->assertEquals('/Users/matthewtrask/Documents/personal-dev/Skeleton/tests/Files/test/src', self::$fullPath . '/src');
    }

    public function testCanCreateTestDir()
    {
        $this->directories->createTestsDir();
        $this->assertEquals('/Users/matthewtrask/Documents/personal-dev/Skeleton/tests/Files/test/tests', self::$fullPath . '/tests');
    }

    public function testWillThrowExceptionForBadPath()
    {
        $this->expectException(Exception::class);
        $directories = new Directories(111);
    }
}
