<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event; // モデルを使用するため追加

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // モデルを使ってデータを挿入
        Event::create([
            'title' => 'こども食堂での地域交流！配膳・片付けボランティア募集',
            'place' => '堀ノ内こども食堂',
            'start_time' => '11:00:00',
            'end_time' => '13:00:00',
            'reward' => 3000,
            'image_path' => '/images/events/sample1.jpg',
        ]);

        Event::create([
            'title' => '青空マーケット売り子ボランティア募集中！',
            'place' => '大阪城公園',
            'start_time' => '10:00:00',
            'end_time' => '12:00:00',
            'reward' => 1000,
            'image_path' => '/images/events/sample2.jpg',
        ]);

        Event::create([
            'title' => '手芸が得意な方！布おもちゃを作って保育園に届けよう',
            'place' => '自宅',
            'start_time' => '14:00:00',
            'end_time' => '16:00:00',
            'reward' => 1000,
            'image_path' => '/images/events/sample3.jpg',
        ]);
    }
}
