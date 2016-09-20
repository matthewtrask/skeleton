<?php

namespace Skeleton\Files;

use Exception;

class GitignoreTest extends \PHPUnit_Framework_TestCase
{
    protected $fullPath;

    /**
     * @var Gitignore
     */
    protected $gitignore;

    public function setup()
    {
        $this->fullPath = __DIR__ . '/test';

        $this->gitignore = new Gitignore($this->fullPath);
    }

    public function testCanGetInstanceOf()
    {
        $this->assertInstanceOf(Gitignore::class, $this->gitignore);
    }

    public function testCreateGitignore()
    {
        $this->gitignore->createGitignore();
        $this->assertFileExists($this->fullPath . '/.gitignore');
    }

    public function testWriteGitignore()
    {
        $this->gitignore->writeGitignore();
        $this->assertNotEmpty($this->fullPath . '/.gitignore');
    }

    public function testWillThrowExceptionIfNotString()
    {
        $this->expectException(Exception::class);
        $this->gitignore = new Gitignore(111);
    }
}
