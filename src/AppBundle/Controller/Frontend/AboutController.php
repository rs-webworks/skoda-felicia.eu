<?php

namespace AppBundle\Controller\Frontend;

use AppBundle\Form\SearchForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Yaml\Yaml;

class AboutController extends Controller
{
    /**
     * @Route("/informace/changelog", name="frontend_about_changelog")
     * @Template("frontend/about/changelog.twig")
     */
    public function changelogAction()
    {
        $finder = new Finder();
        $files = $finder->files()->in($this->getParameter('kernel.root_dir') . '/Resources')->name('changelog.yml');

        foreach ($files as $file) {
            return array('changelog' => Yaml::parse($file->getContents()));
        }
    }

    /**
     * @Route("/informace/autori", name="frontend_about_authors")
     * @Template("frontend/about/authors.twig")
     */
    public function authorsAction()
    {

    }
}