<x-layout>

    <div class="container mx-auto px-4 py-8 max-w-2xl">

        <!-- Заголовок -->
        <header class="text-center mb-8">
            <x-header-close></x-header-close>
            <h1 class="text-3xl font-bold text-[#2C2D33]"> Редактирование продукта </h1>
        </header>

        <!-- Форма добавления -->
        <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">

            <form action="{{ route('products.update') }}" method="POST" class="space-y-6">

                <!-- ID -->
                <div>
                    <input
                        type="hidden"
                        id="id"
                        name="id"
                        value="{{ $product->id }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#00A651] focus:border-transparent transition text-[#2C2D33]"
                    >
                </div>

                <!-- Название продукта -->
                <div>
                    <label for="product_name" class="block text-sm font-semibold text-[#2C2D33] mb-2">
                        Название продукта
                    </label>
                    <input
                        type="text"
                        id="title"
                        name="title"
                        value="{{ old('title', $product->title) }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#00A651] focus:border-transparent transition text-[#2C2D33]"
                    >
                </div>

                <!-- Выбор категории (Можно/Нельзя) -->
                <div>
                    <label class="block text-sm font-semibold text-[#2C2D33] mb-3">
                        Категория продукта
                    </label>
                    <div class="bg-[#F2F3F7] p-1 rounded-xl flex">
                        <label class="flex-1 cursor-pointer">
                            <input type="radio" name="allowed" value="1" class="peer sr-only" {{ old('allowed', $product->allowed ?? 1) == 1 ? 'checked' : '' }}>
                            <div class="text-center py-3 rounded-lg peer-checked:bg-[#00A651] peer-checked:text-white text-gray-600 font-medium transition-all duration-300">
                                Можно употреблять
                            </div>
                        </label>
                        <label class="flex-1 cursor-pointer">
                            <input type="radio" name="allowed" value="0" class="peer sr-only" {{ old('allowed', $product->allowed ?? 1) == 0 ? 'checked' : '' }}>
                            <div class="text-center py-3 rounded-lg peer-checked:bg-[#EB5757] peer-checked:text-white text-gray-600 font-medium transition-all duration-300">
                                Нельзя употреблять
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Комментарий -->
                <div>
                    <label for="comment" class="block text-sm font-semibold text-[#2C2D33] mb-2">
                        Комментарий <span class="text-gray-400 font-normal">(необязательно)</span>
                    </label>
                    <textarea
                        id="comment"
                        name="comment"
                        rows="4"
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#00A651] focus:border-transparent transition text-[#2C2D33] resize-none"
                    > {{ old('comment', $product->comment) }} </textarea>
                </div>

                <!-- Кнопка добавления -->
                <div class="pt-4">
                    <button
                        type="submit"
                        class="w-full bg-[#00A651] hover:bg-[#008a43] text-white font-bold py-4 px-6 rounded-xl shadow-md transform hover:-translate-y-1 transition duration-300 flex items-center justify-center"
                    >
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Сохранить продукт
                    </button>
                </div>

            </form>
        </div>

    </div>

</x-layout>
