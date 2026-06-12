<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Support\Collection;
use Lorisleiva\Actions\Concerns\AsAction;

class GetUserProducts
{
    use AsAction;

    public function handle()
    {
        return $this->getProducts();
    }

    private function getProducts(): Collection
    {
        return User::find(auth()->id())->products;
    }
}
