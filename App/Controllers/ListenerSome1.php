<?php
/**
 * Created by PhpStorm.
 * User: gorchakovalexandr
 * Date: 06.11.2018
 * Time: 20:00
 */

namespace App\Controllers;

use Symfony\Component\EventDispatcher\Event;

class ListenerSome1
{
    public function onFooAction(Event $event)
    {
        // ... do something
        $dumper = require __DIR__ .'/../../web/dumper.php';
        $dumper($event);
    }
}