<?php

namespace App\Actions;

use App\Models\Product;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateNewProduct
{
    use AsAction;

    public function handle($data)
    {
        return $this->createProduct($data);
    }

    private function createProduct($data): Product
    {
        $product = new Product;

        $product->title = $data['product_name'];
        $product->allowed = boolval($data['allowed']);
        $product->comment = $data['comment'];
        $product->user_id = auth()->id();

        $product->save();

        return $product;
    }
}
