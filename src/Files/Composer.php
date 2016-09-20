<?php


namespace Skeleton\Files;


use Exception;

class Composer
{
    /**
     * @var string
     */
    private $fullPath;

    /**
     * @var array
     */
    private $packages;
    /**
     * @var array
     */
    private $devPackages;
    /**
     * @var array
     */
    private $metaData;
    /**
     * @var array
     */
    private $autoloader;


    /**
     * Composer constructor.
     * @param $fullPath
     * @param array $metaData
     * @param array $packages
     * @param array $devPackages
     * @param array $autoloader
     */
    public function __construct($fullPath, array $metaData, array $packages, array $devPackages, array $autoloader)
    {
        $this->ensureIsString($fullPath);
        $this->fullPath = $fullPath;
        $this->metaData = $metaData;
        $this->packages = $packages;
        $this->devPackages = $devPackages;
        $this->autoloader = $autoloader;
    }

    public function createComposerFile()
    {
        return fopen($this->fullPath . '/composer.json', 'w');
    }

    public function writeComposerFileMetaData()
    {
        $meta = json_encode($this->metaData, JSON_PRETTY_PRINT);
        $this->writeComposerFilePackages($meta);
    }

    public function writeComposerFilePackages($data)
    {
        $data .= json_encode($this->packages, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        $this->writeToFile($data);
        //$this->writeComposerDevPackages($data);
    }

    public function writeComposerDevPackages($data)
    {
        $data .= json_encode($this->devPackages, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        $this->writeAutoload($data);
    }

    public function writeAutoload($data)
    {
        $data .= json_encode($this->autoloader, JSON_PRETTY_PRINT);
        $this->writeToFile($data);
    }

    private function writeToFile($data)
    {
        $composer = fopen($this->fullPath . '/composer.json', 'w');
        fwrite($composer, $data);
        fclose($composer);
    }


    private function ensureIsString($fullPath)
    {
        if(!is_string($fullPath)){
            throw new Exception(sprintf('The directory path is not a string: %s', $fullPath));
        }
    }
}