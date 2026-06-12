<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class ProductForm extends Form
{
    #[Validate('required|min:1|string|max:255')]
    public $product_name = '';

    #[Validate('required')]
    public $allowed = '';

    #[Validate('nullable|string|max:1000')]
    public $comment = '';

}
