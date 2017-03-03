<?php

namespace AppBundle\Controller\Frontend;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Yaml\Yaml;

class AboutController extends Controller
{
    /**
     * @Route("/o-projektu/changelog", name="frontend_about_changelog", options={"sitemap"=true})
     * @Template("frontend/about/changelog.html.twig")
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
     * @Route("/o-projektu/autori", name="frontend_about_authors", options={"sitemap"=true})
     * @Template("frontend/about/authors.html.twig")
     */
    public function authorsAction()
    {

    }

    /**
     * @Route("/o-projektu/mapa_stranek", name="frontend_sitemap", options={"sitemap"=true})
     * @Template("frontend/about/sitemap.html.twig")
     */
    public function sitemapAction()
    {
        return array(
            'downloadCategories' => $this->getDoctrine()->getRepository('AppBundle:Download\Category')->findBy(array(), array('position' => 'ASC')),
            'manualCategories' => $this->getDoctrine()->getRepository('AppBundle:Manual\Category')->findBy(array(), array('position' => 'ASC')),
        );
    }


    /**
     * @Route("/pripravujeme", name="frontend_notyet")
     * @Template("frontend/about/notyet.html.twig")
     */
    public function notyetAction()
    {

    }
}
