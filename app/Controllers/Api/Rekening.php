<?php

namespace App\Controllers\Api;

use App\Models\RekeningModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;


class Rekening extends ResourceController
{

    use ResponseTrait;

    public function show($id = null)
    {
        $model = new RekeningModel();
        $data = $model->find($id);
        return $this->respond($data);
    }
    //--------------------------------------------------------------------

}
