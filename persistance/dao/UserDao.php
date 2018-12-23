<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 18.24.11
 * Time: 14:47
 */
require_once('Connection.php');
require_once(__DIR__.'/../model/User.php');

class UserDao extends Connection
{
    private $table = 'users';

    public function getUserByEmail($email){
        $sql = "SELECT * FROM $this->table WHERE email='$email'";
        $result = parent::query($sql);
        if ($result->num_rows === 0) {
            return null;
        }
        if ($record = $result->fetch_object())
            return new User(
                $record->id,
                $record->name,
                $record->password,
                $record->email);
    }

    public function getUserById($id){
        $result = parent::query('SELECT * FROM ' . $this->table . ' WHERE id=' . $id);
        if ($result->num_rows === 0) {
            return null;
        } else {
            $record = $result->fetch_object();
            return new User(
                $record->id,
                $record->name,
                $record->password,
                $record->email);
        }
    }

    public function addUser($user){
        $name = $user->getName();
        $email = $user->getEmail();
        $password = $user->getPassword();

        $sql = "INSERT INTO $this->table (name, email, password) VALUES ('$name', '$email', '$password')";
        parent::query($sql);
    }

    public function getAll() {
        $users = array();
        $result = parent::query('SELECT * FROM ' . $this->table);
        while ($record = $result->fetch_object()) {
            array_push(
                $users,
                new User(
                    $record->id,
                    $record->name,
                    $record->password,
                    $record->email)
            );
        }
        return $users;
    }
}
