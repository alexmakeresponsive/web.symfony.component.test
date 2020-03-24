<?php
error_reporting(E_ALL & ~E_WARNING);
header('Content-Type: text/html; charset=utf-8');
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title></title>
        <link rel="stylesheet" href="./css/dumper.css">
        <link rel="stylesheet" href="./css/main.css">
    </head>
    <body>


<?php


require_once __DIR__ . '/../vendor/autoload.php';
$dumper = require __DIR__ .'/dumper.php';



session_start();


use Symfony\Component\EventDispatcher\EventDispatcher;
$dispatcher = new EventDispatcher();

// add listener in index method
//$listener = null;
//$dispatcher->addListener('acme.foo.action', array($listener, 'onFooAction'));



// Start controllers
$ctrlValue = $_GET['ctrl']  ?? 'Index';
$class = '\App\Controllers\\' . $ctrlValue;
$ctrl  = new $class;

if (!isset($_GET['action'])) {
    $_GET['action'] = 'Index';
}
$actionName = 'action' . $_GET['action'];
$ctrl->$actionName($dispatcher);




// Dispatch event!!!
use Symfony\Component\EventDispatcher\Event;
use App\Events\SomeSubscriber;

class Order {
    private $varSome1 = 'some var 1 value';
}

$order = new Order();
$event = new Event($order);


//Way 1
// creates the OrderPlacedEvent and dispatches it
//$dispatcher->dispatch('acme.foo.action', $event);


//Way 2
$subscriber = new SomeSubscriber();
$dispatcher->addSubscriber($subscriber);
//$dispatcher->dispatch('acme.foo.action', $event);
$dispatcher->dispatch('acme.foo.action');   // тоже самое

//echo PHP_OS_FAMILY; //return Linux
?>

    </body>
        </html>
