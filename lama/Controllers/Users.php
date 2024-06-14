<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LevelModel;
use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;

class Users extends BaseController
{
    protected $Level;
    protected $User;
    use ResponseTrait;
    protected $enkripsi;
    public function __construct()
    {
        $this->Level  = new LevelModel();
        $this->User   = new UserModel();
    }
    public function user()
    {
        $data = [
            'title'     => 'Data User',
            'user'      => $this->User->getUser(),
            'uri'       => new \CodeIgniter\HTTP\URI('http://localhost:8080/user'),

        ];

        return view('user/user_view', $data);
    }
    public function Json()
    {
        $data = $this->User->findAll();
        return $this->respond($data);
    }
    public function tambah_user()
    {
        $data = [
            'title'     => 'Tambah Data User',
            'uri'       => new \CodeIgniter\HTTP\URI('http://localhost:8080/user'),
            'autonum'   => $this->User->autonum(),
            'level'     => $this->Level->findAll(),

        ];

        return view('user/user_tambah', $data);
    }
    public function add_user()
    {
        $data = [
            'id_user'   => $this->request->getVar('id_user'),
            'username'  => $this->request->getVar('username'),
            'password'  => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'level_id'  => $this->request->getVar('level_id'),
        ];
        $this->User->TambahData($data);
        session()->setFlashdata('pesan', 'Tambah');

        return redirect()->to('user/view');
    }
    public function edit_user($id)
    {
        $data = [
            'title'     => 'Edit Data User',
            'uri'       => new \CodeIgniter\HTTP\URI('http://localhost:8080/user'),
            'user'      => $this->User->getUser($id),
            'level'     => $this->Level->findAll(),

        ];

        return view('user/user_edit', $data);
    }
    public function update_user($id)
    {
        $data = [
            'username'  => $this->request->getVar('username'),
            'password'  => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'level_id'  => $this->request->getVar('level_id'),
        ];

        $this->User->update($id, $data);
        session()->setFlashdata('pesan', 'Ubah');

        return redirect()->to('user/view');
    }
    public function delete_user($id)
    {
        $this->User->delete($id);
        session()->setFlashdata('pesan', 'Hapus');

        return redirect()->to('user/view');
    }
    public function level()
    {
        $data = [
            'title'     => 'Data Level',
            'level'     => $this->Level->getLevel(),
            'uri'       => new \CodeIgniter\HTTP\URI('http://localhost:8080/level')

        ];

        return view('user/level_view', $data);
    }
    public function tambah_level()
    {
        $data = [
            'title'     => 'Data Tambah Level',
            'uri'       => new \CodeIgniter\HTTP\URI('http://localhost:8080/level'),
            'autonum'   => $this->Level->autonum()

        ];

        return view('user/level_tambah', $data);
    }
    public function add_level()
    {
        $data = [
            'id_level'  => $this->request->getVar('id_level'),
            'level'     => $this->request->getVar('level')
        ];
        $this->Level->TambahData($data);
        session()->setFlashdata('pesan', 'Tambah');

        return redirect()->to('level/view');
    }
    public function edit_level($id)
    {
        $data = [
            'title'     => 'Data Edit Level',
            'uri'       => new \CodeIgniter\HTTP\URI('http://localhost:8080/level'),
            'level'       => $this->Level->getLevel($id)

        ];

        return view('user/level_edit', $data);
    }
    public function update_level($id_level)
    {
        $data = [
            'level' => $this->request->getVar('level')
        ];

        $this->Level->update($id_level, $data);
        session()->setFlashdata('pesan', 'Ubah');

        return redirect()->to('level/view');
    }
    public function delete_level($id_level)
    {
        $this->Level->delete($id_level);
        session()->setFlashdata('pesan', 'Hapus');

        return redirect()->to('level/view');
    }
}
