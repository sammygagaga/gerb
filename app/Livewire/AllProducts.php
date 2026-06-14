<?php

namespace App\Livewire;

use App\Actions\GetUserProducts;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Component;

class AllProducts extends Component
{
    public int $userID = 0;

    public function mount(): void
    {
        $this->userID = auth()->id();
    }

    #[Computed]
    public function products()
    {
        return GetUserProducts::run($this->userID);
    }

    public function render()
    {
        $products = $this->products;

        return view('livewire.product.all-products', compact('products'));
    }

}
