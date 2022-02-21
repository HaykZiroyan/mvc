<?php
/**
 * Created by PhpStorm.
 * User: sahar
 * Date: 08.11.2019
 * Time: 18:09
 */

// namespace models;


// use libs\Db;

// class Task extends Model
// {

//     public $name;
//     public $email;
//     public $message;
//     public $status = 0;
//     protected $id;

//     public static function getSortLink($name, $page, $currentSort, $currentDir)
//     {
//         return '/?' . http_build_query([
//                 'page' => $page,
//                 'sort' => $name,
//                 'dir' => ($currentSort == $name && $currentDir == 'asc') ? 'desc' : 'asc'
//             ]);
//     }

//     public function getId()
//     {
//         return $this->id;
//     }

//     public function setId($id)
//     {
//         $this->id = $id;
//     }

//     public function validate()
//     {
//         $this->filterField('name');
//         $this->filterField('email');
//         $this->filterField('message');

//         $this->checkRequiredAndLength('name');
//         $this->checkRequiredAndLength('email');
//         $this->checkRequiredAndLength('message', 1000);

//         if ($this->email && !filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
//             $this->errors['email'] = 'Please put valid email address';
//         }


//         if (!$this->errors) {
//             return true;
//         }
//         return false;

//     }

//     public function insert()
//     {
//         $db = Db::getInstance();
//         $table = static::getTableName();
//         $sql = "INSERT INTO $table (`name`, `email`, `message`, `status`) VALUES (?,?,?,?)";
//         $db->query($sql, [$this->name, $this->email, $this->message, $this->status]);
//         $this->id = $db->lastInsertedId();
//         return $this;
//     }

//     public static function getTableName()
//     {
//         return 'tasks';
//     }

//     public function updateMessage()
//     {
//         $db = Db::getInstance();
//         $table = static::getTableName();
//         $sql = "UPDATE $table SET `message` = ?, `status` = 1 WHERE id=?";
//         return $db->query($sql, [$this->message, $this->id]);
//     }

//     public function approve()
//     {
//         $db = Db::getInstance();
//         $table = static::getTableName();
//         $sql = "UPDATE $table SET `status` = 1 WHERE id=?";
//         return $db->query($sql, [$this->id]);
//     }

// }