<?php

namespace App;
use App\Micropost;

use Illuminate\Database\Eloquent\Model;

class Micropost extends Model
{
    /**
    * 投稿データを所有するユーザを取得
    */
   public function user()
   {
     return $this->belongsTo('App\User');
   }

   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
     'user_id',
     'content',
   ];

   public static function getAll(){
     $microposts = Micropost::all()->sortByDesc('id');
     return $microposts;
   }
}
