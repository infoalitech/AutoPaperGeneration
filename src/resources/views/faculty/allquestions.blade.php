@extends("master2")
@section("allquestions")

<ul class="left" >
  <li><a href="{{route('fhome')}}" class="active" style="font-weight: bold;color: green;font-family: Helvetica, Arial, sans-serif">Home</a></li>
  <li><a href="{{route('facultyhome')}}" class="active" style="font-weight: bold;color: green;font-family: Helvetica, Arial, sans-serif">Subject</a></li>

  <li><a href="{{route('chapters')}}" style="font-weight: bold;color: green;font-family: Helvetica, Arial, sans-serif">Chapters</a></li>
  
  <li><a href="{{route('questions')}}" style="font-weight: bold;color: green;font-family: Helvetica, Arial, sans-serif">Questions</a></li> 


  <li><a href="{{route('showquestions')}}" style="font-weight: bold;color: green;font-family: Helvetica, Arial, sans-serif">View Questions</a></li>

  <li><a href="{{route('logout')}}" style="font-weight: bold;color: green;font-family: Helvetica, Arial, sans-serif">Log Out</a></li>

</ul>
</section>

</nav>
</div>
</div>
<style type="text/css">

.menu ul{
	list-style:none;
	color: white;
	margin: 0px;
}
.menu ul li{
	border: 1px solid white;
	height: 60px;
	text-align: center;
	line-height: 60px;
	margin-left: 0px;
}
.menu ul li a{
	text-decoration: none;
	display: block;
	font-size: 20px;
	color: white;
	font-weight: bold;
	font-family: Helvetica, Arial, sans-serif;
}	
.menu{
	margin-left: 10px;
	width: 250px;
	float: left;
	background-color: green;
	color:black;
	font-size: 100px;
	border: 1px solid green;
	margin-top: 20px;
}
#detail{
	float: left;
	width: 503px;
	margin-top: 20px;
	margin-left: 10px;
	border: 1px solid green;
}
#detail form label{
	margin-left: 10px;
}
#detail form input{
	margin-left: 10px;
	width: 220px;
	height: 30px;
}
#detail form select{
	margin-left: 10px;
	width: 220px;
	height: 30px;
}
#detail form button{
	float: right;
	margin-right: 20px;
	margin-bottom: 10px;
}
#classheading{
	font-size: 16px;margin-top: 10px;color: green;font-weight: bold;
}
#classdetail{
	margin-top: 20px;
	margin-left: 10px;
	float: left;
	width: 600px;
	border: 1px solid green;
}
#classlistheading{
	font-size: 16px;margin-top: 10px;color: green;font-weight: bold;
}
.active{
	background-color: #1c542d;
}
</style>
<div class="container">
<div class="row-fluid" id="detail">
    <!-- block -->
    <div class="block">
        <div class="navbar navbar-inner block-header" style="color: green;">
        	@if($type==0)
				<div class="muted pull-left" id="classheading">Fill in the blanks</div>
        	@endif
			@if($type==1)
            	<div class="muted pull-left" id="classheading">MCQ's</div>
        	@endif
			@if($type==2)
            	<div class="muted pull-left" id="classheading">Short Questions</div>
        	@endif
			@if($type==3)
            	<div class="muted pull-left" id="classheading">Long Questions</div>
        	@endif
			@if($type==4)
				<div class="muted pull-left" id="classheading">True or False</div>
			@endif
        </div>
        <div class="block-content collapse in">
            <table class=" table">
            	@php
            	$v=1
            	@endphp
				<tr><th colspan="2">Subject: {{$subject}}</th></tr>
				<tr><th colspan="2">Class: {{$class}}</th></tr>
				@if($subject=="Urdu")
					@foreach($questions as $question)
						<tr>
								<td style="text-align: right; align-content: right">
									{{$question->question}}
								</td>
								<td>{{$v}}</td>
							@if($type==1)
								<td>(a){{$question->option1}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									(b){{$question->option2}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									(c){{$question->option3}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									(d){{$question->option4}}
								</td>
							@endif
						
						</tr>
						@php
						$v++
						@endphp
					@endforeach
				@endif
				
					@foreach($questions as $question)
						<tr>
								<td>
									{{$v}}
								</td>
								<td>
										{{$question->question}}
								</td>
							@if($type==1)
								<td>(a){{$question->option1}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									(b){{$question->option2}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									(c){{$question->option3}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									(d){{$question->option4}}
								</td>
							@endif
						
						</tr>
						@php
						$v++
						@endphp
					@endforeach
				
			</table>
        </div>
    </div>
</div>
</div>
@endsection