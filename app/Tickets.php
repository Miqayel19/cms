<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    protected $table = 'tickets';

    protected $fillable = [

        'title','summary'
    ];

//    public function user()
//    {
//        return $this->belongsTo('App\User', 'user_id','id');
//    }
}
