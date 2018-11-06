<?php
/**
 * Created by PhpStorm.
 * User: gorchakovalexandr
 * Date: 06.11.2018
 * Time: 21:19
 */

namespace App\Events;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;


class SomeSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return array(
            'acme.foo.action' => 'onFooAction2',
        );
    }

    public function onFooAction2()
    {
        echo 'run onFooAction2';
    }
}