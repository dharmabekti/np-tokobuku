<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use Myth\Auth\Models\UserModel;
use Myth\Auth\Password;

define('_TITLE', 'Users');

class Users extends BaseController
{
    private $_user_model;
    public function __construct()
    {
        $this->_user_model = new UsersModel();
    }

    public function index()
    {
        $data_user = $this->_user_model->getUsers();
        // dd($data_user);
        $data = [
            "title" => _TITLE,
            "result" => $data_user
        ];

        return view('user/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => _TITLE
        ];
        return view('user/create', $data);
    }

    public function save()
    {
        $user_myth = new UserModel();
        $user_myth->withGroup($this->request->getVar('role'))->save([
            'firstname' => $this->request->getVar('firstname'),
            'lastname' => $this->request->getVar('lastname'),
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'password_hash' => Password::hash("123456"),
            'active' => 1
        ]);

        session()->setFlashdata('success', 'Berhasil menambahkan user');
        return redirect()->to('/users');
    }

    public function delete($id)
    {
        $this->_user_model->delete($id);
        session()->setFlashdata("success", "Data berhasil dihapus!");
        return redirect()->to('/users');
    }

    public function resetPassword($id)
    {
        $this->_user_model->save([
            'id' => $id,
            'password_hash' => Password::hash("123456"),
        ]);

        session()->setFlashdata('success', 'Passsword berhasil direset ke default!');
        return redirect()->to('/users');
    }
}
