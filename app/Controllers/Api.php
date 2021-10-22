<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;

class Api extends BaseController
{
    use ResponseTrait;

    private $userModel;

    public function __construct()
    {

        $this->userModel = new UserModel();
    }

    public function index()
    {
        //
        $data = $this->userModel->findAll();
        return $this->respond($data, 200);
    }

    public function create2()
    {
        $data = $this->request->getPost();
        return $this->respond($data, 200);
    }
    public function create()
    {
        $validation = $this->validate([
            'email' => "required|valid_email|is_unique[users.email]",
            'name'  => 'required|alpha_space'
        ]);
        if (!$validation) {

            $response = [
                'status'   => 400,
                'error'    => $this->validator->getErrors(),
                'messages' => [
                    'error' => $this->validator->getErrors()
                ]
            ];
            return $this->fail($this->validator->getErrors());


            // return $this->fail($this->validator->getErrors());
            // return $this->respond($this->validator->getErrors(), 400);
            // return $this->failValidationErrors($this->validator->getErrors());
        };

        $input_data = [
            'name' => $this->request->getVar('name'),
            'email'  => $this->request->getVar('email'),
        ];
        $data = $this->userModel->insert($input_data);

        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'User created',
                'inputs' => $this->request->getVar()
            ]
        ];
        return $this->respondCreated($response);
    }
}
