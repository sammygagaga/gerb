<x-layout>

    <div class="container mx-auto px-4 py-8 max-w-4xl">

        <!-- Навигация -->
        <header class="mb-6">
           <x-header-close></x-header-close>
        </header>

        <!-- Карточка продукта -->
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">

            <div class="flex flex-col md:flex-row">

                <!-- Секция с фото (слева на десктопе, сверху на мобильном) -->
                <div class="md:w-2/5 h-64 md:h-auto relative bg-gray-100">
                    {{-- Заглушка фото --}}
                    <img src="https://images.unsplash.com/photo-1610832958506-aa56368176cf?q=80&w=2670&auto=format&fit=crop"
                         alt="{{ $product->title ?? 'Продукт' }}"
                         class="absolute inset-0 w-full h-full object-cover">

                    <!-- Бейдж категории поверх фото (опционально) -->
                    <div class="absolute top-4 left-4">
                        @if($product->allowed ?? true)
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-bold bg-[#00A651] text-white shadow-md">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                Можно
                            </span>
                        @else
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-bold bg-[#EB5757] text-white shadow-md">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                Нельзя
                            </span>
                        @endif
                    </div>
                </div>

                <!-- Контент (справа) -->
                <div class="md:w-3/5 p-8 md:p-10 flex flex-col justify-center">

                    <!-- Заголовок и категория (если не на фото) -->
                    <div class="mb-6">
                        <h1 class="text-3xl md:text-4xl font-bold text-[#2C2D33] mb-2 leading-tight">
                            {{ $product->title ?? 'Название продукта' }}
                        </h1>

                        <!-- Дублируем категорию текстом для ясности, если нужно, или оставляем только бейдж на фото -->
                        <div class="mt-3">
                            @if($product->allowed ?? true)
                                <span class="text-[#00A651] font-semibold text-sm uppercase tracking-wide">Разрешен при ГЭРБ</span>
                            @else
                                <span class="text-[#EB5757] font-semibold text-sm uppercase tracking-wide">Запрещен при ГЭРБ</span>
                            @endif
                        </div>
                    </div>

                    <!-- Описание -->
                    <div class="mb-6">
                        <h3 class="text-sm font-bold text-gray-400 uppercase tracking-wider mb-2">Описание</h3>
                        <p class="text-[#2C2D33] text-lg leading-relaxed">
                            {{ $product->comment ?? 'Здесь должно быть подробное описание продукта, его свойства и влияние на пищеварение.' }}
                        </p>
                    </div>

                    <!-- Кнопки действий (опционально) -->
                    <div class="mt-8 flex gap-4">

                            <form action="{{ route('products.edit', $product) }}">
                                <button class="bg-[#00A651] hover:bg-[#008a43] text-white font-semibold py-3 px-6 rounded-xl shadow-md transition transform hover:-translate-y-0.5">
                                    Редактировать
                                </button>
                            </form>

                            <form method="POST" action="{{ route('products.delete', ['id' => $product['id']]) }}">
                                @method('DELETE')
                                <button type="submit" class="px-6 py-3 border border-gray-300 text-gray-600 font-semibold rounded-xl hover:bg-gray-50 transition transform hover:-translate-y-0.5">
                                    Удалить
                                </button>
                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>
