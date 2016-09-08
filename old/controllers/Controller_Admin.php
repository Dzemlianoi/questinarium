<?php

class Controller_Admin extends Controller{

    public function action_index()
    {
        if (!empty($_SESSION['user'])){
            $this->view->generate('admin_view.php', 'layouts/admin_layout.php');
        }else{
            header('location:http://'.$_SERVER['HTTP_HOST'].'/auth');
        }

    }
    public function action_adminadd(){

        $result=[];
        $result['id']='adminadd';
        if (!empty($_POST['login'])&&!empty($_POST['password'])){
            $login=$_POST['login'];
            $password=md5($_POST['password']);
            $this->model=new Model_Admin();

            if ($this->model->adminadd($login,$password)){
                $result['status']='green';
                $result['message']="У нас новый админ - $login ";
            }else{
                $result['status']='red';
                $result['message']="$login - уже существует ";
            }
            echo json_encode($result);

        }else{
            $this->view->generate('admin/adminadd.php','layouts/admin_layout.php',$result);
        }

    }
    public function action_formadd(){
        $result=[];
        $result['id']='formadd';
        $this->model=new Model_Admin();
        $result['data']=$this->model->formadd();
        $this->view->generate('admin/formadd.php','layouts/admin_layout.php',$result);
    }
    public function action_formaddDB(){
        $return_array=[];
        if (!empty($_POST['name'])&&(!empty($_POST['order']))){
            $name=$_POST['name'];
            $order=$_POST['order'];
            $this->model=new Model_Admin();
            $return_array=$this->model->formaddDB($name,$order);
        }else{
            $return_array['status']='red';
            $return_array['message']='No name or order inputed';
        }
        echo json_encode($return_array);
    }
    public function action_changeOrder()
    {
        if (!empty($_POST['formid'])) {
            $form_id = $_POST['formid'];
            $this->model = new Model_Admin();

        } else {

        }
    }
    public function action_formdelete(){
        $return_array=[];
        $this->model=new Model_Admin();
        if (!empty($_POST['formid'])){
            $delformDB=$this->model->deleteForm($_POST['formid']);
            if ($delformDB){
                $return_array['status']='green';
                $return_array['message']='The form has been deleted';
                $return_array['data']=$delformDB;
            }else{
                $return_array['status']='red';
                $return_array['message']='The form hasn\'t been deleted';
                $return_array['data']=$delformDB;
            }
        }else{
            $return_array=$this->model->getAllFromForms();
        }
        echo json_encode($return_array);

    }
    public function action_formedit(){
        $return_array=[];
        $this->model=new Model_Admin();
        $db=new DB_Adapter(LOCALHOST,DB_USER,DB_PASSWORD,DB_NAME);
        if (!empty($_POST['form1'])&&!empty($_POST['form2'])){
            $form1=$_POST['form1'];
            $form2=$_POST['form2'];
            $marginary_order=127;
            $update1=$db->updateFormsByOrder($form1,$marginary_order);
            $update2=$db->updateFormsByOrder($form2,$marginary_order-1);
            $update3=$db->updateFormsByOrder($marginary_order,$form2);
            $update4=$db->updateFormsByOrder($marginary_order-1,$form1);
            if($update1&&$update2&&$update3&&$update4){
                $return_array['status']='green';
                $return_array['message']='The order has been changed';
            }else{
                $return_array['status']='red';
                $return_array['message']='Whaaat?';
            }

        }else{
            $return_array=$this->model->getAllFromForms();
        }
        echo json_encode($return_array);

    }

}