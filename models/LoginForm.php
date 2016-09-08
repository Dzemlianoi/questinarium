<?php
namespace app\models;

use Yii;
use yii\base\Model;


class LoginForm extends Model{
    public $login;
    public $password;
    private $_user=false;

    public function rules(){
        return
            [
                [['login','password'], 'required','on'=>'default'],
                ['login','string','min'=>'2','max'=>'40'],
                ['password','string','min'=>'2','max'=>'40'],
            ];
    }
    public function getUser(){
        if ($this->_user===false){
            $this->_user=Admins::find()->where(['login'=>$this->login,'password'=>md5($this->password)])->one();
        }
        return $this->_user;
    }

    public function signin(){
        if ($this->getUser()) {
            session_start();
            $_SESSION['user'] = $this->login;
            return true;
        }
    }
}