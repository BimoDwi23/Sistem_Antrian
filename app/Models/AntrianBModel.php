<?php

namespace App\Models;

use CodeIgniter\Model;

class AntrianBModel extends Model
{
    protected $table            = 'antrianb';
    protected $primaryKey       = 'nomer';
    protected $allowedFields    = ['nomer', 'pasien_id', 'status', 'pengambilan'];
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
    public function HitungAntrianB()
    {
        $day = date('d');
        return $this->like('nomer', 'B', 'after')->where('day(created_at)', $day)->countAllResults();
    }
    public function JumlahB()
    {
        $day = date('d');
        return $this->like('nomer', 'B', 'after')->where('day(created_at)', $day)->where('status', 'menunggu')->countAllResults();
    }
    public function AntrianB()
    {
        $day = date('d');
        return $this->like('nomer', 'B', 'after')->orderBy('nomer', 'DESC')->where('day(created_at)', $day)->where('status', 'dipanggil')->first();
    }
    public function SekarangB()
    {
        $day = date('d');
        return $this->like('nomer', 'B', 'after')->orderBy('nomer', 'DESC')->where('status', 'dipanggil')->where('day(created_at)', $day)->first();
    }
    public function SelanjutnyaB()
    {
        $day = date('d');
        return $this->like('nomer', 'B', 'after')->orderBy('nomer', 'DESC')->where('status', 'menunggu')->where('day(created_at)', $day)->first();
    }
    public function SekB()
    {
        $day = date('d');
        return $this->like('nomer', 'B', 'after')->orderBy('nomer', 'DESC')->where('day(created_at)', $day)->findAll();
    }
    public function SekB2()
    {
        $day = date('d');
        return $this->like('nomer', 'B', 'after')->orderBy('updated_at', 'DESC')->where('day(created_at)', $day)->where('status', 'dipanggil')->first();
    }
    public function GetNomerAntrian()
    {
        $day = date('d');
        return $this->like('nomer', 'B', 'after')->orderBy('updated_at', 'DESC')->where('day(created_at)', $day)->first();
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
    public function CekTemp($nomer, $pasien)
    {
        $today = date('d'); // Mendapatkan tanggal hari ini
        return $this->like('nomer', $nomer, 'after')->where('pasien_id', $pasien)->where('day(created_at)', $today)->countAllResults();
    }
    public function DataTime()
    {
        $day = date('d');
        return $this->like('nomer', 'B', 'after')->orderBy('updated_at', 'DESC')->where('day(created_at)', $day)->where('status', 'menunggu')->where('pengambilan', 'belum')->countAllResults();
    }
}
