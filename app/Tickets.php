<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    protected $table = 'tickets';

    protected $fillable = [

        'title','summary','support_id'
    ];

    public function support()
    {
        return $this->belongsTo('App\Support', 'support_id','id');
    }
}
