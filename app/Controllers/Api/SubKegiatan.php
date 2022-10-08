<?php

namespace App\Controllers\Api;

use App\Models\SubKegiatanModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;


class SubKegiatan extends ResourceController
{

    use ResponseTrait;

    public function show($id = null)
    {
        $model = new SubKegiatanModel();
        $data = $model->find($id);
        return $this->respond($data);
    }
    //--------------------------------------------------------------------

}
