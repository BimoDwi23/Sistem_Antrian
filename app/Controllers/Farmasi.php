<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AntrianModel;

class Farmasi extends BaseController
{
    protected $Antrian;
    protected $Client;
    public function __construct()
    {
        $this->Antrian      = new   AntrianModel();
        $this->Client = \Config\Services::curlrequest();
    }
    public function index()
    {
        $url = 'http://localhost:8080/sistem_antrian/pasien/json';
        $json = file_get_contents($url);
        $pasien = json_decode($json, true);
        $data = [
            'titleA'         => 'Antrian Obat Racik',
            'titleB'         => 'Antrian Obat Non Racik',
            'sekarangA'      => $this->Antrian->SekA2(),
            'SekA2'          => $this->Antrian->SekA(),
            'sekarangB'      => $this->Antrian->SekB2(),
            'SekB2'          => $this->Antrian->SekB(),
            'nomerA'         => $this->Antrian->NomerA(),
            'nomerB'         => $this->Antrian->NomerB(),
            'pasien'         => $pasien,
            'uri'            => new \CodeIgniter\HTTP\URI('http://localhost:8080/dashboard')
        ];
        return view('farmasi/view', $data);
    }
    public function Coba()
    {
        $data = [
            'title'          => 'Halaman Home',
            'uri'            => new \CodeIgniter\HTTP\URI('http://localhost:8080/dashboard')
        ];
        return view('coba', $data);
    }
    public function tambah()
    {

        $pasien     = $this->request->getPost('id_pasien');
        $nomer      = $this->request->getPost('antrian');
        $telp       = $this->request->getPost('telp_baru');
        $session    = 'default';
        $status     = 'menunggu';
        $antrianA   = $this->Antrian->SekA2();
        $antrianB   = $this->Antrian->SekB2();
        $nm = substr($nomer, 0, 1);

        $url = 'http://localhost:3000/api/sendText';

        if ($antrianA != null || $antrianB != null) {
            if ($nm == "A") {
                $WA = [
                    'chatId'         => $telp . '@c.us',
                    'text'           => "Nomer Antrian Anda *" . $nomer . "*" .
                        "\nNomer Antrian Sedang Dipanggil *" . $antrianA['nomer'] . "*",
                    'session'        => $session
                ];
                $this->Client->request('POST', $url, [
                    'form_params' => $WA
                ]);
            } else {
                $WA = [
                    'chatId'         => $telp . '@c.us',
                    'text'           => "Nomer Antrian Anda *" . $nomer . "*" .
                        "\nNomer Antrian Sedang Dipanggil *" . $antrianB['nomer'] . "*",
                    'session'        => $session
                ];
                $this->Client->request('POST', $url, [
                    'form_params' => $WA
                ]);
            }
        } else {
            $WA = [
                'chatId'         => $telp . '@c.us',
                'text'           => "Nomer Antrian Anda *" . $nomer . "*" .
                    "\nBelum ada nomer antrian yang dipanggil",
                'session'        => $session
            ];
            $this->Client->request('POST', $url, [
                'form_params' => $WA
            ]);
        }
        $data = [
            'nomer'         => $nomer,
            'pasien_id'     => $pasien,
            'status'        => $status
        ];
        $this->Antrian->TambahData($data);
        return redirect()->to('farmasi/view');
    }
    public function editA()
    {
        $nomer      = $this->request->getPost('nomer');
        $telp       = $this->request->getPost('telp_baru');
        $session    = 'default';
        $url = 'http://localhost:3000/api/sendText';

        $chat = [
            'chatId'         => '62' . ltrim($telp, 0) . '@c.us',
            'text'           => "Nomer Antrian Anda *" . $nomer . "* Sedang Dipanggil",
            'session'        => $session
        ];
        $this->Client->request('POST', $url, [
            'form_params' => $chat
        ]);
        $data  = [
            'status'    => "dipanggil"
        ];
        $this->Antrian->update($nomer, $data);
    }
    public function editB()
    {
        $nomer      = $this->request->getPost('nomer');
        $telp       = $this->request->getPost('telp_baru');
        $session    = 'default';
        $url = 'http://localhost:3000/api/sendText';

        $chat = [
            'chatId'         => '62' . ltrim($telp, 0) . '@c.us',
            'text'           => "Nomer Antrian Anda *" . $nomer . "* Sedang Dipanggil",
            'session'        => $session
        ];
        $this->Client->request('POST', $url, [
            'form_params' => $chat
        ]);
        $data  = [
            'status'    => "dipanggil"
        ];
        $this->Antrian->update($nomer, $data);
    }
    public function Print($antrian)
    {
        $data = [
            'title'     => 'Nomer Antrian ' . $antrian,
            'antrian'   => $antrian,
        ];
        return view('farmasi/print', $data);
    }
}
