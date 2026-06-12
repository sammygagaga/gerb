<div class="flex justify-center mb-10">

    <button wire:click="$dispatch('openModal', {component: 'modals.create-product'})"
            class="bg-green-600 hover:bg-green-700 text-white font-semibold py-4 px-8 rounded-full shadow-lg transform hover:scale-105 transition duration-300 flex items-center">

        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
        </svg>

        Добавить продукт

    </button>

</div>
