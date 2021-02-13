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
	<div style="float: left;border: 2px solid green;margin-left: 5px;margin-top: 20px;">
	<div class="navbar navbar-inner block-header" style="color: green;">
        <div class="muted pull-center" style="align-content: center; text-align: center;" id="classheading">General Informations</div>
    </div>
	<form action="{{route('generate_paper1')}}" method="post">
		{{ csrf_field() }}
		 <div class="container control-group">
		<table class="table">
				<tr> 
					<td>
						School
					</td>
					<td>
						<input required="" type="text" name="school"  style="width: 400px;height: 30px">
					</td>
				</tr>
				<tr> 
					<td>
						Exam Title
					</td>
					<td>
						<input required="" type="text" name="exam" style="width: 400px;height: 30px">
					</td>
				</tr>
				<tr> 
					<td>
						Time
					</td>
					<td>
						<input required="" type="text" name="time" style="width: 100px;height: 30px">
					</td>
				</tr>
		</table>
		<hr>
		<div class="muted pull-center" style="align-content: center; text-align: center;" id="classheading">Subject Details</div>
		<hr>
		<table class="table">
			<tr>
				<td> <label>Select Class</label></td>
				<td> 
					<select required="" name="class" class="class" id="class_id" style="height: 40px">
						<option disabled="" selected="">select class</option>
						@foreach($class as $class)
							<option value="{{$class->name}}">{{$class->name}}</option>
						@endforeach
					</select>
				</td>
			</tr>
			<tr>
				<td>Select Subject</td>
				<td> 
					<select required="" name="subject" class="subject" style="height: 40px">
						<option value="0" selected disabled>Choose Subject</option>
						<div class="subject">
						</div>
					</select>

				</td>
			</tr>
			<tr>
				<td>  
					<label>Select Chapters</label>
				</td>
				<td >
					<div class="chapters"></div>
				 </td>
			</tr>
		</table>
		<hr>
        <hr>
        <div class="control-group">
          <div class="controls" align="center">
				<button data-placement="right" title="Click to Generate" id="generate" name="generate" class="btn btn-success">Next</button>
          </div>
        </div>
	</form>
</div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('change','.class',function(){
			//console.log("it is change");
			var class_id=$(this).val();
			var op=" ";
			var div=$('.subject').parent();
			//console.log(id);
			$.ajax({
				type:'get',
				url:'{!!URL::to('findsubject')!!}',
				data:{'id':class_id},
				success:function(data){
					//console.log('success');
					//console.log(data);
					//console.log(data.length);
					op+='<option value="0" selected disabled>Choose Subject</option>';
					for(var i=0;i<data.length;i++)
					{
						op+='<option  value="'+data[i].name+'">'+data[i].name+'</option>';
					}
					div.find('.chapters').html(" ");
					div.find('.subject').html(" ");
					div.find('.subject').append(op);
				},
				error:function(){
					console.log('error');
				}
			});
		});

		$(document).on('change','.subject',function(){
			var subject_id=$(this).val();
			//console.log(subject_id);
			var op=" ";
			var div=$('.chapters').parent();
			$.ajax({
				type:'get',
				url:'{!!URL::to('findchapters')!!}',
				data:{'id':subject_id},
				success:function(data){
					for(var i=0;i<data.length;i++)
					{
						op+='<br><input type="checkbox" class="chap" value="'+data[i].name+'" name="chapters[]"> &nbsp;&nbsp;'+ data[i].name;
					}
					div.find('.chapters').html(" ");
					div.find('.chapters').append(op);
				},
				error:function(){
				}
			});
		});

});
</script>

@endsection