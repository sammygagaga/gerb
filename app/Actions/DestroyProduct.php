<?php

namespace App\Actions;

use App\Models\Product;
use Lorisleiva\Actions\Concerns\AsAction;

class DestroyProduct
{
    use AsAction;

    public function handle($productId)
    {
        $this->deleteProduct($productId);
    }

    private function deleteProduct($productId):void
    {
        Product::destroy($productId);
    }

}
