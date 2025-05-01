<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class ArticleList extends Component
{
    use WithPagination;

    public ?int $articleIdToDelete = null;
    public ?string $message = null;
    public ?string $error = null;
    public $editingArticleId;
    public bool $showEditModal = false;

    protected $listeners = ['deleteConfirmed','editArticle','closeModal'];

    public function render()
    {
        $articles = Article::latest()->paginate(10);
        return view('livewire.article-list', ['articles' => $articles]);
    }

    public function confirmDelete(int $articleId)
    {
        $this->articleIdToDelete = $articleId;
        // JavaScriptで確認ダイアログを表示するイベントを発行
        $this->dispatch('show-delete-confirmation');
    }

    public function deleteConfirmed()
    {
        if ($this->articleIdToDelete) {
            $articleToDelete = Article::find($this->articleIdToDelete);
            if ($articleToDelete) {
                $deletedTitle = $articleToDelete->title;
                $articleToDelete->delete();
                $this->message = '「' . $deletedTitle . '」を削除しました！╭( ･ㅂ･)و ̑̑ ｸﾞｯ ';
                $this->error = null;
            } else {
                $this->error = '削除に失敗しました。記事が見つかりません。';
                $this->message = null;
            }
            $this->articleIdToDelete = null; // リセット
        }
    }

    public function editArticle(int $articleId){
        $this->editingArticleId = $articleId;
        $this->showEditModal = true;
    }

    public function closeModal(){
        $this->showEditModal = false;
        $this->editingArticleId = null;
    }
}