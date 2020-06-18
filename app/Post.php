<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Tag;
class Post extends Model
{
    
     protected $fillable=['user_id','title'];
    public function user()
    {
    	return $this->belongsTo(User::class,'user_id','id')->withdefault([
           'name'=>'Guest User'
    	]);
    }

    public function tags(){

        return $this->belongsToMany(Tag::class,'post_tag','post_id','tag_id')->withTimeStamps()->withPivot('status');

    }
}
