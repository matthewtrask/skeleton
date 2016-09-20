<?php

namespace Skeleton\Files;

use Exception;
use PHPUnit_Framework_TestCase;

class ComposerTest extends PHPUnit_Framework_TestCase
{
    protected $metaData;
    protected $packages;
    protected $devPackages;
    protected $autoloader;
    /**
     * @var Composer
     */
    private $composer;

    /**
     * @var string
     */
    private $fullPath;

    public function setup()
    {
        $this->fullPath = __DIR__ . '/test';
        $this->metaData = [
            'name' => 'Skeleton',
            'license' => 'MIT',
            'package' => 'Library',
            'keywords' => ['test', 'test', 'test'],
            'author' => [
                'name' => 'Matt Trask',
                'role' => 'Developer',
                'email' => 'me@matthewtrask.net'
            ]
        ];
        $this->packages = [
            'require' => [
                'Test/Test' => '*'
            ],
        ];

        $this->devPackages = [
            'require-dev' => [
                'phpunit/phpunit' => '5.0.0',
            ],
        ];

        $this->autoloader = [
            'autoload'=> [
                'psr-4' => [
                    'Skeleton\\' => 'src/'
                ]
            ]
        ];

        $this->composer = new Composer($this->fullPath, $this->metaData, $this->packages, $this->devPackages, $this->autoloader);
    }

    public function testCanGetInstanceOf()
    {
        $this->assertInstanceOf(Composer::class, $this->composer);
    }

    public function testCanCreateComposerFile()
    {
        $this->composer->createComposerFile();
        $this->assertFileExists($this->fullPath . '/composer.json');
    }

    public function testWillThrowExceptionForBadPath()
    {
        $this->expectException(Exception::class);
        $this->composer = new Composer(111, $this->metaData, $this->packages, $this->devPackages, $this->autoloader);
    }

    public function testCanWriteFile()
    {
        $this->composer->writeComposerFileMetaData();
        $this->assertNotEmpty($this->fullPath . '/composer.json');
    }
}
