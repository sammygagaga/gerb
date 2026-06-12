<?php

use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


new class extends Component
{
    public function logout()
    {
        Auth::logout();

        session()->invalidate();
        session()->regenerateToken();

        return redirect('/wire/all');
    }
};
?>

<nav class="relative bg-white-800">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
            <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex shrink-0 items-center">
                    {{--                        <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company" class="h-8 w-auto" />--}}
                </div>
            </div>

            <div class="flex space-x-4">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-white/5 hover:text-white" -->
                <p class="rounded-md px-3 py-2 text-sm font-medium text-green">{{ auth()->user()->name }}</p>
                <button wire:navigate wire:click="logout"
                   class="rounded-md bg-red-500 hover:bg-red-600 px-3 py-2 text-sm font-medium text-white">Выйти
                </button>
            </div>
        </div>
    </div>
</nav>

