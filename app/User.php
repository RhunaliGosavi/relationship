<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Address;
use App\Post;
use App\Project;
use App\Task;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','country','project_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
//One to one relation ship
    public function address()
    {
       return $this->hasOne(Address::class,'user_id','id');
    }

    public function addressess(){

        return $this->hasMany(Address::class,'user_id','id');
    }

    public function posts(){

        return $this->hasMany(Post::class,'user_id','id');
    }

    public function project(){

          return $this->belongsTo(Project::class);

    }

    public function tasks(){

        return $this->hasMany(Task::class);
    }
}
