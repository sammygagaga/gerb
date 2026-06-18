<!-- Карточка юзера -->
<div class="bg-white rounded-1xl shadow-xl overflow-hidden">

    <div class="flex flex-col md:flex-row">

        <div class="md:w-3/5 p-8 md:p-10 flex flex-col justify-center">

            <!-- Заголовок и категория (если не на фото) -->
            <div class="mb-6">

                <!-- Дублируем категорию текстом для ясности, или оставляем только бейдж на фото -->
                <div class="mt-3">
                    <span class="text-[#00A651] font-semibold text-sm uppercase tracking-wide">Подтвержден</span>
                </div>

                @if($edit)
                    <input wire:model="form.name" class="text-2xl font-bold text-[#2C2D33] mb-2 leading-tight" placeholder="{{ $user->name }}">
                @else
                    <h1 class="text-2xl font-bold text-[#2C2D33] mb-2 leading-tight">
                        {{ $user->name }}
                    </h1>
                @endif


                <!-- какое нить глупое описание пользователя приколдес -->
{{--                <div class="mb-6">--}}
{{--                    <p class="text-[#2C2D33] text-lg leading-relaxed">--}}
{{--                        {{ $product->comment ?? 'Здесь должно быть подробное описание продукта, его свойства и влияние на пищеварение.' }}--}}
{{--                    </p>--}}
{{--                </div>--}}

                <!-- Email и пароль -->
                <div class="mt-4 space-y-2">

                    <div class="flex items-center gap-2 text-gray-500">

                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>

                        @if($edit)
                            <input wire:model="form.email" type="email" class="text-sm md:text-base bg-gray-50 border border-gray-300 rounded-lg px-3 py-1.5 focus:outline-none focus:ring-2 focus:ring-[#00A651] focus:border-transparent w-full max-w-xs transition">
                        @else
                            <span class="text-sm md:text-base">{{ $user->email ?? 'user@example.com' }}</span>
                        @endif

                    </div>

                    <div class="flex items-center gap-2 text-gray-500">

                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>

                        @if($edit)
                            <input wire:model="form.password" type="password" placeholder="Новый пароль" class="text-sm md:text-base bg-gray-50 border border-gray-300 rounded-lg px-3 py-1.5 focus:outline-none focus:ring-2 focus:ring-[#00A651] focus:border-transparent w-full max-w-xs transition">
                        @else
                            <span class="text-sm md:text-base">••••••••</span>
                        @endif

                    </div>
                    @error('form.password')
                    <p class="text-[#2C2D33] text-lg leading-relaxed">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

            </div>

            <!-- Кнопки действий (опционально) -->
            <div class="mt-8 flex gap-4">

                @if($edit)

                    <button wire:click="save" wire:click="$refresh" type="submit" wire:loading.attr="disabled"
                            class="bg-[#00A651] hover:bg-[#008a43] text-white font-semibold py-3 px-6 rounded-xl shadow-md transition transform hover:-translate-y-0.5">
                        <span wire:loading.remove>Сохранить</span>
                        <span wire:loading class="animate-spin">⟳</span>
                    </button>

                    <button wire:click="cancel"
                            class="px-6 py-3 border border-gray-300 text-gray-600 font-semibold rounded-xl hover:bg-gray-50 transition transform hover:-translate-y-0.5">
                        Отмена
                    </button>

                @else

                    <button wire:click="isEdit"
                            class="bg-[#00A651] hover:bg-[#008a43] text-white font-semibold py-3 px-6 rounded-xl shadow-md transition transform hover:-translate-y-0.5">
                        Редактировать
                    </button>

                    <form wire:submit="delete" wire:confirm="Вы действительно хотите удалить свой профиль?">
                        <button type="submit"
                                class="px-6 py-3 border border-gray-300 text-gray-600 font-semibold rounded-xl hover:bg-gray-50 transition transform hover:-translate-y-0.5">
                            Удалить
                        </button>
                    </form>

                @endif

            </div>
        </div>

        <!-- Секция с аватаркой -->
        <div class="md:w-2/5 p-8 md:p-10 flex items-center justify-center pl-12">

            <div class="relative mr-10">

{{--                @if()--}}
{{--                    <img src="{{ $user->avatar }}"--}}
{{--                         alt="{{ $user->name }}"--}}
{{--                         class="w-48 h-48 md:w-64 md:h-64 object-cover rounded-full shadow-lg">--}}
{{--                @else--}}
                    <div class="w-48 h-48 md:w-64 md:h-64 bg-gray-300 rounded-full shadow-lg flex items-center justify-center">
                        <span class="text-6xl md:text-7xl font-bold text-gray-500">
                            {{ strtoupper(substr($user->name ?? 'U', 0, 1)) }}
                        </span>
                    </div>
{{--                @endif--}}

            </div>
        </div>

    </div>
</div>
