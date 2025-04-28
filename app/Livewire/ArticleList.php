<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class ArticleList extends Component
{

    use WithPagination;

    protected $listeners = ['deleteArticle'];

    public function deleteArticle(array $data){
        $articleId = $data['articleId'];
        Article::destroy($articleId);
        session()->flash('status','記事を削除しました。');
        $this->dispatch('refresh');
    }

    public function render(){
        $articles = Article::latest()->paginate(10);
        return view('livewire.article-list',['articles'=>$articles]);
    }
}
