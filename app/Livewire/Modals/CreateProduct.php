<?php

namespace App\Livewire\Modals;


use App\Actions\CreateNewProduct;
use App\Livewire\Forms\ProductForm;
use LivewireUI\Modal\ModalComponent;

class CreateProduct extends ModalComponent
{
    public ProductForm $form;

    public function save()
    {
        $this->validate();

        $data = $this->form->only(['product_name', 'allowed', 'comment']);

        CreateNewProduct::run($data);

        session()->flash('status', 'Продукт добавлен!');

        return $this->redirect('/wire/all', navigate: true);
    }

    public function render()
    {
        return view('livewire.modals.create-product');
    }


}
