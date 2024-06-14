<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'tb_user';
    protected $primaryKey       = 'id_user';
    protected $allowedFields    = ['id_user', 'username', 'password', 'level_id', 'loket_id'];
    protected $useTimestamps    = true;

    public function getUser($id_user = false)
    {
        if ($id_user == false) {
            return $this->join('tb_level', 'tb_level.id_level = tb_user.level_id')->findAll();
        } else {
            return $this->where(['id_user' => $id_user])->first();
        }
    }
    public function TambahData($data)
    {
        return $this->insert($data);
    }
    public function autonum()
    {
        $num = $this->selectMax('id_user', 'user')->first();
        $id = $num['user'];
        $no = (int)substr($id, 3, 3);
        $no++;
        $char = "US";
        $new = $char . sprintf("%03s", $no);
        return $new;
    }
}
