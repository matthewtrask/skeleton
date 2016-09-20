<?php

namespace Skeleton\Files;

use Exception;

class Changelog
{
    /**
     * @var string
     */
    protected $fullPath;

    public function __construct($fullPath)
    {
        $this->ensurePathIsString($fullPath);
        $this->fullPath = $fullPath;
    }

    public function createChangelog()
    {
        return fopen($this->fullPath . '/changelog.md', 'w');
    }

    public function writeChangelog()
    {
        $changelog = fopen($this->fullPath . '/changelog.md', 'w');

        $header = "# Changelog";
        fwrite($changelog, $header);
        fclose($changelog);
    }

    private function ensurePathIsString($fullPath)
    {
        if(!is_string($fullPath)){
            throw new Exception(sprintf('The directory path is not a string: %s', $fullPath));
        }
    }
}