<?php


namespace App\Traits;


trait Auth
{
    public function login($name,$pass)
    {
        if($this->checkUser($name)){
            $user  = $this->checkUser($name);
            if(password_verify($pass,$user['password'])){
                $_SESSION['username'] = $user['name'];
                header('location: index.php?page=home');
                return true;
            }else {
                $this->errors['password'] = 'password is not correct';
            }
        }else {
            $this->errors['name'] = 'this name is not exists in database';
            return false;
        }
    }

    public function checkUser($name)
    {
        $sql = 'SELECT * FROM ' .  $this->table .' WHERE name = ?' ;
        $stmt = $this -> db -> prepare($sql);
        $stmt -> execute(array($name));
        $row = $stmt->fetch();
        if($stmt -> rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }

}