<?php

namespace Skeleton\Files;

use Exception;

class Gitignore
{
    protected $fullPath;

    public function __construct($fullPath)
    {
        $this->ensurePathIsString($fullPath);
        $this->fullPath = $fullPath;
    }

    public function createGitignore()
    {
        return fopen($this->fullPath . '/.gitignore', 'w');
    }

    public function writeGitignore()
    {
        $gitignore = fopen($this->fullPath . '/.gitignore', 'w');

        $data = 'vendor/';
        $data .= "\r\n";
        $data .= '.env';
        $data .= "\r\n";
        $data .= ".idea";
        $data .= "\r\n";
        $data .= ".DS_Store";

        fwrite($gitignore, $data);
        fclose($gitignore);
    }

    private function ensurePathIsString($fullPath)
    {
        if(!is_string($fullPath)){
            throw new Exception(sprintf('The directory path is not a string: %s', $fullPath));
        }
    }
}