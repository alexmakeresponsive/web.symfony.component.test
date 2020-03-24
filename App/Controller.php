<?php
/**
 * Created by PhpStorm.
 * User: gorchakovalexandr
 * Date: 06.09.2018
 * Time: 20:24
 */

namespace App;

abstract class Controller
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

//    abstract public function action();

    public function action()
    {
        if ($this->access()) {
            $this->actionIndex();
        } else {
            die('Нет доступа');
        }
    }

    protected function access(): bool
    {
        return true;
    }
}
