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

class Signup extends Controller
{
    protected $data         = [];
    protected $dataStatus   = false;
    protected $errors       = [];

    public function actionIndex()
    {
        $dumper = require __DIR__ .'/../../web/dumper.php';

        if (empty($_POST)) {
            $this->data = [
                'signup' => [
                    'name'        => '',
                    'e-mail'      => '',
                    'login'       => '',
                    'password'    => ''
                ]
            ];
            $this->dataStatus   = false;
        } else {
            $this->data         = $_POST;
            $this->dataStatus   = true;
        }

        //Check errors
        if ( isset($this->data['signup']['submit']) ) {
            if ( empty($this->data['signup']['name']) ) {
                $this->errors[] = 'Name is empty';
            }
            if ( empty($this->data['signup']['e-mail']) ) {
                $this->errors[] = 'E-mail is empty';
            }
            if ( empty($this->data['signup']['login']) ) {
                $this->errors[] = 'Login is empty';
            }
            if ( empty($this->data['signup']['password']) ) {
                $this->errors[] = 'Password is empty';
            }
        }

        //Registration
//        $dumper($this->data);
        if (empty($this->errors) && $this->dataStatus) {
            $this->actionCreate();
        }

//        $this->view->test = 'Test sign up string';
        $this->view->errors = $this->errors;
        $this->view->valueFormFields = $this->data;
        $this->view->render(__DIR__ . '/../../App/Views/templates/signup.php');
    }

    public function actionCreate()
    {
//        echo 'actionCreate';
        $user = new User();
        $user->user_name            = $this->data['signup']['name'];
        $user->user_e_mail          = $this->data['signup']['e-mail'];
        $user->user_login           = $this->data['signup']['login'];
        $user->user_password        = password_hash( $this->data['signup']['password'], PASSWORD_DEFAULT );
        $user->user_sign_up_date    = date("Y-m-d H:i:s");
        $user->user_status_confirmed = 0;
        $user->insert();

    }
}