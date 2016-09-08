<?php

class Model_Admin extends Model{

    public function adminadd($login,$password){
        $result=false;
        $db=new DB_Adapter(LOCALHOST,DB_USER,DB_PASSWORD,DB_NAME);
        $connection=$db->connection;
        if (!$db->getUserByLogin($login)&&(!empty($login)&&!empty($password))){
            $query = "INSERT INTO admins (login,password) VALUES ('$login','$password');";
            $result=mysqli_query($connection,$query);
        }
        return $result;
    }
    public function showQuestions(){
        $db=new DB_Adapter(LOCALHOST,DB_USER,DB_PASSWORD,DB_NAME);
        $connection=$db->connection;
        $query = "";
    }
    public function formadd(){
        $forms=[];
        $db=new DB_Adapter(LOCALHOST,DB_USER,DB_PASSWORD,DB_NAME);
        $connection=$db->connection;
        $query='SELECT forms.id,forms.name,forms.disorder,COUNT(questions.form_id) as quantity From forms left join questions on forms.id=questions.form_id GROUP BY forms.disorder';
        $result=mysqli_query($connection,$query);
        if ($result){
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($forms, $row);
            }
            return $forms;
        }else{
            return false;
        }
    }
    public function formaddDB($name,$order){
        $result=[];
        $result['status']='red';
        $db=new DB_Adapter(LOCALHOST,DB_USER,DB_PASSWORD,DB_NAME);
        $connection=$db->connection;
        if ($db->isConnect()){
            if (!$db->getFormByName($name)){
                if(!$db->getFormByOrder($order)){
                    $query="INSERT INTO `forms` (name,disorder) VALUES ('$name','$order')";
                    $ok=mysqli_query($connection,$query);
                    if($ok){
                        $result['status']='green';
                        $result['message']="Form $name are $order in order";
                    }else{
                        $result['message']='Чет неясное';
                    }
                }else{
                $result['message']='Your order of the form isnt unique';
                }
            }else{
                $result['message']='Your name of the form isnt unique';
            }
        }else{
            $result['message']='No db connect';
        }
        return $result;
    }
    public function changeOrder(){
        $result=[];
        $result['status']='red';
        $db=new DB_Adapter(LOCALHOST,DB_USER,DB_PASSWORD,DB_NAME);
        $connection=$db->connection;
        if ($db->isConnect()){
            $query="Update";
        }
    }
    public function getAllFromForms(){
        $forms=[];
        $db=new DB_Adapter(LOCALHOST,DB_USER,DB_PASSWORD,DB_NAME);
        $connection=$db->connection;
        $query='SELECT * FROM `forms` ORDER BY disorder';
        $result=mysqli_query($connection,$query);

        if ($result){
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($forms, $row);
            }
            return $forms;
        }else{
            return false;
        }
    }
    public function deleteForm($id)
    {
        $forms = [];
        $db = new DB_Adapter(LOCALHOST, DB_USER, DB_PASSWORD, DB_NAME);
        $connection = $db->connection;
        $query = 'DELETE FROM `forms` WHERE id=\'' . $id.'\'';
        $result = mysqli_query($connection, $query);
        return $result;
    }
}