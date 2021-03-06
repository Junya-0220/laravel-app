<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email', 
        'password',
        'admin_flg', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function microposts()
   {
     return $this->hasMany('App\Micropost');
   }

   public function userSave($params){
       $isRegist = $this->fill($params)->save();
       return $isRegist;
   }

   protected static function boot() 
   {
       parent::boot();
       static::deleting(function($model) {
           foreach ($model->microposts()->get() as $child) {
               $child->delete();
           }
       });
   }
}
