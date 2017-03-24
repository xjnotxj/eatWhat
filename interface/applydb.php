<?php

/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 13-7-22
 * Time: 下午5:07
 * To change this template use File | Settings | File Templates.
 */
class ApplyDB
{

    //数据库连接信息

//    //development
//    private $db;
//    private $host = 'localhost';
//    private $username = 'root';
//    private $password = 'root';
//    private $dbname = "eatWhat";
//
    //testing
    private $db;
    private $host = '127.0.0.1';
    private $username = 'root';
    private $password = '6edb2016';
    private $dbname = "eatWhat";

//    //production
//    private $db;
//    private $host = '127.0.0.1';
//    private $username = 'root';
//    private $password = 'fwis2014';
//    private $dbname = "eatWhat";

    // 构造函数
    public function __construct()
    {
        try {
            $this->db = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
        } catch (PDOException $e) {
            file_put_contents("dberror.log", $e->getMessage());
        }
    }


    /////////apply table

    // 保存food
    public function saveFood($arrayData)
    {
        $return_value = false;

        try {
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO food(`date`, `number`, ip) ";
            $sql .= "VALUES (:date,:number,:ip)";

            $stmt = $this->db->prepare($sql);

            $arr_str = array(
                ':date' => $arrayData['date'],
                ':number' => 1,
                ':ip' => $arrayData['ip']
            );

            $stmt->execute($arr_str);
            $return_value = true;
        } catch (PDOException $e) {
            $return_value = false;
//            echo $e->getMessage();
        }
        return $return_value;
    }

    // 保存food+1
    public function saveFood2($arrayData)
    {
        $return_value = false;

        try {
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "UPDATE food set `number` = `number` + 1 ";
            $sql .= "where `date` = :date ";

            $stmt = $this->db->prepare($sql);

            $arr_str = array(
                ':date' => $arrayData['date']
            );

            $stmt->execute($arr_str);
            $return_value = true;
        } catch (PDOException $e) {
            $return_value = false;
//            echo $e->getMessage();
        }
        return $return_value;
    }


    // 保存food
    public function saveDrink($arrayData)
    {
        $return_value = false;

        try {
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "INSERT INTO drink(`month`, `number`, ip) ";
            $sql .= "VALUES (:month,:number,:ip)";

            $stmt = $this->db->prepare($sql);

            $arr_str = array(
                ':month' => $arrayData['month'],
                ':number' => 1,
                ':ip' => $arrayData['ip']
            );

            $stmt->execute($arr_str);
            $return_value = true;
        } catch (PDOException $e) {
            $return_value = false;
//            echo $e->getMessage();
        }
        return $return_value;
    }

    // 保存food+1
    public function saveDrink2($arrayData)
    {
        $return_value = false;

        try {
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "UPDATE drink set `number` = `number` + 1 ";
            $sql .= "where `month` = :month ";

            $stmt = $this->db->prepare($sql);

            $arr_str = array(
                ':month' => $arrayData['month']
            );

            $stmt->execute($arr_str);
            $return_value = true;
        } catch (PDOException $e) {
            $return_value = false;
//            echo $e->getMessage();
        }
        return $return_value;
    }


    // 查询手机号码是否重复
    public function getFoodNumber($date)
    {
        $return_value = false;
        try {
            $sql = "SELECT `number` FROM food WHERE `date` = :date";
            $stmt = $this->db->prepare($sql);
            $arr_str = array(
                ':date' => $date
            );

            $stmt->execute($arr_str);
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                if ($row['number'] != null && $row['number'] != "") {
                    $return_value = $row['number'];
                    break;
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $return_value;
    }

    // 查询手机号码是否重复
    public function getDrinkNumber($month)
    {
        $return_value = false;
        try {
            $sql = "SELECT `number` FROM drink WHERE `month` = :month";
            $stmt = $this->db->prepare($sql);
            $arr_str = array(
                ':month' => $month
            );

            $stmt->execute($arr_str);
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                if ($row['number'] != null && $row['number'] != "") {
                    $return_value = $row['number'];
                    break;
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $return_value;
    }


}
