<?php

namespace App\Controllers;

use App\Models\ProductModel;

class ProductController extends BaseController
{
    public function index()
    {

        $model = new ProductModel();
        // $data['products'] = $model->findAll();
        //adding pagintion
        $data['products'] = $model->paginate(5);
        $data['pager'] = $model->pager;
        return view('products/index', $data);
    }
    public function create()
    {
        return view('/products/create');
    }
    public function store()
    {
        $model = new ProductModel();
        $model->save([
            'name' => $this->request->getPost('name'),
            'price' => $this->request->getPost('price'),
            'description' => $this->request->getPost('description')
        ]);

        return redirect()->to('/products');
    }

    //craeting edit page 
    public function edit($id)
    {
        $model = new ProductModel();
        $data['product'] = $model->find($id);
        return view('/products/edit', $data);
    }
    public function update($id)
    {
        $model = new ProductModel();

        $model->update($id, [
            'name' => $this->request->getPost('name'),
            'price' => $this->request->getPost('price'),
            'description' => $this->request->getPost('description')
        ]);
        return redirect()->to('/products');
    }
    public function delete($id)
    {
        $model = new ProductModel();
        $data = $model->delete($id);
        return redirect()->to('/products');
    }
}
