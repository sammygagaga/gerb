<x-layout>

    <div class="container mx-auto px-4 py-8">

        <!-- Заголовок -->
        <header class="text-center mb-8">
            <h1 class="text-3xl font-bold text-[#2C2D33]">Дневник продуктов для ГЭРБ</h1>
        </header>

        <!-- Центральная кнопка -->
        <div class="flex justify-center mb-10">
            <a href="{{ route('products.create') }}" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-4 px-8 rounded-full shadow-lg transform hover:scale-105 transition duration-300 flex items-center">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Добавить продукт
            </a>
        </div>

        <!-- Основной контент с двумя колонками -->
        <div class="flex flex-col md:flex-row gap-6">
           <x-product-columns :products="$products"></x-product-columns>
        </div>
    </div>

</x-layout>
