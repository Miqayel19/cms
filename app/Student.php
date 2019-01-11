<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
  protected $table = 'students';

  protected $fillable = [

      'name','surname','phone','email','fac_id','group_id'

  ];
  public function group(){

      return $this->belongsTo(Group::class, 'group_id','id');
  }

    public function faculty(){

        return $this->belongsTo(Faculty::class, 'fac_id','id');

    }
}
