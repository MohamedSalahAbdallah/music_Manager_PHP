<?php
require_once("storageManger.model.php");

/**
 * Class user
 * This class extends the storageManger class and represents a user.
 */
class user extends storageManger
{

    /**
     * @var string The name of the user.
     */
    public $name;

    /**
     * @var string The username of the user.
     */
    public $userName;

    /**
     * @var string The email of the user.
     */
    public $email;

    /**
     * @var string The password of the user.
     */
    public $password;

    /**
     * @var int The ID of the user.
     */
    public $id;

    /**
     * Adds a user to the users.json file.
     *
     * @param array $data The user data to be added.
     * @param string $fileName The name of the JSON file. Default is "users.json".
     * @return void
     */
    public function addToDataBase($data, $fileName = "users.json")
    {
        // Call the parent addToDataBase method
        parent::addToDataBase($data, $fileName);
    }

    /**
     * Retrieves data from the users.json file.
     *
     * @param string $fileName The name of the JSON file. Default is "users.json".
     * @return mixed The data from the JSON file or an error message.
     */
    public function getFromDataBase($fileName = "users.json")
    {
        // Call the parent getFromDataBase method
        return parent::getFromDataBase($fileName);
    }

    /**
     * Updates a user in the users.json file.
     *
     * @param array $data The updated user data.
     * @param int $id The ID of the user to be updated.
     * @param string $fileName The name of the JSON file. Default is "users.json".
     * @return void
     */
    public function updateInDataBase($data, $id, $fileName = "users.json")
    {
        // Call the parent updateInDataBase method
        parent::updateInDataBase($data, $id, $fileName);
    }

    /**
     * Deletes a user from the users.json file.
     *
     * @param int $id The ID of the user to be deleted.
     * @param string $fileName The name of the JSON file. Default is "users.json".
     * @return void
     */
    public function deleteFromDataBase($id, $fileName = "users.json")
    {
        // Call the parent deleteFromDataBase method
        parent::deleteFromDataBase($id, $fileName);
    }

    /**
     * Searches for a user by ID in the users.json file.
     *
     * @param int $id The ID of the user to be searched.
     * @param string $fileName The name of the JSON file. Default is "users.json".
     * @return mixed The user with the given ID or an error message.
     */
    public function searchInDataBase($fieldName, $value, $fileName = "users.json")
    {
        // Call the parent searchInDataBase method
        $values = parent::searchInDataBase($fieldName, $value, $fileName);
        if (count($values) > 0) {
            // Set the class properties
            $this->id = $values['id'];
            $this->name = $values['name'];
            $this->userName = $values['userName'];
            $this->email = $values['email'];
            $this->password = $values['password'];
        } else {
            return "No user found";
        }
    }

    /**
     * Logs in a user.
     *
     * @param string $email The email of the user.
     * @param string $password The password of the user.
     * @return mixed The user data if the login is successful, false otherwise.
     */
    public function userLogin($email, $password)
    {
        // Get all users from the users.json file
        $users = $this->getFromDataBase("users.json");
        foreach ($users as $user) {
            // Check if the email and password match
            if ($user['email'] == $email && $user['password'] == $password) {
                // Set the class properties
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

    /**
     * Registers a new user.
     *
     * @param string $name The name of the user.
     * @param string $userName The username of the user.
     * @param string $email The email of the user.
     * @param string $password The password of the user.
     * @return bool True if the user is registered successfully, false otherwise.
     */
    public function registerUser($name, $userName, $email, $password, $confirmPassword)
    {
        // Get all users from the users.json file
        $users = (array)$this->getFromDataBase("users.json");
        if (isset($name) && isset($userName) && isset($email) && isset($password) && !empty(trim($name)) && !empty(trim($userName)) && !empty(trim($email)) && !empty(trim($password)) && filter_var($email, FILTER_VALIDATE_EMAIL) && $password == $confirmPassword) {
            // Generate a new ID
            $id = count($users) + 1;
            $user["id"] = $id;
            $user["name"] = $name;
            $user["userName"] = $userName;
            $user["email"] = $email;
            $user["password"] = $password;
            // Add the user to the users.json file
            $this->addToDataBase($user, "users.json");
            // Set the class properties
            $this->id = $id;
            $this->name = $name;
            $this->userName = $userName;
            $this->email = $email;
            $this->password = $password;
            return true;
        } else {
            return false;
        }
    }
}
