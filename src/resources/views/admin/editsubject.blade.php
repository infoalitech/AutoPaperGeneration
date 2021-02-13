@extends("master2")
@section("subject")


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
	<div class="row-fluid" id="classdetail">
	<div class="navbar navbar-inner block-header" style="width: 598px">
		<div class="muted pull-left" id="classlistheading">Subject List</div>
    </div>
    <div class="block-content collapse in">
    	<div class="span12" style="margin-bottom: 0px">
    		<form action="{{route('updatesubject')}}" method="post">
							{{ csrf_field() }}
  				<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
  					
  						<tr>
  							<td>Subject</td>
  							<td>
  								<input type="text" name="subject_name"  value="{{$subject->name}}" style="width: 220px;height: 30px">	
								<input type="text" name="id" value="{{$subject->id}}" 
								style="visibility: hidden; width: 0px; height: 0px;">
  							</td>
  						</tr>
  						 <tr>
  							<td>Class</td>
  							<td>
  								<select name="class_name" required="">
								  	<option value ="{{$subject->class_name}}">{{$subject->class_name}}</option>
								  	@foreach($class as $class)
										<option value ="{{$class->name}}">{{$class->name}}</option>
									@endforeach
								</select>
  							</td>
  						</tr>
  						<tr>
  							<td>Teacher</td>
  							<td>
  								<select name="teacher_name" required="">
									<option value ="{{$subject->teacher_name}}">{{$subject->teacher_name}}</option>
									@foreach($teacher as $teacher)
										<option value ="{{$teacher->name}}">{{$teacher->name}}</option>
									@endforeach
								</select>
  							</td>
  						</tr>

						<tr>
							<td width="140" colspan="2">
								<input type="submit" name="update" value="Update">
							</td>
						</tr>	

						</form>


						
					
					</tbody>
				</table>
			</form>
		</div>
	</div>
</div>
</div>

<!--input type="submit" class="btn btn-success" name=""!-->

@endsection