<?php

namespace App;
Use App\User;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    
    protected $guarded=[];
    public function user(){
    	
    	return $this->belongsTo(User::class);
    }
}
