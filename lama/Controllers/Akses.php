<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\Validation\Rules;

class Akses extends BaseController
{
    protected $Akses;
    protected $enkripsi;

    public function __construct()
    {
        $this->Akses   = new UserModel();
    }

    public function index()
    {
        $validation = \Config\Services::validation();

        // Menyiapkan aturan validasi
        $validation->setRules([
            'username' => 'required',
            'password' => 'required|trim'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            $data['title'] = 'Halaman Login';

            return view('akses/login', $data);
        }
    }

    // Fungsi untuk login
    public function login()
    {
        $nama = $this->request->getPost('username');
        $pass = $this->request->getPost('password');
        $cek = $this->Akses->where('username', $nama)->first();

        if ($cek) {
            if ($cek['level_id'] == "LV001" || $cek['level_id'] == "LV002" || $cek['level_id'] == "LV003") {
                if (password_verify($pass, $cek['password'])) {
                    $data = [
                        'username'      => $cek['username'],
                        'level_id'      => $cek['level_id'],
                    ];
                    $session = session();
                    $session->set($data);
                    return redirect()->to(base_url('/'));
                } else {
                    $session = session();
                    $session->setFlashdata('alert', '<div class="alert alert-danger" role="alert">Password tidak sesuai</div>');
                    return redirect()->to(base_url('login'));
                }
            } else {
                $session = session();
                $session->setFlashdata('alert', '<div class="alert alert-danger" role="alert">Tidak Memiliki akses</div>');
                return redirect()->to(base_url('login'));
            }
        } else {
            $session = session();
            $session->setFlashdata('alert', '<div class="alert alert-danger" role="alert">Username tidak terdaftar</div>');
            return redirect()->to(base_url('login'));
        }
    }
    public function logout()
    {
        $session = session();
        $session->destroy(['nama', 'level_id']);

        $session->setFlashdata('pesan', 'Logout');

        return redirect()->to(base_url('login'));
    }
}
