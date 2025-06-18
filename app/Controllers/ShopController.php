<?php

namespace App\Controllers;

use App\Models\ProductModel;

class ShopController extends BaseController
{
    public function index()
    {
        $model = new ProductModel();
        $data['products'] = $model->findAll();
        return view('shop/index', $data);
    }
}
