<?php

const VIEWS_FOLDER = '..\app\views';
const TEMPLATES_FOLDER = VIEWS_FOLDER. '\templates\\';
const PAGES_FOLDER = VIEWS_FOLDER. '\pages\\';

const DB_HOST = 'localhost';
const DB_USER = 'root';
const DB_PASS = '';
const DB_NAME = 'instasite';


const PHOTO_AVAILABLE_TYPE = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif', 'image/bmp'];
const IMAGES_AVAILABLE_EXTENSIONS = ['jpg', 'jpeg', 'png', 'gif', 'bmp'];
const PHOTO_MAX_FILE_SIZE = 10 * 1024 * 1024;
//const PHOTO_PREFIX = '_';
//define("PHOTO_PREFIX", \app\helpers\Session::isAuth() . '_');
//const PHOTO_PREFIX = \app\helpers\Session::isAuth().'_';

const UPLOAD_DIR = 'images/gallery/';