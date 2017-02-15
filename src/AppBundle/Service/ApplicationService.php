<?php

namespace AppBundle\Service;


use Symfony\Component\Finder\Finder;
use Symfony\Component\Yaml\Yaml;

class ApplicationService
{

    /** @var string */
    protected $kernelPath;

    /** @var integer */
    protected $currentVersion;

    /**
     * ApplicationService constructor.
     */
    public function __construct($kernelPath)
    {
        $this->kernelPath = $kernelPath;
    }

    /**
     * @return integer
     */
    public function getCurrentVersion()
    {
        if ($this->currentVersion !== null) {
            return $this->currentVersion;
        }

        $finder = new Finder();
        $files = $finder->files()->in($this->kernelPath . '/Resources')->name('changelog.yml');

        foreach ($files as $file) {
            $changelog = Yaml::parse($file->getContents());
        }

        reset($changelog);
        return $this->currentVersion = key($changelog);
    }

}