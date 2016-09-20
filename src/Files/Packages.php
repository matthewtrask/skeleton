<?php

namespace Skeleton\Files;

use Exception;

class Packages
{
    /**
     * @var string
     */
    private $fullPath;

    public function __construct($fullPath)
    {
        $this->ensurePathIsString($fullPath);
        $this->fullPath = $fullPath;
    }

    public function createFile()
    {
        return fopen($this->fullPath . '/package.json', 'w');
    }

    public function writeFile()
    {
        $package = fopen($this->fullPath . '/package.json', 'w');
        $array = [
            'private' => 'true',
            'scripts' => [
                'prod' => 'gulp --production',
                'dev' => 'gulp watch'
            ],
            'devDependencies' => [

            ]
        ];
        $data = json_encode($array, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        fwrite($package, $data);
        fclose($package);
    }

    private function ensurePathIsString($fullPath)
    {
        if(!is_string($fullPath)){
            throw new Exception(sprintf('The directory path is not a string: %s', $fullPath));
        }
    }
}