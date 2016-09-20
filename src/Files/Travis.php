<?php


namespace Skeleton\Files;

use Exception;
use Symfony\Component\Yaml\Yaml;


class Travis
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

    public function createTravis()
    {
        return fopen($this->fullPath . '/.travis.yml', 'w');
    }

    public function writeTravis()
    {
        $array = [
            'sudo' => 'false',
            'language' => 'php',
            'php' => [5.6, 7],
            'before_install' => ['composer self-update','composer install'],
            'script' => 'phpunit'
        ];

        $yaml = Yaml::dump($array);
        file_put_contents($this->fullPath . '/.travis.yml', $yaml);
    }

    private function ensurePathIsString($fullPath)
    {
        if(!is_string($fullPath)){
            throw new Exception(sprintf('The path is not a string: %s', $fullPath));
        }
    }
}