<?php

namespace App\Models;

use CodeIgniter\Model;

class AntrianAModel extends Model
{
    protected $table            = 'antriana';
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
    public function HitungAntrianA()
    {
        $day = date('d');
        return $this->like('nomer', 'A', 'after')->where('day(created_at)', $day)->countAllResults();
    }
    public function JumlahA()
    {
        $day = date('d');
        return $this->like('nomer', 'A', 'after')->where('day(created_at)', $day)->where('status', 'menunggu')->countAllResults();
    }
    public function AntrianA()
    {
        $day = date('d');
        return $this->like('nomer', 'A', 'after')->orderBy('nomer', 'DESC')->where('day(created_at)', $day)->where('status', 'dipanggil')->first();
    }
    public function SekarangA()
    {
        $day = date('d');
        return $this->like('nomer', 'A', 'after')->orderBy('updated_at', 'DESC')->where('status', 'dipanggil')->where('day(created_at)', $day)->first();
    }
    public function SelanjutnyaA()
    {
        $day = date('d');
        return $this->like('nomer', 'A', 'after')->orderBy('nomer', 'DESC')->where('status', 'menunggu')->where('day(created_at)', $day)->first();
    }
    public function SekA()
    {
        $day = date('d');
        return $this->like('nomer', 'A', 'after')->orderBy('nomer', 'DESC')->where('day(created_at)', $day)->findAll();
    }
    public function SekA2()
    {
        $day = date('d');
        return $this->like('nomer', 'A', 'after')->orderBy('updated_at', 'DESC')->where('day(created_at)', $day)->where('status', 'dipanggil')->first();
    }
    public function GetNomerAntrian()
    {
        $day = date('d');
        return $this->like('nomer', 'B', 'after')->orderBy('updated_at', 'DESC')->where('day(created_at)', $day)->first();
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
    public function CekTemp($nomer, $pasien)
    {
        $today = date('d'); // Mendapatkan tanggal hari ini
        return $this->like('nomer', $nomer, 'after')->where('pasien_id', $pasien)->where('day(created_at)', $today)->countAllResults();
    }
    public function DataTime()
    {
        $day = date('d');
        return $this->like('nomer', 'A', 'after')->orderBy('updated_at', 'DESC')->where('day(created_at)', $day)->where('status', 'menunggu')->where('pengambilan', 'belum')->countAllResults();
    }
}
