<?php

namespace AppBundle\Listener;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Templating\EngineInterface;
use Symfony\Component\Templating\PhpEngine;

/**
 * Class MaintenanceListener
 * @package AppBundle\Listener
 */
class MaintenanceListener
{
    /** @var  KernelInterface */
    private $kernel;

    /** @var EngineInterface */
    protected $templating;

    /** @var  bool */
    protected $maintenance;

    /**
     * MaintenanceListener constructor.
     * @param $maintenance
     * @param KernelInterface $kernel
     * @param EngineInterface $templating
     */
    public function __construct($maintenance, KernelInterface $kernel, EngineInterface $templating)
    {
        $this->maintenance = ($maintenance == "true" ? true : false);
        $this->kernel = $kernel;
        $this->templating = $templating;
    }

    /**
     * @param GetResponseEvent $event
     */
    public function onKernelRequest(GetResponseEvent $event)
    {
        $debug = in_array($this->kernel->getEnvironment(), array('test', 'dev'));

        if ($this->maintenance && !$debug) {
            $content = $this->templating->render('maintenance.html.twig', array('maintenance' => true));
            $event->setResponse(new Response($content, 503));
            $event->stopPropagation();
        }

    }
}