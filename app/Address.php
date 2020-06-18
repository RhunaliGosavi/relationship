<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Address extends Model
{
    
protected $fillable=['user_id','country']; 
//One to one relation ship
  public function user($value='')
  {
    return $this->belongsTo(User::class,'user_id','id');
  }

}
