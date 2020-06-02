<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = ['Product 01', 'Product 01', 'Product 01'];

        return $products;
    }

    public function show($id)
    {
        return "{$id}";
    }

    public function create()
    {
        return "Create";
    }

    public function edit($id)
    {
        return "Create {$id}";
    }

    public function store()
    {
        return 'Novo Produto';
    }

    public function update($id)
    {
        return "Editar Produto: {$id}";
    }

    public function destroy($id)
    {
        return "Delete Produto: {$id}";
    }
}
