<?php

namespace App\Actions;

use App\Models\Product;
use Lorisleiva\Actions\Concerns\AsAction;

class DestroyProduct
{
    use AsAction;

    public function handle($data)
    {
        $this->deleteProduct($data);
    }

    private function deleteProduct($data):void
    {
        Product::destroy($data['id']);
    }

}
