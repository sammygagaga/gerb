<x-layout>

    <div class="container mx-auto px-4 py-8 max-w-2xl">

        <!-- Заголовок -->
        <header class="text-center mb-8">
            <h1 class="text-3xl font-bold text-[#2C2D33]">Подтвердите ваш email</h1>
            <p class="text-gray-500 mt-2">Для продолжение, проверьте свою почту
                                            Если письмо не пришло - вы можете отправить его ещё раз</p>
        </header>

        @if(session('message'))
            {{session('message')}}
        @endif

        <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
            <form method="POST" action="{{ route('verification.send') }}" class="space-y-6">
                    <button
                        type="submit"
                        class="w-full bg-[#00A651] hover:bg-[#008a43] text-white font-bold py-4 px-6 rounded-xl shadow-md transform hover:-translate-y-1 transition duration-300 flex items-center justify-center"
                    >
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Отправить письмо повторно
                    </button>
            </form>
        </div>

    </div>

</x-layout>
