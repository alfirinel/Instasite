<?php


namespace app\controllers;


use app\core\Route;
use app\core\View;
use app\exceptions\UploadException;
use app\helpers\Session;
use app\helpers\Validator;
use app\models\AuthModel;
use app\models\PhotoModel;


class Index
{

    protected View $view;

    protected PhotoModel $model;

    protected AuthModel $authModel;

    /**
     * Controller constructor.
     */
    public function __construct()
    {

        if (!Session::isAuth()) {
            Route::redirect('login', 'auth');
        }

        $this->model = new PhotoModel();
        $this->view = new View();
        $this->authModel = new AuthModel();
    }

    public function index()
    {
        $this->view->render('start');
    }

    public function gallery()
    {
        var_dump($_GET);
//        exit();
        $this->view->render('gallery', [
            'photos' => $this->model->all(),
            'current_page' => 2,
            'tatal_page' => 8,
        ]);
    }

    public function user()
    {
        $user = Session::getAuthUser();
        $this->view->render('user', [
            'photos' => $this->model->getByUserID($user['id']),
        ]);
    }

    public function store()
    {
        Validator::checkUploadPhoto();
        $user = Session::getAuthUser();
        $photo = $_FILES['photo'];
        var_dump(realpath('images/gallery/root_62c06d4d0626c.jpg'));
        $extension = pathinfo($photo['name'], PATHINFO_EXTENSION);
        $fileName = uniqid($user['login'] . '_') . '.' . $extension;
        $path = UPLOAD_DIR . $fileName;
        var_dump($path, $user);
//        exit();
        if (!move_uploaded_file($photo['tmp_name'], $path)) {
            throw new UploadException('no upload');
        }
        $this->model->add( '/'. $path, $user['id']);
        Route::redirect('user');
    }


    public function destroy()
    {
        $id = filter_input(INPUT_POST, 'id');
        if (!isset($id)) {
            Route::notFound();
        }
        $this->model->delete($id);
        Route::redirect('user');
    }

    public function like()
    {
        $isLiked = false;
        $user = Session::getAuthUser();
        $photoId = filter_input(INPUT_POST, 'id');
        $this->model->addLike( $user['id'], $photoId);
        Route::redirect('gallery');
    }


}