<?php
class DB_Adapter {
   public $connection;

    public function __construct($host, $user, $pass, $db_name) {
        $this->connection = mysqli_connect($host, $user, $pass, $db_name);
    }

    public function test(){
        $connection=$this->connection;

    }

    public function createUser($login, $pass, $email) {
        if ($this->isConnect()) {
            $query = "INSERT INTO admins (login,pass,email) VALUES ('$login','$pass','$email')";
            $result = mysqli_query($this->connection, $query);
            return $result;
        } else {
            return false;
        }
    }
    public function getAllBySmth($tbname,$where=NULL,$orderby=NULL)
    {
        if ($this->isConnect()) {
            $fullwhere = $where != null ? 'WHERE ' . $where : '';
            $fullorder = $orderby != null ? 'ORDER BY ' . $orderby : '';
            $query = "SELECT * FROM $tbname $fullwhere $fullorder";
            $result = mysqli_query($this->connection, $query);
            if ($result) {
                $content = array();
                while ($row = mysqli_fetch_assoc($result)) {
                    array_push($content, $row);
                }
                return $content;
            }
        }
        return false;
    }
    public function delBySmth($tbname,$where=NULL)
    {
        if ($this->isConnect()) {
            $fullwhere = $where != null ? 'WHERE ' . $where : '';
            $query = "DELETE * FROM $tbname $fullwhere";
            $result = mysqli_query($this->connection, $query);
            return $result;
        }
        return false;
    }

    public function getUserById($id) {
        if ($this->isConnect()) {
            $query = "SELECT * FROM admins WHERE id=$id";
            $result = mysqli_query($this->connection, $query);
            return mysqli_fetch_assoc($result);
        } else {
            return false;
        }
    }

    public function deletUserById($id) {
        if ($this->isConnect()) {
            $query = "DELETE FROM admins WHERE id=$id";
            $result = mysqli_query($this->connection, $query);
            return $result;
        } else {
            return false;
        }
    }


    public function updateFormsByOrder($oldorder,$neworder) {
        if ($this->isConnect()) {
            $query = "UPDATE forms SET disorder=$neworder WHERE disorder=$oldorder";
            $result = mysqli_query($this->connection, $query);
            return $result;
        } else {
            return false;
        }
    }

    public function getUserByLogin($login) {
        if ($this->isConnect()) {
            $query = "SELECT * FROM `admins` WHERE login='$login'";
            $result = mysqli_query($this->connection, $query);
            return mysqli_fetch_assoc($result);
        } else {
            return false;
        }
    }
    //Forms
    public function getFormById($id){
        if ($this->isConnect()) {
            $query = "SELECT * FROM `forms` WHERE id='$id'";
            $result = mysqli_query($this->connection, $query);
            return mysqli_fetch_assoc($result);
        } else {
            return false;
        }
    }
    public function getFormByName($name){
        if ($this->isConnect()) {
            $query = "SELECT * FROM `forms` WHERE name='$name'";
            $result = mysqli_query($this->connection, $query);
            return mysqli_fetch_assoc($result);
        } else {
            return false;
        }
    }
    public function getFormByOrder($order){
        if ($this->isConnect()) {
            $query = "SELECT * FROM `forms` WHERE disorder ='$order'";
            $result = mysqli_query($this->connection, $query);
            return mysqli_fetch_assoc($result);
        } else {
            return false;
        }
    }
    //вычитка всех записей
    public function getAllUsers() {
        if ($this->isConnect()) {
            $query = "SELECT * FROM admins;";
            $result = mysqli_query($this->connection, $query);
            if ($result) {
                $users = array();
                while ($row = mysqli_fetch_assoc($result)) {
                    array_push($users, $row);
                }
                return $users;
            }
        }
        return false;
    }

    public function isConnect() {
        return $this->connection ? true : false;
    }

    public function __destruct() {
        mysqli_close($this->connection);
    }

}
