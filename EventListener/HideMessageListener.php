<?php

namespace HidePimcoreXMessageBundle\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class HideMessageListener implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::RESPONSE => 'response'
        ];
    }

    public function response(ResponseEvent $event)
    {
        $routes = [
            'pimcore_admin_login',
            'pimcore_admin_login_fallback',
            'pimcore_admin_login_deeplink',
            'pimcore_admin_login_lostpassword',
            'pimcore_admin_index',
            'pimcore_admin_2fa-verify',
            'pimcore_admin_2fa'
        ];

        if (!in_array($event->getRequest()->get('_route'), $routes, true)) {
            return;
        }

        $content = str_replace('https://liveupdate.pimcore.org/imageservice', '', $event->getResponse()->getContent());

        $event->getResponse()->setContent($content);
    }
}
