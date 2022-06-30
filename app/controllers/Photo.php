<?php


namespace app\controllers;


use app\core\Route;
use app\core\View;
use app\helpers\Session;
use app\helpers\Validator;
use app\models\PhotoModel;

class Photo
{
    protected View $view;

    protected PhotoModel $photoModel;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->view = new View();
        $this->photoModel = new PhotoModel();
    }

    public function index()
    {
        $this->view->render('start');
    }

    public function gallery()
    {

        $this->view->render('gallery',
            ['photos' => $this->photoModel->all(),]
        );
    }

    public function store()
    {
        $this->view->render('user',[
            'errors'=>Session::getErrors(),
        ]);
    }

    public function checkStore(){
        Validator::checkUploadPhoto();
        $photo = $_FILES['photo'];
        $extension = pathinfo($photo['name'], PATHINFO_EXTENSION);
        $user= Session::getValue('login');
        $fileName = uniqid($user.'_') . '.' . $extension;
        $path =  UPLOAD_DIR. DIRECTORY_SEPARATOR . $fileName;
        if (!move_uploaded_file($photo['tmp_name'], $path)) {
            $errors[] = 'Can`t move the file';
            Session::setErrors($errors);
            Route::redirect('store', 'photo');
        }
        $this->photoModel->add('/'.$path);
        Route::redirect('store', 'photo');
    }

    public function destroy()
    {

    }


}