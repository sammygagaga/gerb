<?php

namespace App\Livewire\Modals;


use App\Actions\CreateNewProduct;
use App\Data\ProductData;
use LivewireUI\Modal\ModalComponent;

class CreateProduct extends ModalComponent
{
    public ProductData $form;

    public function mount(): void
    {
        $this->form = new ProductData();
    }

    public function save()
    {
        CreateNewProduct::run(ProductData::validateAndCreate($this->form->toArray()));
        session()->flash('status', 'Продукт добавлен!');

        return $this->redirect('/wire/all', navigate: true);
    }

    public function render()
    {
        return view('livewire.modals.create-product');
    }


}
