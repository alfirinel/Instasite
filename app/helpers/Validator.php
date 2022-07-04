<?php


namespace app\helpers;


use app\core\Route;

class Validator
{
    static public function isValid($value, $name = 'field', $length = 3)
    {
        $value = trim($value);
//        var_dump($value);
        if ($value === '' || !isset($value)) {
            return "{$name} can`t be empty";
        }
        if ($value === 0) {
            return "{$name} can`t be zero";
        }
        if (strlen($value) < $length) {
            return "{$name} can`t be less {$length} characters";
        }
        return true;
    }

    public static function valueIsNum($value)
    {
        if (is_int($value)) {
            $errors[] = "field must haven`t digit ";
            Session::setErrors($errors);
            return true;

        }
        return false;
    }

    public static function equalPass($pass, $conf_pass)
    {
        if ($pass !== $conf_pass) {
            $errors[] = "Password and confirm password does not match";
            Session::setErrors($errors);
            return false;
        }
        return true;
    }

    public static function checkListInput(array $List)
    {
        $errors = [];
        foreach ($List as $item) {
            if (self::isValid($item) !== true) {
                $errors[] = self::isValid($item);
            }
        }
        if (count($errors) > 0) {
            Session::setErrors($errors);
        } else {
            return true;
        }
    }

    public static function checkUploadPhoto()
    {
        $fileUploadErrors = [
            0 => 'There is no error, the file uploaded with success',
            1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
            2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
            3 => 'The uploaded file was only partially uploaded',
            4 => 'No file was uploaded',
            6 => 'Missing a temporary folder',
            7 => 'Failed to write file to disk',
            8 => 'A PHP extensions stopped the file upload',
        ];

        if (!isset($_FILES['photo'])) {
            $errors[] = 'No file!';
            Session::setErrors($errors);
            Route::redirect('store', 'photo');
        }
        $file = $_FILES['photo'];
        if ($file['error'] !== UPLOAD_ERR_OK) {
            $errors[] = $fileUploadErrors[$file['error']];
        }
        if (!in_array($file['type'], PHOTO_AVAILABLE_TYPE)) {
            $errors[] = 'Not available type of file';
        }
        if ($file['size'] > PHOTO_MAX_FILE_SIZE) {
            $errors[] = 'file too large';
        }
        if(isset($errors)){
            Session::setErrors($errors);
            Route::redirect('store');
        }
    }

}