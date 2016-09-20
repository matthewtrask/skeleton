<?php


namespace Skeleton\Files;

use Symfony\Component\Yaml\Yaml;
use Exception;

class Scrutinizer
{
    protected $fullPath;

    public function __construct($fullPath)
    {
        $this->ensurePathIsString($fullPath);
        $this->fullPath = $fullPath;
    }

    public function createFile()
    {
        return fopen($this->fullPath . '/.scrutinizer.yml', 'w');
    }

    public function writeFile()
    {
        $scrutinizer = fopen($this->fullPath . '/.scrutinizer.yml', 'w');
        $array = [
            'build' => [
                'environment' => [
                    'php' => '7.0',
                    'redis' => 'true'
                ],
                'tests' => [
                    'override' => [
                        'command' => 'bin/phpspec run',
                        'coverage' => [
                            'file' => 'coverage.xml',
                            'format' => 'clover'
                        ]
                    ]
                ]
            ],
            'checks' => [
                'php' => 'true'
            ],
            'coding_style' => [
                'php' => [
                    'spaces' => [
                        'before_parentheses' => 'true'
                    ],
                    'within' => [
                        'brackets' => 'true'
                    ]
                ]
            ],
            'filter' => [
                'excluded_paths' => [
                ]
            ]
        ];

        $yaml = Yaml::dump($array);
        fwrite($scrutinizer, $yaml);
        fclose($scrutinizer);
    }

    private function ensurePathIsString($fullPath)
    {
        if(!is_string($fullPath)){
            throw new Exception(sprintf('The path is not a string: %s', $fullPath));
        }
    }
}