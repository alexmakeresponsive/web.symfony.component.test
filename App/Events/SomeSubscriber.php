<?php
/**
 * Created by PhpStorm.
 * User: gorchakovalexandr
 * Date: 06.11.2018
 * Time: 21:19
 */

namespace App\Events;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\Event;




class SomeSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return array(
            'acme.foo.action' => 'onFooAction2',
        );
    }

    public function onFooAction2( Event $event )
    {
//        echo 'run onFooAction2';
        $dumper = require __DIR__ .'/../../web/dumper.php';

        $event->stopPropagation();  // Не уведомлять других подписчиков

        $dumper($event);
    }
}