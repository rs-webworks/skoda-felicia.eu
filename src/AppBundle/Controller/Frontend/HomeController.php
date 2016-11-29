<?php

namespace AppBundle\Controller\Frontend;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Yaml\Yaml;

class HomeController extends Controller
{
    /**
     * @Route("/", name="frontend_home")
     * @Template("frontend/home/index.twig")
     */
    public function indexAction()
    {
        $finder = new Finder();
        $files = $finder->files()->in($this->getParameter('kernel.root_dir') . '/Resources')->name('changelog.yml');

        foreach ($files as $file) {
            $changelog = Yaml::parse($file->getContents());
            return array(
                'latest' => reset($changelog),
                'version' => key($changelog),
                'dbstats' => array(
                    'manuals' => count($this->get('app.service.manual')->getAll())
                )
            );
        }
    }

}
