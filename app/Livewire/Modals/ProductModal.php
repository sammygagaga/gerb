<?php

namespace App\Livewire\Modals;

use App\Actions\DestroyProduct;
use App\Models\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Attributes\Locked;
use LivewireUI\Modal\ModalComponent;

class ProductModal extends ModalComponent
{
    use AuthorizesRequests;

    #[Locked]
    public Product $product;

    public function mount(Product $product): void
    {
        $this->product = $product;
    }

    public function delete()
    {
        $this->authorize('view', $this->product);

        DestroyProduct::run($this->product->id);

        session()->flash('status', 'Продукт удален!');

        return $this->redirect('/wire/all', navigate: true);
    }

    public function render()
    {
        return view('livewire.modals.product-modal');
    }

}
