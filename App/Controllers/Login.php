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
use App\Models\User;

class Login extends Controller
{
    protected $dataFields   = [];
    protected $dataPage     = [];
    protected $dataSession  = [];
    protected $dataStatus   = false;
    protected $errors       = [];
    protected $userSome;
    protected $userSpecific;

    public function actionIndex()
    {
        $dumper = require __DIR__ .'/../../web/dumper.php';

        if (empty($_POST)) {
            $this->dataFields = [
                'login' => [
                    'login'       => '',
                    'password'    => ''
                ]
            ];
            $this->dataStatus   = false;
        } else {
            $this->dataFields    = $_POST;
            $this->dataStatus   = true;
        }

        //Check errors
        if ( isset($this->dataFields['login']['submit']) ) {
            if ( empty($this->dataFields['login']['login']) ) {
                $this->errors[] = 'Login is empty';
            }
            if ( empty($this->dataFields['login']['password']) ) {
                $this->errors[] = 'Password is empty';
            }
        }

        //Registration
//        $dumper($this->dataFields);
        if (empty($this->errors) && $this->dataStatus) {
            $this->actionCheckLogin();
        }

//        $this->view->test = 'Test sign up string';
        $this->view->errors = $this->errors;
        $this->view->valueFormFields = $this->dataFields;
        $this->view->render(__DIR__ . '/../../App/Views/templates/login.php');
    }

//    public function actionIndex()
//    {
//        $this->view->render(__DIR__ . '/../../App/Views/templates/login.php');
//    }

    public function actionCheckLogin()
    {
        $dumper = require __DIR__ .'/../../web/dumper.php';

        echo 'actionCheck';
        //Check user in db

        $this->userSome = new User();
        $this->userSome->user_login           = $this->dataFields['login']['login'];
        $this->userSome->user_password        = $this->dataFields['login']['password'];

        $this->userSpecific = $this->userSome->findByLogin($this->userSome->user_login);
//        $dumper($this->userSpecific);

        if (!$this->userSpecific) {
            $this->errors[] = 'User not found';
            return;
        } else {
            $this->actionCheckPassword();
        }
    }

    public function actionCheckPassword()
    {
//        echo 'Specific password: '. $this->userSpecific->user_password;
//        echo '<br>';
//        echo 'Some password: '. $this->userSome->user_password;
//        echo '<br>';

        if ( password_verify($this->userSome->user_password, $this->userSpecific->user_password ) ) {
//            echo 'Login: success';
            $_SESSION['user']['logged'] = $this->userSpecific;
            $this->dataSession = $_SESSION['user']['logged'];

//            $this->view->userLoggedName = $this->userSpecific->user_name;
            header("Location: /?ctrl=Index");
        } else {
            $this->errors[] = 'Password is wrong';
        }
    }

    public function actionLogout()
    {
        $this->view->render(__DIR__ . '/../../App/Views/templates/login.php');

        unset($_SESSION['user']['logged']);
    }
}