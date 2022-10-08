<?php

namespace App\Controllers\Api;

use App\Models\KegiatanModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;


class Kegiatan extends ResourceController
{

    use ResponseTrait;

    public function show($id = null)
    {
        $model = new KegiatanModel();
        $data = $model->find($id);
        return $this->respond($data);
    }
    //--------------------------------------------------------------------

}
