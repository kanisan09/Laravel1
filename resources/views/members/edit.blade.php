<x-app-layout>
    {{-- <x-slot name = "header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            (メンバー編集)
        </h2>
    </x-slot> --}}

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('members.update',$member->id) }}">
                @csrf
                @method('POST')

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">{{ __('名前') }}</label>
                    <input id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="name" value="{{ $member->name }}" required autofocus />
                </div>
                

                <div class="flex items-center justify-end mt-4">
                    <button class="ml-4">
                        {{ __('これで保存する') }}
                    </button>
                </div>
            </form>
            <div class="mt-4">
                <button onclick="window.history.back();" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                    {{ __('キャンセル') }}
                </button>
            </div>
        </div>
    </div>
</x-app-layout>