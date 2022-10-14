<?php

namespace App\Controllers\Api;

use App\Models\FraksiModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;


class Fraksi extends ResourceController
{

    use ResponseTrait;

    public function show($id = null)
    {
        $model = new FraksiModel();
        $data = $model->find($id);
        return $this->respond($data);
    }
    //--------------------------------------------------------------------

}
