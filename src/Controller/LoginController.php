<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LoginController extends AbstractController
{

    public static function create($login, $conn)
    {
        $auxEmail = explode('@',$login->getEmail());
        if (count($auxEmail) < 2) return "Alias not found in email";

        $auxEmail = explode('.',$auxEmail[1]);
        if (count($auxEmail) < 2) return "Domain not found in email";

        if (!(strlen($login->getFirstName()) > 2 && strlen($login->getFirstName()) < 35)) return "Firstname size incompatible";
        if (!(strlen($login->getLastName()) > 2 && strlen($login->getLastName()) < 35)) return "LastName size incompatible";

        if ($login->getAge() != null) {
            if (!($login->getAge() > 0 && $login->getAge() < 150)) return "Age out of range";
        }

        $arr = ['firstname' => $login->getFirstName(), 
                'lastname' => $login->getLastName(), 
                'email' => $login->getEmail(), 
                'age' => $login->getAge()];
        $conn->insert('login', $arr);

        $sql = "SELECT * FROM `login` ORDER BY id DESC";
        $result = $conn->fetchAllAssociative($sql)[0]['id'];
        return $result;
    }

    public static function createPwd($id, $password, $retypePassword, $conn)
    {
        if (!is_int($id)) return "Id is not integer";
        if (!self::userExists($id,$conn)) return "User dont exist";
        if (!self::validatePasswordandRetypePassword($password,$retypePassword)) return "Password dont check";
        if (!self::validatePasswordSixCharacters($password)) return "Less 6 characters";
        if (!self::validatePasswordOneSpecialCharacter($password)) return "No special characters";
        if (!self::validatePasswordOneNumberCharacter($password)) return "No number";
        if (!self::validatePasswordOneUpperCharacter($password)) return "No capital letter";
        
        $options = [
            'cost' => 10,
        ];
        $newPassword = password_hash($password, PASSWORD_BCRYPT, $options);

        $values = ['password' => $newPassword];
        $where  = ['id' => $id];
        $conn->update('login', $values, $where);

        $sql = "SELECT * FROM `login` WHERE id = $id";
        $result = $conn->fetchAllAssociative($sql);
        return json_encode($result);

    }

    public static function userExists($id,$conn) {
        $sql = "SELECT count(*) qty FROM `login` WHERE id = $id ORDER BY id DESC";
        $result = $conn->fetchAllAssociative($sql)[0]['qty'];
        return $result > 0;
    }

    /*
    Deprecated
    */
    public static function validatePassword($password,$retypePassword) {
        if ($password != $retypePassword) return false;
        if (!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[$*&@#!%+=])[0-9a-zA-Z$*&@#!%+=]{6,}$/', $password) ) return false;
        else return true;
    }

    public static function validatePasswordandRetypePassword($password,$retypePassword) {
        return $password == $retypePassword;
    }

    public static function validatePasswordSixCharacters($password) {
        return strlen($password) > 5;
    }

    public static function validatePasswordOneSpecialCharacter($password) {
        $chars = array("!","@","#","$","%","&","*","+","=");
        $password = str_split($password);
        for($i = 0; $i < count($password); $i++) {
            if (in_array($password[$i], $chars)) {
                return true;
            }
        }
        return false;
    }

    public static function validatePasswordOneNumberCharacter($password) {
        $chars = array("0","1","2","3","4","5","6","7","8","9");
        $password = str_split($password);
        for($i = 0; $i < count($password); $i++) {
            if (in_array($password[$i], $chars)) {
                return true;
            }
        }
        return false;
    }

    public static function validatePasswordOneUpperCharacter($password) {
        $chars = array("A","B","C","D","E","F","G","H","I","J","K","L","M",
                       "N","O","P","Q","R","S","T","U","V","X","Y","W","Z");
        $password = str_split($password);
        for($i = 0; $i < count($password); $i++) {
            if (in_array($password[$i], $chars)) {
                return true;
            }
        }
        return false;
    }

}