<?php
/**
 * Created by PhpStorm.
 * User: gorchakovalexandr
 * Date: 20.10.2018
 * Time: 22:08
 */

namespace App\Controllers;


//use App\View;
use App\Controller;

use App\Controllers\ListenerSome1;



class Index extends Controller
{
    protected $userLoggedName;

    public function actionIndex($dispatcher)
    {
//        $dumper = require __DIR__ .'/../../web/dumper.php';


//        $listener = new ListenerSome1();


//        $dispatcher->addListener('acme.foo.action', array($listener, 'onFooAction'));


//        $dumper($dispatcher);
//        die;

        $user = isset($_SESSION['user']['logged']) ? $_SESSION['user']['logged'] : null;
        if ( $user ) {
            $this->userLoggedName = $user->user_name;
        }

        $this->view->userLoggedName = $this->userLoggedName;
        $this->view->render(__DIR__ . '/../../App/Views/templates/index.php');
    }
}