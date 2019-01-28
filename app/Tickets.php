<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    protected $table = 'tickets';

    protected $fillable = [

        'title','summary'
    ];
    public function support()
    {
        return $this->hasMany('App\Support', 'ticket_id');
    }
}
