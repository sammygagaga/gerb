<?php

namespace App\Http\Controllers;

use App\Actions\CreateNewProduct;
use App\Actions\DestroyProduct;
use App\Actions\GetUserProducts;
use App\Actions\UpdateProduct;
use App\Data\ProductData;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class
GerbController extends Controller
{
    public function all()
    {
        $products = GetUserProducts::run();

        return view('gerb.all', compact('products'));
    }

    public function product(Product $product, Request $request)
    {
        if ($request->user()->cannot('view', $product)) {
            abort(403);
        }

        return view('gerb.product', compact('product'));
    }

    public function create()
    {
        return view('gerb.create');
    }

    public function update(Request $request)
    {
        UpdateProduct::run($request->all());

        return redirect()->action([GerbController::class, 'all']);
    }

    public function delete(Request $request)
    {
        DestroyProduct::run($request);

        return redirect()->action([GerbController::class, 'all']);
    }

    public function store(ProductData $productData)
    {
        CreateNewProduct::run($productData->toArray());

        return redirect('/all');
    }

    public function edit(Product $product, Request $request)
    {
        if ($request->user()->cannot('view', $product)) {
            abort(403);
        }

        return view('gerb.edit', compact('product'));
    }
}
