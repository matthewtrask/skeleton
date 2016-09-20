<?php


namespace Skeleton\Files;


use Exception;

class Directories
{

    /**
     * @var string
     */
    protected $fullPath;

    /**
     * Permission for the directories being created
     */
    const PERMS = 0755;

    /**
     * @param $fullPath
     */
    public function __construct($fullPath)
    {
        $this->checkPath($fullPath);
        $this->fullPath = $fullPath;
    }

    /**
     * @throws Exception
     */
    public function createSrcDir()
    {
        return mkdir($this->fullPath . '/src', Directories::PERMS, true);
    }

    public function createTestsDir()
    {
        return mkdir($this->fullPath . '/tests', Directories::PERMS, true);
    }

    private function checkPath($fullPath)
    {
        if(!is_string($fullPath)){
            throw new Exception('You must pass a string for the directory path. %s is not a string', $fullPath);
        }
    }
}