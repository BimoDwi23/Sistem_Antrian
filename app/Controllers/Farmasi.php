<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AntrianModel;
use App\Models\AntrianAModel;
use App\Models\AntrianBModel;

class Farmasi extends BaseController
{
    protected $Antrian;
    protected $AntrianA;
    protected $AntrianB;
    protected $Client;
    public function __construct()
    {
        $this->Antrian       = new   AntrianModel();
        $this->AntrianA      = new   AntrianAModel();
        $this->AntrianB      = new   AntrianBModel();
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
            'sekarangA'      => $this->AntrianA->SekA2(),
            'SekA2'          => $this->AntrianA->SekA(),
            'sekarangB'      => $this->AntrianB->SekB2(),
            'SekB2'          => $this->AntrianB->SekB(),
            'nomerA'         => $this->AntrianA->NomerA(),
            'nomerB'         => $this->AntrianB->NomerB(),
            'pasien'         => $pasien,
            'uri'            => new \CodeIgniter\HTTP\URI('http://localhost:8080/dashboard')
        ];
        return view('farmasi/view', $data);
    }
    public function Coba()
    {
        $url = 'http://localhost:8080/sistem_antrian/pasien/json';
        $json = file_get_contents($url);
        $pasien = json_decode($json, true);
        $data = [
            'titleA'         => 'Antrian Obat Racik',
            'titleB'         => 'Antrian Obat Non Racik',
            'sekarangA'      => $this->AntrianA->SekA2(),
            'SekA2'          => $this->AntrianA->SekA(),
            'sekarangB'      => $this->AntrianB->SekB2(),
            'SekB2'          => $this->AntrianB->SekB(),
            'nomerA'         => $this->AntrianA->NomerA(),
            'nomerB'         => $this->AntrianB->NomerB(),
            'pasien'         => $pasien,
            'uri'            => new \CodeIgniter\HTTP\URI('http://localhost:8080/dashboard')
        ];
        return view('coba/tambah', $data);
    }
    public function cobaTambah()
    {
        $url = 'http://localhost:8080/sistem_antrian/pasien/json';
        $json = file_get_contents($url);
        $pasien = json_decode($json, true);
        $pasien     = $this->request->getPost('id_pasien');
        $nomer      = $this->request->getPost('antrian');
        $telp       = $this->request->getPost('telp_baru');
        $session    = 'default';
        $status     = 'menunggu';
        $ambil      = 'belum';
        $antrianA   = $this->AntrianA->SekA2();
        $antrianB   = $this->AntrianB->SekB2();
        $nm = substr($nomer, 0, 1);
        $cekTempA = $this->AntrianA->CekTemp($nm, $pasien);
        $cekTempB = $this->AntrianB->CekTemp($nm, $pasien);
        $GetAntrianA = $this->AntrianA->GetNomerAntrian();
        $GetAntrianB = $this->AntrianB->GetNomerAntrian();
        // var_dump($antrianB);
        if ($cekTempA > 0  || $cekTempB > 0) {
            echo '1';
        } else {
            $url = 'http://localhost:3000/api/sendText';
            $isAntrianA = $nm == "A";

            if ($isAntrianA) {
                $currentAntrian = $antrianA['nomer'] ?? "Belum ada nomer antrian yang dipanggil";
                $this->TambahDataAntrian('A', $nomer, $pasien, $status, $ambil);
            } else {
                $currentAntrian = $antrianB['nomer'] ?? "Belum ada nomer antrian yang dipanggil";
                $this->TambahDataAntrian('B', $nomer, $pasien, $status, $ambil);
            }

            $WA = [
                'chatId' => $telp . '@c.us',
                'text' => "Nomer Antrian Anda *" . $nomer . "*" .
                    "\nNomer Antrian Sedang Dipanggil *" . $currentAntrian . "*",
                'session' => $session
            ];

            $this->Client->request('POST', $url, [
                'form_params' => $WA
            ]);
        }
    }
    private function TambahDataAntrian($antrianType, $nomer, $pasien, $status, $ambil)
    {
        $data = [
            'nomer' => $nomer,
            'pasien_id' => $pasien,
            'status' => $status,
            'pengambilan' => $ambil
        ];

        if ($antrianType == 'A') {
            $this->AntrianA->TambahData($data);
        } else {
            $this->AntrianB->TambahData($data);
        }
    }
    public function tambah()
    {
        $url = 'http://localhost:8080/sistem_antrian/pasien/json';
        $json = file_get_contents($url);
        $pasien = json_decode($json, true);
        $pasien     = $this->request->getPost('id_pasien');
        $nomer      = $this->request->getPost('antrian');
        $telp       = $this->request->getPost('telp_baru');
        $session    = 'default';
        $status     = 'menunggu';
        $ambil      = 'belum';
        $antrianA   = $this->AntrianA->SekA2();
        $antrianB   = $this->AntrianB->SekB2();
        $nm = substr($nomer, 0, 1);
        $cekTempA = $this->AntrianA->CekTemp($nm, $pasien);
        $cekTempB = $this->AntrianB->CekTemp($nm, $pasien);
        $GetAntrianA = $this->AntrianA->GetNomerAntrian();
        $GetAntrianB = $this->AntrianA->GetNomerAntrian();
        if ($cekTempA > 0  || $cekTempB > 0) {
            echo '1';
        } else {
            $url = 'http://localhost:3000/api/sendText';
            $isAntrianA = $nm == "A";

            if ($isAntrianA) {
                $currentAntrian = $antrianA['nomer'] ?? "Belum ada nomer antrian yang dipanggil";
                $this->TambahDataAntrian('A', $nomer, $pasien, $status, $ambil);
            } else {
                $currentAntrian = $antrianB['nomer'] ?? "Belum ada nomer antrian yang dipanggil";
                $this->TambahDataAntrian('B', $nomer, $pasien, $status, $ambil);
            }

            $WA = [
                'chatId' => $telp . '@c.us',
                'text' => "Nomer Antrian Anda *" . $nomer . "*" .
                    "\nNomer Antrian Sedang Dipanggil *" . $currentAntrian . "*",
                'session' => $session
            ];

            $this->Client->request('POST', $url, [
                'form_params' => $WA
            ]); // return redirect()->to('farmasi/view');
        }
    }
    public function UlangA($nomerAntrian)
    {
        $nomer = $nomerAntrian;
        $data  = [
            'status'    => "dipanggil"
        ];
        $this->Antrian->update($nomer, $data);
    }
    public function ambilA($nomer)
    {
        $telp       = $this->request->getPost('telp_baru');
        $session    = 'default';
        $url = 'http://localhost:3000/api/sendText';

        $chat = [
            'chatId'         => '62' . ltrim($telp, 0) . '@c.us',
            'text'           => "Terima kasih Anda Telah Berkunjung Di Bagian Farmasi",
            'session'        => $session
        ];
        $this->Client->request('POST', $url, [
            'form_params' => $chat
        ]);
        $data  = [
            'pengambilan'    => "diambil"
        ];
        $this->AntrianA->update($nomer, $data);
    }
    public function ambilB($nomer)
    {
        $telp       = $this->request->getPost('telp_baru');
        $session    = 'default';
        $url = 'http://localhost:3000/api/sendText';

        $chat = [
            'chatId'         => '62' . ltrim($telp, 0) . '@c.us',
            'text'           => "Terima kasih Anda Telah Berkunjung Di Bagian Farmasi",
            'session'        => $session
        ];
        $this->Client->request('POST', $url, [
            'form_params' => $chat
        ]);
        $data  = [
            'pengambilan'    => "diambil"
        ];
        $this->AntrianB->update($nomer, $data);
    }
    public function editA($nomer)
    {
        $telp       = $this->request->getPost('telp_baru');
        $session    = 'default';
        $url = 'http://localhost:3000/api/sendText';

        $chat = [
            'chatId'         => '62' . ltrim($telp, 0) . '@c.us',
            'text'           => "Nomer Antrian Anda *" . $nomer . "* Sedang Dipanggil Silahkan Mengambil Obat",
            'session'        => $session
        ];
        $this->Client->request('POST', $url, [
            'form_params' => $chat
        ]);
        $data  = [
            'status'    => "dipanggil"
        ];
        $this->AntrianA->update($nomer, $data);
    }
    public function editB($nomer)
    {
        $telp       = $this->request->getPost('telp_baru');
        $session    = 'default';
        $url = 'http://localhost:3000/api/sendText';

        $chat = [
            'chatId'         => '62' . ltrim($telp, 0) . '@c.us',
            'text'           => "Nomer Antrian Anda *" . $nomer . "* Sedang Dipanggil Silahkan Mengambil Obat",
            'session'        => $session
        ];
        $this->Client->request('POST', $url, [
            'form_params' => $chat
        ]);
        $data  = [
            'status'    => "dipanggil"
        ];
        $this->AntrianB->update($nomer, $data);
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
