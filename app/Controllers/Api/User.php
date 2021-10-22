<?php

namespace App\Controllers\Api;

use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;

class User extends BaseController
{
    private $UserModel;
    use ResponseTrait;

    public function __construct()
    {
        $this->userModel = new UserModel;
        $this->db = \Config\Database::connect();
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        //
        $data = $this->userModel->findAll();
        return $this->respond($data, 200);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        var_dump($id);
        exit;
        if ($id == null) {
            return $this->failNotFound('User does not exist.');
        };

        $data = $this->userModel->where('id', $id)->first();

        if ($data) {
            return $this->respond($data, 200);
        } else {
            return $this->failNotFound('User does not exist.');
        }
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        if (!$this->validate([
            'email' => "required|valid_email|is_unique[users.email]",
            'name'  => 'required|alpha_space'
        ])) {
            return $this->failValidationErrors($this->validator->getErrors());
        };

        $input_data = [
            'name' => $this->request->getVar('name'),
            'email'  => $this->request->getVar('email'),
        ];
        $data = $this->userModel->insert($input_data);
        var_dump($data);
        exit;
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

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        // $id = $this->request->getVar('id');

        if ($id == null) {
            exit("Id required.");
        };

        if (!$this->validate([
            'email' => "required|valid_email",
            'name'  => 'required|alpha_space'
        ])) {
            return $this->failValidationErrors($this->validator->getErrors());
        };

        $data = [
            'name' => $this->request->getVar('name'),
            'email'  => $this->request->getVar('email'),
        ];

        $this->userModel->update($id, $data);
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'User updated.',
                'inputs' => $this->request->getVar(),
                'id' => $id
            ]
        ];
        return $this->respond($response);
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        if ($id == null) {
            exit("Id required.");
        };

        $data = $this->userModel->where('id', $id)->first();
        if ($data) {
            $this->userModel->delete($id);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'User deleted'
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('User does not exist.');
        }
    }



    public function deleted()
    {
        $deleted_data = $this->userModel->onlyDeleted()->findAll();
        if (empty($deleted_data)) {
            $data = [];
        } else {
            $data = [];
        }
        return $this->respond($data, 200);
    }


    public function restore($id = null)
    {
        if ($id == null) {
            exit("Id required.");
        };

        $data = $this->userModel->onlyDeleted()->findAll();

        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $res = $builder->where('id', $id)->update(['deleted_at' => null]);


        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'User restored.',
                'data' => $data,
                'res' => $res
            ]
        ];
        return $this->respond($response);
    }
}