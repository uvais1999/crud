<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProductRepository
{
    public function store($request)
    {

        $this->validateData($request);

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
        ]);
    }

    public function update($request, $product)
    {

        $this->validateData($request);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->save();
       
    }


    public function getAllProducts()
    {
        return Product::get();
    }

    private function validateData($request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
        ]);
    }
}
