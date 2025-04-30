<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleInput extends Component
{
    use WithFileUploads;

    protected $listeners =[
        'create' => 'create',
        'editArticle' => 'edit',
        'destroy' => 'destroy',
        'closeModal' => 'resetStart',
    ];

    protected $rules = [
        'article.title' => ['required'],
        'article.content' => ['required'],
        'image' => ['nullable', 'image', 'max:2048']
    ];

    public Article $article;
    public ?\Livewire\TemporaryUploadedFile $image = null;
    public bool $isEditing = false;

    public function mount(Article $article){
        $this->article = $article;
    }

    public function render()
    {
        return view('livewire.article-input');
    }

    public function create(){
        $this->article = new Article();
        $this->image = null;
        $this->isEditing = false;
    }

    public function edit(int $articleId){
        $this->article = Article::findOrFail($articleId);
        $this->image = null;
        $this->isEditing = true;
        $this->dispatch('openModal');
    }

    public function save(){
        $this->validate();

        if($this->image){
            // 古い画像があれば削除
            if($this->article->image_path){
                Storage::delete(str_replace('storage', 'public', $this->article->image_path));
            }
            $filename = Str::random(10) .'.'.$this->image->getClientOriginalExtension();
            $this->article->image_path = $this->image->storeAs('public/img/articles', $filename);
            $this->article->image_path = str_replace('public/','storage/',$this->article->image_path);
        }

        $this->article->save();
        session()->flash('status', '保存が完了しました。');
        $this->dispatch('refresh');
        $this->resetState();
        $this->dispatch('closeModal');
    }

    public function resetState(){
        $this->article = new Article();
        $this->image = null;
        $this->isEditing = false;
    }
}
