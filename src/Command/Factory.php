<?php
/**
 * Created by PhpStorm.
 * User: matthewtrask
 * Date: 8/26/16
 * Time: 4:46 PM
 */

namespace Skeleton\Command;


use Skeleton\Files\Directories;

class Factory
{
    /**
     * @var string
     */
    protected $fullPath;

    /**
     * @var Directories
     */
    protected $directories;

    /**
     * Factory constructor.
     * @param $fullPath
     * @param Directories $directories
     */
    public function __construct($fullPath, Directories $directories)
    {
        $this->fullPath = $fullPath;
        $this->directories = new Directories($this->fullPath);
    }

    public function createSrcDir()
    {
        return $this->directories->createSrcDir();
    }

    public function createTestsDir()
    {
        $this->directories->createTestsDir();
    }

    public function createBinDirectory()
    {
        mkdir($this->fullPath . '/bin/', Factory::PERMS, true);
    }
    
    public function createReadme()
    {
        fopen($this->fullPath . '/readme.md', 'w');
    }

    public function createTravis()
    {
        fopen($this->fullPath . '/.travis.yml', 'w');
    }

    public function cratePhpunit()
    {
        fopen($this->fullPath . '/phpunit.xml', 'w');
    }

    public function createGitignore()
    {
        fopen($this->fullPath . '/.gitignore', 'w');
    }

    public function createScrutinizer()
    {
        fopen($this->fullPath . '/.scrutinizer.yml', 'w');
    }

    public function createComposer()
    {
        fopen($this->fullPath . '/composer.json', 'w');
    }

    public function createPhpspec()
    {
        fopen($this->fullPath . '/phpspec.yml', 'w');
    }

    public function createChangelog()
    {
        fopen($this->fullPath . '/changelog.md', 'w');
    }
}