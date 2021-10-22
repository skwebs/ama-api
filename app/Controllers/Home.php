<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;


class Home extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        // return view('welcome_message');
        return view('index');
    }

    public function reg()
    {
        // var_dump($this->request->getPost());
        return $this->respond($this->request->getPost(), 200);
    }
}
