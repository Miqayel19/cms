<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'group';

    protected $fillable = [

        'name','fac_id'
    ];
    protected $hidden = [];

    public function faculty()
    {
        return $this->belongsTo('App\Faculty', 'fac_id','id');
    }


}
