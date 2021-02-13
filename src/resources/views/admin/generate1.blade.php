@extends("master2")
@section("generate")

<ul class="left" >
  <li><a href="{{route('ahome')}}" class="active" style="font-weight: bold;color: green;font-family: Helvetica, Arial, sans-serif">Home</a></li>

  <li><a href="{{route('adminhome')}}" style="font-weight: bold;color: green;font-family: Helvetica, Arial, sans-serif">Class</a></li>
  <li><a href="{{route('subject')}}" style="font-weight: bold;color: green;font-family: Helvetica, Arial, sans-serif">Subject</a></li> 

  <li><a href="{{route('teacher')}}" style="font-weight: bold;color: green;font-family: Helvetica, Arial, sans-serif">Teacher</a></li>

  <li><a href="{{route('generate')}}" style="font-weight: bold;color: green;font-family: Helvetica, Arial, sans-serif">Generate</a></li>
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
	width: 250px;
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
	<div style="float: left;border: 1px solid green;margin-left: 5px;margin-top: 20px;">
	<div class="navbar navbar-inner block-header" style="color: green;">
        <div class="muted pull-left" id="classheading">General Informations</div>
    </div>
	<form action="{{route('generate_paper2')}}" method="post">
		{{ csrf_field() }}
		<table class="table">
			<tr>
				<td>School</td>
				<td>{{$school}} <input  required="" type="hidden" value="{{$school}}" name="school"  style="width: 400px;height: 30px"></td>
			</tr>
			<tr>
				<td>
					Exam
				</td>
				<td>
					{{$exam}}
					<input required="" type="hidden" value="{{$exam}}" name="exam" style="width: 400px;height: 30px">
				</td>
			</tr>
			<tr>
				<td>
					Time
				</td>
				<td>
					{{$time}}<input required="" type="hidden" value="{{$time}}" name="time" style="width: 100px;height: 30px">
				</td>
			</tr>
			<tr>
				<td>
					Class
				</td>
				<td>
					{{$class_name}}
					<input required="" type="hidden" value="{{$class_name}}" name="class" style="width: 100px;height: 30px">
				</td>
			</tr>
			<tr>
				<td>
					Subject
				</td>
				<td>
					{{$subject_name}}
					<input required="" type="hidden" value="{{$subject_name}}" name="subject" style="width: 100px;height: 30px">
				</td>
			</tr>
				<td>
					Chapter
				</td>
				<td>
			@foreach ($chapter_name as $key => $value) 
				<input type="hidden" value="{{$value}}" name="chapters[]">{{$value}},
				<br>
			@endforeach
				</td>
			</tr>
		</table>
		 <div class="container control-group">
		<hr>
		<div class="question_table"">
			<div class="muted pull-left" id="classheading">Questions Details</div>
		<hr>
		<table  class="table " required="" >
        	<tr>
        		<td>Question Type</td>
        		<td>Number Of Questions</td>
        		<td>Marks Per Question</td>
        	</tr>
        	<tr>
        		<td>Fill in the blanks</td>
        		<td><input class="max"  type="number" name="fitb" class="fithb" min="0" value="0" max="{{$fil}}" style="width: 100px;height: 30px"></td>
        		<td><input type="number" name="fitb_marks" class="fitb_marks"  min="0" value="0" style="width: 100px;height: 30px"></td>
        	</tr>
        	<tr>
        		<td>Multiple Choices</td>
        		<td><input class="max" type="number" name="mcqs" class="mcqs" min="0" max="{{$mq}}" value="0" style="width: 100px;height: 30px"></td>
        		<td><input type="number" name="mcqs_marks" class="mcqs_marks"  min="0" value="0" style="width: 100px;height: 30px"></td>
        	</tr>
        	<tr>
        		<td>Long Questions</td>
        		<td><input class="max" type="number" name="long" class="long"  min="0" max="{{$lq}}" value="0" style="width: 100px;height: 30px"></td>
        		<td><input type="number" name="long_marks" class="long_marks"  min="0" value="0" style="width: 100px;height: 30px"></td>
        	</tr>
        	<tr>
        		<td>Short Questions</td>
        		<td><input class="max" type="number" name="short" class="short" min="0" max="{{$sq}}" value="0" style="width: 100px;height: 30px"></td>
        		<td><input type="number" name="short_marks" class="short_marks"  min="0" value="0" style="width: 100px;height: 30px"></td>
        	</tr>
        	<tr>
        		<td>True/false</td>
        		<td><input class="max" type="number" name="tf"  min="0" class="tf" max="{{$tf}}" value="0" style="width: 100px;height: 30px"></td>
        		<td><input type="number" name="tf_marks" class="tf" min="0" value="0" style="width: 100px;height: 30px"></td>
        	</tr>
        </table>
		</div>
		
        </div>
       
        <hr>
        <div class="control-group">
          <div class="controls" align="center">
				<button data-placement="right" title="Click to Generate" id="generate" name="generate" class="btn btn-success">Generate</button>
          </div>
        </div>
	</form>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
@endsection