<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
</head>
<body>

       @foreach($tags  as $tag)
          <h1>{{$tag->name}}</h1>

          @foreach($tag->posts  as $post)
               <p>{{$post->title}}</p>
            
           @endforeach  

       @endforeach  
 </body>
</html>