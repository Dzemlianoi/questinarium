<?php
/**
 * Created by PhpStorm.
 * User: Жира
 * Date: 09.03.2016
 * Time: 18:26
 */

class Model_Auth extends Model {
    public function __construct(){

    }

    public function verify_user($login,$pass)
    {
        $db=new DB_Adapter(LOCALHOST,DB_USER,DB_PASSWORD,DB_NAME);
        $user=$db->getUserByLogin($login);
        if ($user){
            if($pass==$user['password']) {
                return $user['login'];
            }
        }
            return false;
    }
}