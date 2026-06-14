<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Support\Collection;
use Lorisleiva\Actions\Concerns\AsAction;

class GetUserProducts
{
    use AsAction;

    public function handle($userID)
    {
        return $this->getProducts($userID);
    }

    private function getProducts($userID): Collection
    {
        return User::find($userID)->products;
    }
}
