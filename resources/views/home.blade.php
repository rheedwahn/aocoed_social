@extends('templates.default') 

@section('content')
	<center>
	    <p>Bringing social media to the next level</p>
	</center>

	<marquee> <h3>Welcome, this platform allows you as a student of aocoed to meet one another be it your course mate, student from other department and many more, of course you can interact with one another via a posts or status from one of the two party (Student) and comment...enjoy this little functionalities as we always hope to improve more on this...Copyright Marvellous Era. (2016/2017). </h3></marquee>
	<br> <br> <br> <br> <br> <br><br> <br> <br>
	<div class="row">
	    <div class="col-lg-4 col-lg-offset-5 col-xs-4 col-xs-offset-4">
	        <a href="{{url('/signup')}}" class="btn btn-success">
	            Get Started!
	        </a>
	    </div>
	</div>
	
@stop