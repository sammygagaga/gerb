<div class="container mx-auto px-4 py-8 max-w-2xl">

    <!-- Форма входа -->
    <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
        <form wire:submit="save" class="space-y-6">
            @csrf
            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-semibold text-[#2C2D33] mb-2">
                    Email <span class="text-gray-400 font-normal"></span>
                </label>
                <input
                    wire:model.live="email"
                    placeholder="aboba@email.com"
                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#00A651] focus:border-transparent transition text-[#2C2D33] resize-none"
                    required
                >
                @error('email')
                {{ $message }}
                @enderror
            </div>

            <!-- Пароль -->
            <div>
                <label for="password" class="block text-sm font-semibold text-[#2C2D33] mb-2">
                    Пароль <span class="text-gray-400 font-normal"></span>
                </label>
                <input
                    wire:model.live="password"
                    type="password"
                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#00A651] focus:border-transparent transition text-[#2C2D33] resize-none"
                    required
                >
                @error('password')
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
                    Войти
                </button>
            </div>

            @error('user_not_found')
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4">
                {{ $message }}
            </div>
            @enderror

        </form>
    </div>

    <div class="text-center py-3">
        <a wire:navigate href="{{ route('register') }}" class="text-gray-600" >
            Зарегистрироваться
        </a>
    </div>

</div>


