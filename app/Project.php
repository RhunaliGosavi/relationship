<?php

namespace App;
use App\User;
use App\Task;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    
      protected $guarded=[];

    public function users(){


    	return $this->hasMany(User::class);
    }

   public function tasks(){


    	return $this->hasManyThrough(Task::class,User::class,'project_id','user_id','id');
    }

     public function task(){


    	return $this->hasOneThrough(Task::class,User::class,'project_id','user_id','id');
    }

}
