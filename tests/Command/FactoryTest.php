<?php

namespace Skeleton\Command;


use Skeleton\Files\Directories;

class FactoryTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Factory
     */
    private $factory;

    /**
     * @var Directories
     */
    private $directories;

    /**
     * @var string
     */
    protected static $fullPath;

    public function setup()
    {
        self::$fullPath = __DIR__ . '/../Files/test';

        $this->directories = new Directories(self::$fullPath);

        $this->factory = new Factory(self::$fullPath, $this->directories);
    }

    public function testCanGetInstanceOf()
    {
        $this->assertInstanceOf(Factory::class, $this->factory);
    }

    public function testCanCreateSrcDirs()
    {
        $this->directories->createSrcDir();
        $this->assertEquals('/Users/matthewtrask/Documents/personal-dev/Skeleton/tests/Files/test/src', self::$fullPath . '/src');
    }

//    public static function tearDownAfterClass()
//    {
//        unlink(self::$fullPath . '/readme.md');
//        unlink(self::$fullPath . '/.travis.yml');
//        unlink(self::$fullPath . '/.gitignore');
//        unlink(self::$fullPath . '/phpunit.xml');
//        unlink(self::$fullPath . '/phpspec.yml');
//        unlink(self::$fullPath . '/.scrutinizer.yml');
//        rmdir(self::$fullPath . '/src');
//        rmdir(self::$fullPath . '/tests');
//        rmdir(self::$fullPath);
//    }

}
