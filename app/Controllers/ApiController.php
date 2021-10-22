<?php

namespace App\Controllers;

use App\Controllers\BaseController;
// use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;

class ApiController extends BaseController
{
    use ResponseTrait;
    // private $UserModel;

    // public function __construct()
    // {
    //     $this->userModel = new UserModel;
    //     $this->db = \Config\Database::connect();
    // }

    public function index()
    {
        return $this->respond("test");
        // return "get";
        //
        // return $this->respond($this->request->getPost());
        // return $this->respond($this->request->getVar(), 200);
        // var_dump($this->request->getVar(), 200);
    }
}
