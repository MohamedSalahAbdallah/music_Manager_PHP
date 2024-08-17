<?php
require_once("storageManger.model.php");

class user extends storageManger
{

    public $name;
    public $userName;
    public $email;
    public $password;
    public $id;




    public function addToDataBase($data, $fileName = "users.json")
    {

        return parent::addToDataBase($data, $fileName);
    }
    public function getFromDataBase($fileName = "users.json")
    {

        return parent::getFromDataBase($fileName);
    }

    public function updateInDataBase($data, $id, $fileName = "users.json")
    {

        return parent::updateInDataBase($data, $id, $fileName);
    }

    public function deleteFromDataBase($id, $fileName = "users.json")
    {

        return parent::deleteFromDataBase($id, $fileName);
    }

    public function searchInDataBase($id, $fileName = "users.json")
    {
        return parent::searchInDataBase($id, $fileName);
    }

    public function userLogin($email, $password)
    {

        $users = $this->getFromDataBase("users.json");
        foreach ($users as $user) {
            if ($user['email'] == $email && $user['password'] == $password) {
                $this->id = $user['id'];
                $this->name = $user['name'];
                $this->userName = $user['userName'];
                $this->email = $user['email'];
                $this->password = $user['password'];
                return $user;
            }
        }
        return false;
    }

    public function registerUser($name, $userName, $email, $password)
    {

        $users = (array)$this->getFromDataBase("users.json");
        $id = count($users) + 1;
        $user["id"] = $id;
        $user["name"] = $name;
        $user["userName"] = $userName;
        $user["email"] = $email;
        $user["password"] = $password;
        $this->addToDataBase($user, "users.json");
        $this->id = $id;
        $this->name = $name;
        $this->userName = $userName;
        $this->email = $email;
        $this->password = $password;

        return true;
    }
}
