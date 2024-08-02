<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Repositories\ProductRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

class ProductController extends Controller
{

    private $product_repo;

    public function __construct(ProductRepository $products)
    {
        $this->product_repo = $products;
        $this->middleware('permission:view product')->only('index');
        $this->middleware('permission:create product')->only('create', 'store');
        $this->middleware('permission:edit product')->only('edit', 'update');
        $this->middleware('permission:delete product')->only('delete');
    }

    public function index()
    {
        return Inertia::render('Product/Index', [
            'products' => $this->product_repo->getAllProducts()
        ]);
    }


    public function create()
    {
        return Inertia::render('Product/Create');
    }


    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $this->product_repo->store($request);
        } catch (Exception $th) {
            if ($th instanceof ValidationException) throw $th;
            DB::rollback();
        }
        DB::commit();
        return redirect()->route('products.index');
    }


    public function show(Product $product)
    {
        //
    }


    public function edit(Product $product)
    {
        return Inertia::render('Product/Create', [
            'product' => $product
        ]);
    }


    public function update(Request $request, Product $product)
    {
        DB::beginTransaction();

        try {
            $this->product_repo->update($request, $product);
        } catch (Exception $th) {
            if ($th instanceof ValidationException) throw $th;
            DB::rollback();
        }
        DB::commit();
        return redirect()->route('products.index');
    }


    public function destroy(Product $product)
    {
        DB::beginTransaction();

        try {
            $product->delete();
        } catch (Exception $th) {
            if ($th instanceof ValidationException) throw $th;
            DB::rollback();
        }
        DB::commit();
        return redirect()->route('products.index');
    }
}
