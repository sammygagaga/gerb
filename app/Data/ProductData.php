<?php

namespace App\Data;

use Livewire\Wireable;
use Spatie\LaravelData\Attributes\Validation\BooleanType;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Concerns\WireableData;
use Spatie\LaravelData\Data;


class ProductData extends Data implements Wireable
{
    use WireableData;
    public function __construct(

        #[Required]
        #[Max(255)]
        #[Min(5)]
        #[StringType]
        public string $product_name = '',

        #[Required]
        #[BooleanType]
        public bool $allowed = false,

        #[Nullable]
        #[StringType]
        #[Max(1000)]
        public ?string $comment = '',

    ) {}

    public static function messages(...$args): array
    {
        return [
            'product_name.min' => 'Название продукта обязательно для заполнения',
            'allowed.required' => 'Выборите категорию',
        ];
    }

}
