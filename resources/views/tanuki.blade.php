<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semiblod text-xl text-gray-800 leading-tight">
            {{ __('TNS -たぬき ネットワーク サービス -')}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <p class="text-lg font-bold mx-auto  ">
                {{ __('たぬき名')}}
            </p>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg display: flex; justify-content: center;">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200 flex mx-auto display: flex; justify-content: center; ">
                    <h3 class="text-lg font-bold mx-auto justify-center block text-center py-20">
                        {{ __('たたぬき（立たぬき：あまり立たないたぬき)')}}
                    </h3>
                    <p>
                        <img src="{{ asset('img/tanuki2.jpg') }}" alt="たぬき">
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
