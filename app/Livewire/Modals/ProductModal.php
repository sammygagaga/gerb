<?php

namespace App\Livewire\Modals;

use App\Actions\DestroyProduct;
use App\Models\Product;
use Livewire\Attributes\Locked;
use LivewireUI\Modal\ModalComponent;

class ProductModal extends ModalComponent
{
    #[Locked]
    public Product $product;

    public function delete($id)
    {

        $data['id'] = $id;

        DestroyProduct::run($data);

        session()->flash('status', 'Продукт удален!');

        return $this->redirect('/wire/all', navigate: true);

    }

    public function render()
    {
        return view('livewire.modals.product-modal');
    }

}
