<?php

namespace App\Models;

use CodeIgniter\Model;

class AntrianModel extends Model
{
    protected $table            = 'tb_antrian';
    protected $primaryKey       = 'nomer';
    protected $allowedFields    = ['nomer', 'pasien_id', 'status'];
    protected $useTimestamps    = true;


    public function TambahData($data)
    {
        return $this->insert($data);
    }
    public function DelData()
    {
        return $this->where('status', 'dipanggil')->delete();
    }
    public function DataGet($nomer)
    {
        return $this->where(['nomer' => $nomer])->first();
    }
    public function HitungAntrianA()
    {
        $day = date('d');
        return $this->like('nomer', 'A', 'after')->where('day(created_at)', $day)->countAllResults();
    }
    public function HitungAntrianB()
    {
        $day = date('d');
        return $this->like('nomer', 'B', 'after')->where('day(created_at)', $day)->countAllResults();
    }
    public function JumlahA()
    {
        $day = date('d');
        return $this->like('nomer', 'A', 'after')->where('day(created_at)', $day)->where('status', 'menunggu')->countAllResults();
    }
    public function JumlahB()
    {
        $day = date('d');
        return $this->like('nomer', 'B', 'after')->where('day(created_at)', $day)->where('status', 'menunggu')->countAllResults();
    }
    public function AntrianA()
    {
        $day = date('d');
        return $this->like('nomer', 'A', 'after')->orderBy('nomer', 'DESC')->where('day(created_at)', $day)->first();
    }
    public function AntrianB()
    {
        $day = date('d');
        return $this->like('nomer', 'B', 'after')->orderBy('nomer', 'DESC')->where('day(created_at)', $day)->first();
    }
    public function SekarangA()
    {
        $day = date('d');
        return $this->like('nomer', 'A', 'after')->orderBy('nomer', 'DESC')->where('status', 'dipanggil')->where('day(created_at)', $day)->first();
    }
    public function SekarangB()
    {
        $day = date('d');
        return $this->like('nomer', 'B', 'after')->orderBy('nomer', 'DESC')->where('status', 'dipanggil')->where('day(created_at)', $day)->first();
    }
    public function SelanjutnyaA()
    {
        $day = date('d');
        return $this->like('nomer', 'A', 'after')->orderBy('nomer', 'DESC')->where('status', 'menunggu')->where('day(created_at)', $day)->first();
    }
    public function SelanjutnyaB()
    {
        $day = date('d');
        return $this->like('nomer', 'B', 'after')->orderBy('nomer', 'DESC')->where('status', 'menunggu')->where('day(created_at)', $day)->first();
    }
    public function SekA()
    {
        $day = date('d');
        return $this->like('nomer', 'A', 'after')->orderBy('nomer', 'ASC')->where('day(created_at)', $day)->where('status', 'menunggu')->first();
    }
    public function SekB()
    {
        $day = date('d');
        return $this->like('nomer', 'B', 'after')->orderBy('nomer', 'ASC')->where('day(created_at)', $day)->where('status', 'menunggu')->first();
    }
    public function SekA2()
    {
        $day = date('d');
        return $this->like('nomer', 'A', 'after')->orderBy('updated_at', 'DESC')->where('day(created_at)', $day)->where('status', 'dipanggil')->first();
    }
    public function SekB2()
    {
        $day = date('d');
        return $this->like('nomer', 'B', 'after')->orderBy('updated_at', 'DESC')->where('day(created_at)', $day)->where('status', 'dipanggil')->first();
    }
    public function NomerA()
    {
        $day = date('d');
        $num = $this->selectMax('nomer', 'antrian')->like('nomer', 'A', 'after')->where('day(created_at)', $day)->doFirst();
        $id = $num['antrian'];
        if ($id) {
            $no = (int)substr($id, 1, 2);
            $no++;
        } else {
            // Jika tidak ada nomor antrian sebelumnya, dimulai dari 1
            $no = 1;
        }

        $char = "A";
        $new = $char . sprintf("%02d", $no);
        return $new;
    }
    public function NomerB()
    {
        $day = date('d');
        $num = $this->selectMax('nomer', 'antrian')->like('nomer', 'B', 'after')->where('day(created_at)', $day)->doFirst();
        $id = $num['antrian'];
        if ($id) {
            $no = (int)substr($id, 1, 2);
            $no++;
        } else {
            // Jika tidak ada nomor antrian sebelumnya, dimulai dari 1
            $no = 1;
        }

        $char = "B";
        $new = $char . sprintf("%02d", $no);
        return $new;
    }
    public function CekTemp($id)
    {
        return $this->where(['nomer'  => $id])->countAllResults();
    }
}
