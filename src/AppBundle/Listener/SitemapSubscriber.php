<?php

namespace AppBundle\Listener;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Presta\SitemapBundle\Event\SitemapPopulateEvent;
use Presta\SitemapBundle\Sitemap\Url\UrlConcrete;

class SitemapSubscriber implements EventSubscriberInterface
{
    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * @var ObjectManager
     */
    private $manager;

    /**
     * @param UrlGeneratorInterface $urlGenerator
     * @param ObjectManager $manager
     */
    public function __construct(UrlGeneratorInterface $urlGenerator, ObjectManager $manager)
    {
        $this->urlGenerator = $urlGenerator;
        $this->manager = $manager;
    }

    /**
     * @inheritdoc
     */
    public static function getSubscribedEvents()
    {
        return [
            SitemapPopulateEvent::ON_SITEMAP_POPULATE => 'registerPages', // call php bin/console presta:sitemap:dump
        ];
    }

    /**
     * @param SitemapPopulateEvent $event
     */
    public function registerPages(SitemapPopulateEvent $event)
    {
        $manuals = $this->manager->getRepository('AppBundle:Manual\Manual')->findAll();

        foreach ($manuals as $manual) {
            $event->getUrlContainer()->addUrl(
                new UrlConcrete(
                    $this->urlGenerator->generate(
                        'frontend_manual_show',
                        ['slug' => $manual->getSlug()],
                        UrlGeneratorInterface::ABSOLUTE_URL
                    )
                ),
                'manual'
            );
        }

        $articles = $this->manager->getRepository('AppBundle:Article\Article')->findAll();

        foreach ($articles as $article) {
            $event->getUrlContainer()->addUrl(
                new UrlConcrete(
                    $this->urlGenerator->generate(
                        'frontend_article_detail',
                        ['article' => $article->getSlug(), 'category' => $article->getCategory()->getSlug()],
                        UrlGeneratorInterface::ABSOLUTE_URL
                    )
                ),
                'article'
            );
        }

        $articleCategories = $this->manager->getRepository('AppBundle:Article\Category')->findAll();

        foreach ($articleCategories as $category) {
            $event->getUrlContainer()->addUrl(
                new UrlConcrete(
                    $this->urlGenerator->generate(
                        'frontend_article_category_list',
                        ['category' => $category->getSlug()],
                        UrlGeneratorInterface::ABSOLUTE_URL
                    )
                ),
                'article_category'
            );
        }

        $manualCategories = $this->manager->getRepository('AppBundle:Manual\Category')->findAll();

        foreach ($manualCategories as $manual) {
            $event->getUrlContainer()->addUrl(
                new UrlConcrete(
                    $this->urlGenerator->generate(
                        'frontend_manual_category_list',
                        ['slug' => $manual->getSlug()],
                        UrlGeneratorInterface::ABSOLUTE_URL
                    )
                ),
                'manual_category'
            );
        }
    }
}