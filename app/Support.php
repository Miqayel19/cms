<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    protected $table='support';

    protected $fillable = [

        'theme','ticket_id'
    ];

    public function tickets()
    {
        return $this->belongsTo('App\Tickets','ticket_id','id');
    }

}
