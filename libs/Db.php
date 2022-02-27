<?php

namespace libs;

use PDO;

class Db {
    protected $user = 'root';
    protected $password = 'root';
    protected $host = '127.0.0.1';
    protected $dbname = 'new-tasks';
    protected $dsn;
    protected $pdo;
    public function __construct() {
        $this->dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        $this->pdo = new PDO($this->dsn, $this->user, $this->password);
    }
    public function damn() {
        return $this->pdo;
    }
    public function getTable($TableName) {
        return $this->pdo->query("SELECT * FROM `$TableName`");
    }
    
    public function inserttDb($table, $column1,$column2, $column3, $value1, $value2, $value3) {
        return $this->pdo->query("INSERT INTO `$table` (`$column1`, `$column2`, `$column3`) VALUES('$value1', '$value2', '$value3')");
    }

    public function chooseRow1($table, $column, $value) {      
        return $this->pdo->prepare("SELECT * FROM `$table` WHERE `$column` =  $value");
    }

    public function chooseRow($table, $column, $value) {      
        $stmt = $this->pdo->prepare("SELECT * FROM `$table` WHERE `$column` =  $value");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function orderby($tablename) {
        $order = $this->pdo->prepare("SELECT * FROM `$tablename` ORDER BY id DESC LIMIT 1");
        $order->execute();
        return $order->fetch(PDO::FETCH_ASSOC);
    }

    public function prepareTable($table, $column, $value) {
        return $this->pdo->query("SELECT * FROM `$table` WHERE `$column` =  $value");
    }

    public function tablesPDO($gett) {
        $gett->execute();
        return $gett->fetch(PDO::FETCH_ASSOC);
    }
};