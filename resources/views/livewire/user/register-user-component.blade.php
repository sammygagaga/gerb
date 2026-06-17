<div class="container mx-auto px-4 py-8 max-w-2xl">

    <!-- Заголовок -->
    <header class="text-center mb-8">
        <h1 class="text-3xl font-bold text-[#2C2D33]">Регистрация пользователя</h1>
        <p class="text-gray-500 mt-2">Заполните информацию о себе</p>
    </header>

    <!-- Форма добавления -->
    <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">

        <form wire:submit="save" class="space-y-6">
            @csrf
            <!-- Имя пользователя -->
            <div>
                <label for="user_name" class="block text-sm font-semibold text-[#2C2D33] mb-2">
                    Имя
                </label>
                <input
                    type="text"
                    wire:model="form.user_name"
                    placeholder="Иван Иванов"
                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#00A651] focus:border-transparent transition text-[#2C2D33]"
                    required
                >
                @error('form.user_name')
                {{ $message }}
                @enderror
            </div>

            <!-- Пароль -->
            <div>
                <label for="password" class="block text-sm font-semibold text-[#2C2D33] mb-2">
                    Пароль <span class="text-gray-400 font-normal"></span>
                </label>
                <input
                    wire:model="form.password"
                    type="password"
                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#00A651] focus:border-transparent transition text-[#2C2D33] resize-none"
                    required
                >
                @error('form.password')
                {{ $message }}
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-semibold text-[#2C2D33] mb-2">
                    Email <span class="text-gray-400 font-normal"></span>
                </label>
                <input
                    wire:model="form.email"
                    placeholder="aboba@email.com"
                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#00A651] focus:border-transparent transition text-[#2C2D33] resize-none"
                    required
                >
                @error('form.email')
                {{ $message }}
                @enderror
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
                    Зарегистрироваться
                </button>
            </div>

        </form>
    </div>
</div>
