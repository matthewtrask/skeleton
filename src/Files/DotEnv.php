<?php


namespace Skeleton\Files;


use Exception;

class DotEnv
{
    private $fullPath;

    public function __construct($fullPath)
    {
        $this->ensurePathIsString($fullPath);
        $this->fullPath = $fullPath;
    }

    public function createFile()
    {
        return fopen($this->fullPath . '/.env', 'w');
    }

    public function writeFile()
    {
        $dotenv = fopen($this->fullPath . '/.env', 'w');

        $data = 'MYSQL_HOST=';
        $data .= "\r\n";
        $data .= 'MYSQL_NAME=';
        $data .= "\r\n";
        $data .= 'MYSQL_USER=';
        $data .= "\r\n";
        $data .= 'MYSQL_PASS=';
        $data .= "\r\n";

        fwrite($dotenv, $data);
        fclose($dotenv);
    }

    private function ensurePathIsString($fullPath)
    {
        if(!is_string($fullPath)){
            throw new Exception(sprintf('The path must be a string: %s', $fullPath));
        }
    }
}