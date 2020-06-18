<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

  <div>
***************one to one************
  	   @foreach ($users as $user)
  	  	<h2>{{$user->name}}</h2>
  	  	<p>{{$user->address->country}}</p>
  	   @endforeach
**********************************************
  	   @foreach ($address as $add)
  	  	<h2>{{$add->user->name}}</h2>
  	  	<p>{{$add->country}}</p>
  	   @endforeach

 ***************one to many******************
       @foreach ($addressess as $add)
  	  	<h2>{{$add->name}}</h2>
	  	  	 @foreach ($add->addressess as $country)
		  	  	<p>{{$country->country}}</p>
	  	     @endforeach
  	   @endforeach

  </div>
</body>
</html>