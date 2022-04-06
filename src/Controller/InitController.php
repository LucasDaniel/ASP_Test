<?php

namespace ASPTest\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use \Doctrine\DBAL\DriverManager;

class InitController extends AbstractController
{

    public static function getConn() {
        $connectionParams = [
            'dbname' => 'test',
            'user' => 'root',
            'password' => '',
            'host' => 'localhost',
            'driver' => 'pdo_mysql',
        ];
        return DriverManager::getConnection($connectionParams);
        
    }

    public static function showUsers()
    {
        $sql = "SELECT * FROM `login`";
        $result = self::getConn()->fetchAllAssociative($sql);
        return json_encode($result);
    }

}