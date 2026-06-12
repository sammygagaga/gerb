<?php

namespace App\Actions;

use App\Models\Product;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateProduct
{
    use AsAction;

    public function handle($data)
    {
        return $this->updateProduct($data);
    }

    private function updateProduct($data): Product
    {
        $product = Product::find($data['id']);
        $product->update($data);

        return $product;
    }

}
