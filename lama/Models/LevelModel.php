<?php

namespace App\Models;

use CodeIgniter\Model;

class LevelModel extends Model
{
    protected $table            = 'tb_level';
    protected $primaryKey       = 'id_level';
    protected $allowedFields    = ['id_level', 'level'];

    public function getLevel($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_level' => $id])->first();
    }
    public function TambahData($data)
    {
        return $this->insert($data);
    }
    public function autonum()
    {
        $num = $this->selectMax('id_level', 'level')->first();
        $id = $num['level'];
        $no = (int)substr($id, 3, 3);
        $no++;
        $char = "LV";
        $new = $char . sprintf("%03s", $no);
        return $new;
    }
}
