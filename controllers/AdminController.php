<?php


namespace app\controllers;

use app\models\Forms;

class AdminController extends \yii\web\Controller
{
    public $layout='admin';

    public function actionIndex() {
        if ($this->isGuest()) {
            return $this->redirect('/web/index.php?r=auth');
        }else{
            return $this->render('index.php');
        }
    }

    public function actionForms(){
        if (!empty($_GET['order'])){
            $order=$_GET['order'];
            $name=$_GET['name'];

            $form=new Forms();

            $form->order=$order;
            $form->name=$name;
            if ($form->save()){
                $data=Forms::getAllForms();
                return $this->renderAjax('./layouts/forms/main.php',['data'=>$data]);
            }else{
                echo 0;
                return;
            }
        }

        $data=Forms::getAllForms();
        return $this->renderAjax('./layouts/forms/main.php',['data'=>$data]);
    }

    public function actionShowformdelete(){
        $data=Forms::getAllForms();
        return $this->renderAjax('./layouts/forms/delete.php',['data'=>$data]);
    }

    public function actionFormdelete(){
        $id=$_GET['id'];
        $form=Forms::find()->where(['id'=>$id])->one();
        if ($form->delete()){
            $data=Forms::getAllForms();
            return $this->renderAjax('./layouts/forms/main.php',['data'=>$data]);
        }else{
            echo 0;
            return;
        }

    }

    public function actionFormChange(){
        if (!empty($_GET['order'])){
            $order=$_GET['order'];
            $name=$_GET['name'];

            $form=new Forms();

            $form->order=$order;
            $form->name=$name;
            if ($form->save()){
                $data=Forms::getAllForms();
                return $this->renderAjax('./layouts/forms/main.php',['data'=>$data]);
            }else{
                echo 0;
                return;
            }
        }


    }
    public function isGuest()
    {
        return empty($_SESSION['user']);
    }

    public function actionExit(){
        session_destroy();
        return $this->goHome();
    }
}
