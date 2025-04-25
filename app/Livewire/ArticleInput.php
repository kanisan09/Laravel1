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

    protected $listteners =[
        'create' => 'create',
        'editArticle' => 'edit'
    ];

    protected $rules = [
        'article.title' => ['required'],
        'article.content' => ['required'],
        'image' => ['nullable', 'image', 'max:2048']
    ];

    public $article;
    public $image;

    public function render()
    {
        return view('livewire.article-input');
    }

    public function mouth(){
        $this->center();
    }

    public function create(){
        $this->article = new Article();
        $this->image = null;
    }

    public function edit(Article $article){
        $this->article = $article;
        $this->image = null;
    }

    public function save(){
        $this->validate();

        if($this->image){
            $filename = Str::random(10) .'.'.$this->image->getClientOriginalExtension();
            $this->article->image_path = $this->image->storeAs('public/img/articles', $filename);
            $this->article->image_path = str_replace('public/','storage/',$this->article->image_path);
        }

        $this->article->save();
        session()->flash('status', '保存が完了しました。');
        $this->dispatch('refresh');
        $this->create();
    }
}
