<?php

namespace App\Controllers;

use App\Models\AntrianModel;
use App\Models\AntrianAModel;
use App\Models\AntrianBModel;

class Home extends BaseController
{
    protected $Antrian;
    protected $AntrianA;
    protected $AntrianB;
    public function __construct()
    {
        $this->Antrian       = new AntrianModel();
        $this->AntrianA      = new AntrianAModel();
        $this->AntrianB      = new AntrianBModel();
    }
    public function index(): string
    {
        $data = [
            'title'          => 'Halaman Home',
            'jmlAntrianA'    => $this->AntrianA->HitungAntrianA(),
            'jmlAntrianB'    => $this->AntrianB->HitungAntrianB(),
            'sekarangA'      => $this->AntrianA->AntrianA(),
            'sekarangB'      => $this->AntrianB->AntrianB(),
            'selanjutA'      => $this->AntrianA->SelanjutnyaA(),
            'selanjutB'      => $this->AntrianB->SelanjutnyaB(),
            'sisaA'          => $this->AntrianA->JumlahA(),
            'sisaB'          => $this->AntrianB->JumlahB(),
            'uri'            => new \CodeIgniter\HTTP\URI('http://localhost:8080/dashboard')
        ];
        return view('home', $data);
    }
    public function Json()
    {
        $url = 'http://localhost:8080/sistem_antrian/pasien/json';
        $json = file_get_contents($url);
        $data = json_decode($json, true);
        var_dump($data);
    }
    public function Interface()
    {
        $data = [
            'title'          => 'Halaman Interface',
            'sekarangA'      => $this->Antrian->SekarangA(),
            'sekarangB'      => $this->Antrian->SekarangB(),
            'hitungA'        => $this->Antrian->HitungAntrianA(),
            'hitungB'        => $this->Antrian->HitungAntrianB()
        ];
        return view('interface', $data);
    }
    public function antrianA()
    {
        $url = 'http://localhost:8080/sistem_antrian/pasien/json';
        $json = file_get_contents($url);
        $data = json_decode($json, true);
        $data = [
            'sekarangA'      => $this->AntrianA->SekarangA(),
            'hitungA'        => $this->AntrianA->HitungAntrianA(),
            'pasien'         => $data
        ];
        return view('antrianA', $data);
    }
    public function antrianB()
    {
        $url = 'http://localhost:8080/sistem_antrian/pasien/json';
        $json = file_get_contents($url);
        $data = json_decode($json, true);
        $data = [
            'sekarangB'      => $this->AntrianB->SekarangB(),
            'hitungB'        => $this->AntrianB->HitungAntrianB(),
            'pasien'         => $data
        ];
        return view('antrianB', $data);
    }
    public function error()
    {
        $data = [
            'message'   => 'Anda Tidak Memiliki Akses'
        ];
        return view('errors/html/error_404', $data);
    }
    public function antrian()
    {
        $data = [
            'title'          => 'Halaman Nomer Antrian',
            'antrian'        => $this->Antrian->findAll(),
            'uri'            => new \CodeIgniter\HTTP\URI('http://localhost:8080/dashboard')
        ];
        return view('view_antrian', $data);
    }
    public function delete()
    {
        $this->Antrian->DelData();

        session()->setFlashdata('pesan', 'semua data telah terhapus');
        return redirect()->to('antrian');
    }
}
