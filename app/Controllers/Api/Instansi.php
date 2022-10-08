<?php

namespace App\Controllers\Api;

use App\Models\InstansiModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;


class Instansi extends ResourceController
{

    use ResponseTrait;

    public function show($id = null)
    {
        $model = new InstansiModel();
        $data = $model->find($id);
        return $this->respond($data);
    }
    //--------------------------------------------------------------------

}
