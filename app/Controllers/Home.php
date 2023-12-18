<?php

namespace App\Controllers;

use App\Models\AntrianModel;
use App\Models\AntrianTempModel;

class Home extends BaseController
{
    protected $Antrian;
    public function __construct()
    {
        $this->Antrian      = new AntrianModel();
    }
    public function index(): string
    {
        $data = [
            'title'          => 'Halaman Home',
            'jmlAntrianA'    => $this->Antrian->HitungAntrianA(),
            'jmlAntrianB'    => $this->Antrian->HitungAntrianB(),
            'sekarangA'      => $this->Antrian->AntrianA(),
            'sekarangB'      => $this->Antrian->AntrianB(),
            'selanjutA'      => $this->Antrian->SelanjutnyaA(),
            'selanjutB'      => $this->Antrian->SelanjutnyaB(),
            'sisaA'          => $this->Antrian->JumlahA(),
            'sisaB'          => $this->Antrian->JumlahB(),
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
            'sekarangA'      => $this->Antrian->SekarangA(),
            'hitungA'        => $this->Antrian->HitungAntrianA(),
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
            'sekarangB'      => $this->Antrian->SekarangB(),
            'hitungB'        => $this->Antrian->HitungAntrianB(),
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
