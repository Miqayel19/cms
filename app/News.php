<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = [

        'header','image','description','summary','user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id','id');
    }
}

