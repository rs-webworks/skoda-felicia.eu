<?php

namespace AppBundle\Controller\Frontend;

use AppBundle\Service\DownloadService;
use AppBundle\Service\ManualService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Yaml\Yaml;

class HomeController extends Controller
{
    /**
     * @Route("/", name="frontend_home", options={"sitemap"=true})
     * @Template("frontend/home/index.html.twig")
     * @param ManualService $manualService
     * @param DownloadService $downloadService
     * @return array
     */
    public function indexAction(ManualService $manualService, DownloadService $downloadService)
    {
        $finder = new Finder();
        $files = $finder->files()->in($this->getParameter('kernel.root_dir') . '/Resources')->name('changelog.yml');

        foreach ($files as $file) {
            $changelog = Yaml::parse($file->getContents());
            return array(
                'latest' => reset($changelog),
                'version' => key($changelog),
                'dbstats' => array(
                    'manuals' => $manualService->countAll(),
                    'downloads' => $downloadService->countAll(),
                    'articles_technical_data' => count($this->getDoctrine()->getRepository('AppBundle:Article\Category')->findOneBy(array('slug' => 'technicka-data'))->getArticles())
                )
            );
        }
    }

    /**
     * @Route("/styl/{theme}", name="frontend_switch_theme")
     * @param $theme
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function switchThemeAction(Request $request, $theme)
    {
        $themes = array(
            'lightEmerald',
            'lightCherry',
            'lightSky',
            'darkObsidian',
            'darkEmerald',
            'darkCherry',
            'darkSky'
        );

        $url = $request->headers->get('referer');
        if (!$url) {
            $url = $this->generateUrl('frontend_home');
        }

        $response = new RedirectResponse($url);

        if (array_search($theme, $themes) !== false) {
            $cookie = new Cookie('selectedTheme', $theme);
            $response->headers->setCookie($cookie);
        }

        return $response;
    }
}
