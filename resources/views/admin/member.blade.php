<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('member') }}
            {{-- {{  }} は変数展開 --}}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if (session('message'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                    role="alert">
                    <strong class="font-bold">できたァ！！！( ﾟ∀ﾟ)</strong>
                    <span class="block sm:inline">{{ session('message') }}</span>
                </div>
            @endif
            @livewire('member')
        </div>
    </div>
</x-app-layout>
