<?php


class Controller_Auth extends Controller
{
    public function action_index() {
        $logged=$this->isGuest();
        $this->view->generate('auth_view.php','layouts/auth_layout.php',$logged);
    }

    public function isGuest(){
        if (!empty($_SESSION['user'])){
            return $_SESSION['user'];
        }else{
            return false;
        }
    }

    public function action_login(){
        if((!empty($_POST['login']))&&(!empty($_POST['password']))){
            $login=$_POST['login'];
            $pass=md5($_POST['password']);

            $this->model = new Model_Auth;
            $verified=$this->model->verify_user($login,$pass);

            if($verified){
                $_SESSION['user']=$login;
                header('location:http://'.$_SERVER['HTTP_HOST'].'/admin');
            }else{
                header('location:http://'.$_SERVER['HTTP_HOST'].'/404');
            }
        }
    }

    public function action_exit(){
        session_destroy();
        header('location:http://'.$_SERVER['HTTP_HOST']);
    }

}
