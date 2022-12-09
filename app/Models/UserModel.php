<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['name', 'email', 'password', 'type'];

    public function users(){
        $sql = "SELECT * FROM user";
        $result=$this->db->query($sql, null);
        foreach ($result->getResult() as $row) {
            $resultado[] = $row;
        }
        return $resultado;
    }

    public function add($data) {
        $sql = "INSERT INTO user (name, email, password, type) VALUE (?, ?, ?, ?)"; 
        $result = $this->db->query($sql, [$data['name'], $data['email'], $data['password'], $data['type']]);
        return $result;
    }
}