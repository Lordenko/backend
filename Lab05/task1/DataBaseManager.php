<?php
class DataBaseManager{

    public static $servername = "localhost";
    public static $username = "root";
    public static $password = "";
    public static $database = 'Lab05';

    public static function getConnection(){
        $conn = new mysqli(self::$servername, self::$username, self::$password, self::$database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }



        return $conn;
    }

    public static function insertDate($login, $password, $email, $phone_number, $date_of_birth, $gender, $address, $city, $country, $is_active){
        $conn = self::getConnection();
        $sql = "INSERT INTO users (login, password, email, phone_number, date_of_birth, gender, address, city, country, is_active) 
                VALUES ('$login', '$password', '$email', '$phone_number', '$date_of_birth', '$gender', '$address', '$city', '$country', '$is_active')";

        if ($conn->query($sql) === TRUE) {
            echo "Дані успішно додано до бази даних!";
        } else {
            echo "Помилка: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }


    public static function isExists($login)
    {
        $conn = self::getConnection();
        $sql = "SELECT id, login FROM users WHERE login = '$login'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            return true;
        }
        return false;

        $conn->close();
    }

    public static function checkLogin($login, $password){
        if (self::isExists($login)) {
            $conn = self::getConnection();
            $sql = "SELECT id, login, password FROM users WHERE login = '$login'";
            $result = $conn->query($sql);
            $rows = $result->fetch_assoc();

            if ($rows['login'] == $login && $rows['password'] == $password) {
                return true;
            }
            return false;
        }
        else {
            echo 'Denied login';
        }
    }

    public static function getUserId($login){
        if (self::isExists($login)) {
            $conn = self::getConnection();
            $sql = "SELECT id, login, password FROM users WHERE login = '$login'";
            $result = $conn->query($sql);
            return $result->fetch_assoc()['id'];
        }
        else {
            echo 'Denied login';
        }
    }

    public static function getLoginById($id)
    {
        $conn = self::getConnection();
        $sql = "SELECT login FROM users WHERE id = '$id'";
        $result = $conn->query($sql);
        return $result->fetch_assoc()['login'];
    }

    public static function getUserDate($id)
    {
        $conn = self::getConnection();
        $sql = "SELECT id, login, password, email, phone_number, date_of_birth, gender, address, city, country, is_active FROM users WHERE id = '$id'";
        $result = $conn->query($sql);
        return $result->fetch_assoc();
    }

    public static function deleteUser($id){
        $conn = self::getConnection();
        $sql = "DELETE FROM users WHERE id = '$id'";
        $result = $conn->query($sql);
        $conn->close();
    }


}