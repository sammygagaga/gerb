<?php

namespace App\Actions;

use App\Data\ProductData;
use App\Models\Product;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateNewProduct
{
    use AsAction;

    public function handle(ProductData $data)
    {
        return $this->createProduct($data);
    }

    private function createProduct(ProductData $data): Product
    {
        $product = new Product;

        $product->title = $data->product_name;
        $product->allowed = $data->allowed;
        $product->comment = $data->comment;
        $product->user_id = auth()->id();

        $product->save();

        return $product;
    }
}
