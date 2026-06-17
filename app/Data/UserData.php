<?php

namespace App\Data;


use Livewire\Wireable;
use Spatie\LaravelData\Attributes\Validation\Email;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Password;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Concerns\WireableData;
use Spatie\LaravelData\Data;

class UserData extends Data implements Wireable
{
    use WireableData;

    public function __construct(
        #[Required]
        #[Max(255)]
        #[Min(5)]
        #[Email]
        public string $email = '',

        #[Required]
        #[Max(255)]
        #[Min(3)]
        #[StringType]
        public string $name = '',

        #[Required]
        #[Password]
        #[Max(255)]
        #[Min(8)]
        public string $password = '',
    ) {}

    public static function messages(...$args): array
    {
        return [
            'email.required' => 'email is required',
            'email.min' => 'email is required',
            'user_name.required' => 'name is required',
            'user_name.min' => 'email is so lil',
            'password.required' => 'password is required',
        ];
    }
}
