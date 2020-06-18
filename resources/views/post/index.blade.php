<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
{{--	************one to many*************************
   @foreach ($posts as $post)
   	<h2>{{optional($post->user)->name}}</h2>
   	<p>{{$post->title}}</p>
  @endforeach--}}

  {{-- ************one to many reverse*************************
  @foreach ($userPosts as $post)
   	<h2>{{optional($post)->name}}</h2>

	   	 @foreach ($post->posts as $post)
		   <p>{{$post->title}}</p>
	  	 @endforeach
   
 @endforeach--}}



@foreach ($posts as $post)
      <h2>{{optional($post->user)->name}}</h2>
      <p>{{$post->title}}</p>
      <ul>
        @foreach ($post->tags as $tag)
           <li>{{$tag->name}}</li>
        @endforeach
      </ul>
 @endforeach

 


</body>
</html>
