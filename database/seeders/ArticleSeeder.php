<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        for($i = 1; $i <= 50; $i++){

            Article::create([
                'title' => 'タイトル'. $i,
                'content' => "本文\n本文\n本文\n本文\n本文". $i,
                'image_path' => 'storage/image/dummy/image_'. $i % 5 . '.jpg',
            ]);
        }
    }
}
