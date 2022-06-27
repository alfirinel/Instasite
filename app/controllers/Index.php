<?php


namespace app\controllers;


use app\core\Route;
use app\core\View;
use app\helpers\Session;
use app\helpers\Validator;
use app\models\AuthModel;
use app\models\Photo;


class Index
{
    const UPLOAD_DIR = 'images/';

    protected $view;

    protected $model;

    protected $authModel;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->model = new Photo();
        $this->view = new View();
        $this->authModel = new AuthModel();
    }

    public function index()
    {
        $this->view->render('start');
    }

    public function gallery()
    {
        $this->view->render('gallery', [
            'photos' => $this->model->all(),
        ]);
    }

    public function user()
    {
        $this->view->render('user');
    }

    public function store(){
        $photo = $_FILES['photo'];
        $path = self::UPLOAD_DIR.$photo['name'];
        $this->model->add('/'.$path);
        Route::redirect('gallery');
    }

    public function login()
    {

        $this->view->render('login', [
            'login' => Session::getValue('login'),
            'errors' => Session::getErrors(),
        ]);
    }

    public function checkLogin()
    {
        $login = filter_input(INPUT_POST, 'login');
        $password = filter_input(INPUT_POST, 'password');
        Validator::checkListInput([$login,$password]);
        $isLogin = $this->authModel->getUserAndPass($login);
        $realPass = password_verify($password, $isLogin['pass']);
        if($realPass && $isLogin){
            Session::delFromSession();
            Session::setValue('login', $login);
            Route::redirect('index');
        }else{
            Session::delFromSession('errors');
            $errors[] = 'incorrect login or password!';
            Session::setErrors($errors);
            Session::setValue('login', $login);
            Route::redirect('login');
        }

    }

    public function signup()
    {
        $this->view->render('signup', [
            'login' => Session::getValue('login'),
            'name' => Session::getValue('name'),
            'email' => Session::getValue('email'),
            'errors' => Session::getErrors(),
        ]);
    }

    public function checkSignup()
    {
        $name = filter_input(INPUT_POST, 'name');
        $login = filter_input(INPUT_POST, 'login');
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        $conf_password = filter_input(INPUT_POST, 'password_confirm');
        Validator::checkListInput([$name, $login, $email, $password]);
        $cur_date = filter_input(INPUT_POST, 'cur_date');
        $cur_date = date("d-M-Y H:i:s", $cur_date);
        if (!Validator::equalPass($password, $conf_password)) {
            Route::redirect('signup');
        }
        $hash_pass = password_hash($password, PASSWORD_BCRYPT);
        session_start();
        if (!empty($_SESSION['errors'])) {
            Session::setValue('login', $login);
            Session::setValue('name', $name);
            Session::setValue('email', $email);
            Route::redirect('signup');
        } else {
            $this->authModel->addUser($login, $hash_pass, $email, $name, $cur_date);
            Session::delFromSession();
            Route::redirect();
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        Route::redirect();
    }

}