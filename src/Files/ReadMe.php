<?php

namespace Skeleton\Files;

use Exception;

class ReadMe
{
    /**
     * @var string
     */
    private $fullPath;


    public function  __construct($fullPath, $title)
    {
        $this->ensurePathIsString($fullPath);
        $this->fullPath = $fullPath;
        $this->title = $title;
    }

    public function createReadMe()
    {
        return fopen($this->fullPath . '/readme.md', 'w');
    }

    public function writeReadMe()
    {
        $readme = fopen($this->fullPath . '/readme.md', 'w');

        $header = "# " . $this->title;

        fwrite($readme, $header);
        fclose($readme);
    }

    private function ensurePathIsString($fullPath)
    {
        if(!is_string($fullPath)){
            throw new Exception(sprintf('The directory path is not a string: %s', $fullPath));
        }
    }
}