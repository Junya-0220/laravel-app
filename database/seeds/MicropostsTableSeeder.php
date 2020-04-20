<?php

use Illuminate\Database\Seeder;
use App\Micropost;


class MicropostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $microposts =[
        [
            'user_id' => 1,
            'content' => 'これはテスト投稿です1'
        ],
        $microposts =[
            'user_id' => 1,
            'content' => 'これはテスト投稿です2'
        ],
        $microposts =[
            'user_id' => 2,
            'content' => 'これはテスト投稿です3'
        ],
    ];
    foreach($microposts as $micropost){
        Micropost::create($micropost);
    }
    }
}
