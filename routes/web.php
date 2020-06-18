<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/user',function(){


		/*\App\Address::create([
		'user_id'=>1,
		'country'=>'India'

		]);*/

      $users=\App\User::all();//One to one relation ship

	
      //One to one relation ship
      $address=\App\Address::with('user')->get();
      //One to many
      $addressess=\App\User::with('addressess')->get();

    
      return view('users.index',compact(['address','users','addressess']));//One to one relation ship


});


Route::get('/posts',function(){

  /* \App\Post::create([
      'user_id'=>1,
      'title'=>'post title 1',

   ]);


   \App\Post::create([
      'user_id'=>2,
      'title'=>'post title 2',

   ]);*/


 $posts=\App\Post::with('user')->get();

 //$userPosts=\App\User::has('posts','==',1)->with('posts')->get();
// $userPosts=\App\User::doesntHave('posts','==',1)->with('posts')->get();
 $userPosts=\App\User::whereHas('posts',function($query){

      $query->where('title','like','%title%');

 })->with('posts')->get();

 return view('post.index',compact(['posts','userPosts']));

});


Route::get('/postData',function(){

// $tag=\App\Tag::first();
 //$post=\App\Post::first();


	/*  \App\Tag::create([
         'name'=>'laravel'
     ]);*/
 $post=\App\Post::first();

// dd($post->tags->first()->pivot->status);
 //add additional field in pivot table , 1 is tag id
 /*$post->tags()->attach([
  1=>[
       'status'=>'approved'
  ]
 
 ]);*/

$posts=\App\Post::with(['user','tags'])->get();

return view('post.index',compact('posts'));

});

Route::get('/tags',function(){

	$tags=\App\Tag::with('posts')->get();

	return view('tags.index',compact('tags'));
});
Route::get('/projects',function(){

       $project=\App\Project::find(3);
return  $project->task;

	/*  $project=\App\Project::create([

         'title'=>'Project B'
	  ]);

	   $user1=\App\User::create([

         'name'=>'User 3',
         'email'=>'user3@example.com',
         'password'=>Hash::make('password'),
         'project_id'=>$project->id

	  ]);
	      $user2=\App\User::create([

         'name'=>'User 4',
         'email'=>'user4@example.com',
         'password'=>Hash::make('password'),
         'project_id'=>$project->id

	  ]);
	       $user5=\App\User::create([

         'name'=>'User 5',
         'email'=>'user5@example.com',
         'password'=>Hash::make('password'),
         'project_id'=>$project->id

	  ]);


	    $task1=\App\Task::create([
              'title'=>'task 4 for ptpject 2 by user 3',
              'user_id'=>$user1->id

	    ]);
	       $task11=\App\Task::create([
              'title'=>'task 7 for ptpject 2 by user 3',
              'user_id'=>$user1->id

	    ]);


	     $task2=\App\Task::create([
              'title'=>'task 5 for ptpject 2 by user 4',
              'user_id'=>$user2->id

	    ]);

	          $task3=\App\Task::create([
              'title'=>'task 6 for ptpject 2 by user 5',
              'user_id'=>$user5->id

	    ]);*/



});