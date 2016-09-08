<?php
require_once 'core/Model.php';
require_once 'core/View.php';
require_once 'core/Controller.php';
require_once 'core/Route.php';
require_once 'core/checkAccess.php';
require_once 'core/Adapter.php';

const LOCALHOST='localhost';
const DB_NAME='questionarium';
const DB_USER='root';
const DB_PASSWORD='';

Route::init(); // запускаем маршрутизатор