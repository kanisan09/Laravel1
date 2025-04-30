<div>
    @if (session('status'))
        <div class="text-green-700 p-3 bg-green-300 rounded mb-3">
            {{ session('status') }}
        </div>
    @endif


    <form wire:submit.prevent="save">
        <div class="mb-3">
            <label>タイトル</label>
            <br>
            <input type="text" class="border w-full p-1" wire:model="article.title">
            @error('article.title')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label>本文</label>
            <br>
            <textarea rows="7" class="border w-full p-1" wire:model="article.content"></textarea>
            @error('article.content')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="image">画像</label>
            <br>
            <input type="file" wire:model.live="image" id="image" id="image" class="border w-full p-1">
            @error('image')
                <span class="text-red-500">{{ $message }}</span>
            @enderror

            @if ($image)
                <p class="mt-2">プレビュー：</p>
                <img src="{{ $image->temporaryUrl() }}" style="max-width: 200px">
            @elseif ($article->image_path)
                <p class="mt-2">現在の画像：</p>
                <img src="{{ asset($article->image_path) }}" style="max-width: 200px;">
            @endif
        </div>

        <div class="flex justify-end">
            <button type="button" class="bg-gray-300 text-gray-700 p-2 rounded mr-2" wire:click="$dispatch('closeModal')">キャンセル</button>
            @if ($article->exists)
                <button type="submit" class="bg-blue-700 text-blue-50 p-2 rounded">変更</button>
            @else
                <button type="submit" class="bg-purple-700 text-purple-50 p-2 rounded">登録</button>
            @endif
        </div>
    </form>
</div>
