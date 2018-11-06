<?php
/**
 * Created by PhpStorm.
 * User: gorchakovalexandr
 * Date: 20.10.2018
 * Time: 22:08
 */

namespace App\Controllers;

use App\Controller;

//после выноса View в абстрактный класс этот код уже не нужен
use App\View;

class Articel extends Controller
{
    //только для этого контроллера переименовываем acеion на actionIndex чтобы в методе action вызвать actionIndex
    //в абстрактном контроллере
    //это делается чтобы проверить доступ к странице ( эмулируем brforeAction по факту вызывая проверку перед запуском actionIndex )
//    public function action()
    public function actionIndex()
    {
        $singlePost = \App\Models\Articel::findById($_GET['id']);
//        вынесли в абстрактный класс
//        $viewIndex = new View();

//        $viewIndex->post  = $singlePost;
        $this->view->post  = $singlePost;
//        $viewIndex->render(__DIR__ . '/../../App/Views/article.php');
        $this->view->render(__DIR__ . '/../../App/Views/article.php');

    }

    // в сигнатуре этого метода применяем type hinting для возвращаемого значения
    protected function access(): bool
    {
        return isset($_GET['username']) && $_GET['username'] === 'Alexander';
    }
}