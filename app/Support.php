<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    protected $table='support';

    protected $fillable = [
        'theme'
    ];

    public function tickets()
    {
        return $this->hasMany('App\Tickets','support_id');
    }
}
