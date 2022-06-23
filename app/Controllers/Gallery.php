<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GalleryModel;

define('_TITLE', 'Galeri');

class Gallery extends BaseController
{
    private $_galeri_model;
    public function __construct()
    {
        $this->_galeri_model = new GalleryModel();
    }

    public function index()
    {
        $data = [
            'title' => _TITLE,
            'result' => $this->_galeri_model->findAll()
        ];

        return view('galeri/index', $data);
    }

    public function save()
    {
        $files = $this->request->getFileMultiple('galeri');
        if (!empty($files)) {
            $path_upload = "img/galeri/";
            if (!file_exists($path_upload)) {
                mkdir($path_upload, 0777, true);
            }

            foreach ($files as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $filename = $file->getRandomName();
                    $file->move($path_upload, $filename);

                    $array_temp = [
                        'nama_file' => $filename,
                        'type_file' => $file->getClientMimeType(),
                        'size' => $file->getSize(),
                        'path' => $path_upload . $filename
                    ];

                    $this->_galeri_model->save($array_temp);
                }
            }

            session()->setFlashdata('success', 'Galeri berhasil ditambahkan');
        } else {
            session()->setFlashdata('error', 'Galeri gagal ditambahkan!');
        }
        return redirect('galeri');
    }

    public function delete($id)
    {
        $data_galeri = $this->_galeri_model->where(['id' => $id])->first();
        $this->_galeri_model->delete($id);
        unlink($data_galeri['path']);
        session()->setFlashdata('success', 'Galeri berhasil dihapus');
        return redirect('galeri');
    }
}
