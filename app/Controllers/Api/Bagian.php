<?php

namespace App\Controllers\Api;

use App\Models\BagianModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;


class Bagian extends ResourceController
{

    use ResponseTrait;

    public function show($id = null)
    {
        $model = new BagianModel();
        $data = $model->find($id);
        return $this->respond($data);
    }
    //--------------------------------------------------------------------

}
