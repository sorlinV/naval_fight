<?php
/**
 * Created by PhpStorm.
 * User: isidoris-simplon
 * Date: 28/07/17
 * Time: 08:00
 */

include_once 'User.php';

class Data
{
    private $db;

    /**
     * Data constructor.
     * @param $db
     */
    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=fooder_db', 'admin', 'wqaxszcde123');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->verif_event();
        } catch (PDOException $exception) {
            echo $exception->getMessage();
        }
    }

    public function addUser(User $user) {
        try {
            $req = $this->db->prepare('INSERT INTO users(name, password, salt)'.
                'VALUES (:name, :password, :salt)');
            $req->execute(['name'=>$user->getName(),
                'password'=>$user->getPassword(), 'salt'=>$user->getSalt()]);
            $this->db->lastInsertId();
        } catch (PDOException $exception) {
            echo $exception->getMessage();
        }
    }

    public function getUser($id) {
        try {
            $req = $this->db->prepare('SELECT * FROM users WHERE id=:id');
            $req->execute(['id'=>$id]);
            if ($value = $req-fetch()) {
                return new User($value['name'], $value['password'], $value['salt'], $value['id']);
            }
        } catch (PDOException $exception) {
            echo $exception->getMessage();
        }
    }

    public function connectUser($name, $password) {
        try {
            $req = $this->db->prepare('SELECT * FROM users WHERE name=:name');
            $req->execute(['name'=>$name]);
            if ($value = $req-fetch()) {
                if ($value['name'] === $name &&
                    $value['password'] === hash("sha256", $password.$value['salt'])) {
                    $_SESSION['user'] = $value['id'];
                }
            }
        } catch (PDOException $exception) {
            echo $exception->getMessage();
        }
    }
}