<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semiblod text-xl text-gray-800 leading-tight">
            {{ __('自己紹介')}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-bold">
                        {{ __('名前：甲斐詩織（1997.01.23~）')}}
                    </h3>
                    <p class="mt-4">
                        {{ __('スキル')}}
                    </p>
                    <p>{{ __(('◇laravel：まだまだ'))}}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
