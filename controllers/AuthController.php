<?php

namespace app\controllers;

use app\models\LoginForm;
use Yii;

class AuthController extends \yii\web\Controller
{
    public $layout='auth';
    public $model;
    public function actionIndex() {
        if ($this->isGuest()) {
            $this->model = new LoginForm();
            return $this->render('index.php', ['model' => $this->model]);
        }else{
            return $this->redirect('?r=admin');
        }
    }


    public function isGuest(){
        return empty($_SESSION['user']);
    }

    public function actionSignin(){
        $model=new LoginForm();
        if ($model->load(Yii::$app->request->post())&&$model->signin()) {
            return $this->redirect('/web?r=admin/index');
        }

        return $this->render('index', ['model'=>$model]);


    }

}
