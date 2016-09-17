<?php


namespace app\controllers;

use app\models\Forms;
use app\models\Admins;
use app\models\Questions;

class AdminController extends \yii\web\Controller
{
    public $layout='admin';

    public function isGuest()
    {
        return empty($_SESSION['user']);
    }

    //rendering

    public function renderSmthForms($url){
        $data=Forms::getAllForms();
        return $this->renderAjax($url,['data'=>$data]);
    }

    public function renderSmthAdmins($url){
        $data=Admins::find()->all();
        return $this->renderAjax($url,['data'=>$data]);
    }

    public function renderSmthQuestions($url){
        $data=Questions::getAllQuestions();
        return $this->renderAjax($url,['data'=>$data]);
    }

    //actions

    public function actionIndex() {
        if ($this->isGuest()) {
            return $this->redirect('/web/index.php?r=auth');
        }else{
            return $this->render('index.php');
        }
    }

    public function actionShowformadd(){
        return $this->renderAjax('./layouts/forms/type.php');
    }

    public function actionShowformdelete(){
        $url='./layouts/forms/delete.php';
        return $this->renderSmthForms($url);
    }

    public function actionShowformchange(){
        $url='./layouts/forms/changeorder.php';
        return $this->renderSmthForms($url);
    }

    public function actionAddform(){
        $url='./layouts/forms/main.php';
        if (!empty($_GET['order'])){
            $order=$_GET['order'];
            $name=$_GET['name'];

            $form=new Forms();

            $form->order=$order;
            $form->name=$name;
            if ($form->save()){
                return $this->renderSmthForms($url);;
            }else{
                echo 0;
                return;
            }
        }
        return $this->renderSmthForms($url);;
    }

    public function actionDeleteform(){
        $id=$_GET['id'];
        $form=Forms::find()->where(['id'=>$id])->one();
        if ($form->delete()){
            $url='./layouts/forms/main.php';
            return $this->renderSmthForms($url);
        }else{
            echo 0;
            return;
        }
    }

    public function actionChangeform(){

        if (!empty($_GET['id1'])){
            $form1=Forms::find()->where(['id'=>$_GET['id1']])->one();
            $form2=Forms::find()->where(['id'=>$_GET['id2']])->one();

            $temp1=$form1->order;
            $temp2=$form2->order;

            $form1->order=399;
            $form1->update();

            $form2->order=$temp1;
            $form2->update();

            $form1->order=$temp2;
            $form1->update();

            $url='./layouts/forms/main.php';
            return $this->renderSmthForms($url);
        }
    }

    //Admins

    public function actionShowadmins(){
        $url='./layouts/admin/main.php';
        return $this->renderSmthAdmins($url);
    }

    public function actionShowadminadd(){
        $url='./layouts/admin/adminadd.php';
        return $this->renderSmthAdmins($url);
    }

    public function actionAddadmin(){
        $admin=new Admins();
        $admin->login=$_GET['login'];
        $admin->password=md5($_GET['password']);

        if (!empty($_GET['email'])){
            $admin->email=$_GET['email'];
        }

        if ($admin->save()){
            $url='./layouts/admin/main.php';
            return $this->renderSmthAdmins($url);
        }else{
            echo $admin->email;
            return;
        }
    }

    public function actionShowadmindel(){
        $url='./layouts/admin/delete.php';
        return $this->renderSmthAdmins($url);
    }

    public function actionDelAdmin($id){
        $login=$_SESSION['user'];
        $admin=Admins::find()->where(['id'=>$id])->one();

        if ($login!=$admin['login']){
            $admin->delete();
            return $this->actionShowadmins();
        }else{
            echo 0;
        }
    }

    public function actionShowQuestions(){
        $url='./layouts/questions/main.php';
        return $this->renderSmthQuestions($url);
    }

    public function actionShowAddQuestion(){
        $url='./layouts/Questions/add/type.php';
        return $this->renderSmthQuestions($url);
    }

    public function actionShowAddQuestionName($button){
        $url='./layouts/Questions/add/name.php';
        return $this->renderAjax($url,['data'=>$button]);
    }

    public function actionShowAddQuestionAnswers(){
        $url='./layouts/Questions/add/answers.php';
        return $this->renderSmthQuestions($url);
    }

    public function actionAddAdditionalAnswer(){
        $url='./layouts/Questions/add/answer.php';
        return $this->renderAjax($url);
    }

    public function actionSaveQuestion($name,$type,$answers=NULL){
        echo ($name.'<br/>'.$type.'<br/>');
        if (!empty($answers)){
            $php_answers=json_decode($answers);
            echo $php_answers[0];
        }

    }

    public function actionExit(){
        session_destroy();
        return $this->goHome();
    }
}
