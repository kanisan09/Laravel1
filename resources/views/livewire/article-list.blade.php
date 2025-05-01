<div>

    @if ($message)
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ $message }}</span>
        </div>
    @endif

    @if ($error)
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <span>{{ $error }}</span>
        </div>
    @endif

    <table class="w-full text-sm mb-5">
        <thead>
            <tr>
                <th class="border p-2">タイトル</th>
                <th class="border p-2">本文</th>
                <th class="border p-2">画像</th>
                <th class="border p-2">操作</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($articles as $article)
                <tr>
                    <td class="border px-2 py-1">{{ $article->title }}</td>
                    <td class="border px-2 py-1">{{ Str::limit($article->content, 100) }}</td>
                    <td class="border px-2 py-1">
                        @if ($article->image_path)
                            <img src="{{ asset($article->image_path) }}" alt="{{ $article->title }}"
                                style="max-width: 50px; max-height: 50px;">
                        @else
                            <span>画像なし</span>
                        @endif
                    </td>
                    <td class="border px-2 py-1 text-right">
                        <button type="button" class="bg-yellow-500 text-yellow-50 rounded p-2 text-xs"
                            wire:click="editArticle({{ $article->id }})">
                            編集
                        </button>
                        <button type="button" class="bg-red-600 text-red-50 rounded p-2 mx-3 text-xs"
                            wire:click="confirmDelete({{ $article->id }})">
                            削除
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $articles->links() }}


    <script>
        window.addEventListener('show-delete-confirmation', event => {
            if (confirm('削除します。よろしいですか？')) {
                Livewire.dispatch('deleteConfirmed');
            }
        });
        
    </script>

    @if ($showEditModal)
        @livewire('article-input', ['article' => $editingArticleId ? \App\Models\Article::find($editingArticleId) : new \App\Models\Article()], key('article-input-' . $editingArticleId))
    @endif
</div>
