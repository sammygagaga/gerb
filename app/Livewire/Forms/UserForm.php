<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class UserForm extends Form
{
    #[Validate('required|min:3|max:255|email')]
    public $email = '';

    #[Validate('required|min:5|max:160')]
    public $password = '';
    #[Validate('required|min:3|max:160|string')]
    public $user_name = '';

}
