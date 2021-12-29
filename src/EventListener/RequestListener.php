<?php

namespace App\EventListener;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class RequestListener
{
    private $requestStack;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    public function onKernelRequest(RequestEvent $event)
    {
        if($code = $event->getRequest()->get('code')){
            $session = $this->requestStack->getSession();
            $session->set('advertising_code', $code);
        }
    }
}