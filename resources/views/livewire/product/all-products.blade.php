<div>
    <livewire:user.user-profile ></livewire:user.user-profile>

{{--    @if(session('status'))--}}
{{--        --}}
{{--    @endif--}}

    <div class="container mx-auto px-4 py-8">

        <!-- Заголовок -->
        <header class="text-center mb-8">
            <h1 class="text-3xl font-bold text-[#2C2D33]">Дневник продуктов для ГЭРБ</h1>
        </header>

        <livewire:create-product-component></livewire:create-product-component>

        <!-- Основной контент с двумя колонками -->
        <livewire:product.columns-product :products="$products"></livewire:product.columns-product>

    </div>
</div>
