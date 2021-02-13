@extends("master2")
@section("chapters")

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

	<div class="row-fluid" id="detail">
    <!-- block -->
    <div class="block">
        <div class="navbar navbar-inner block-header" style="color: green;">
            <div class="muted pull-left" id="classheading">Add Chapters</div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">
			<form action="{{route('savechapters')}}" method="post" id="">
				{{ csrf_field() }}

				<div class="control-group">
                      <div class="controls">
					  <label>Class</label>
					  <select required=""  name="class" placeholder = "class">
					  	<option></option>
							@foreach($class as $class)
								<option value ="{{$class->class_name}}">{{$class->class_name}}</option>
							@endforeach
						</select>
                        
                      </div>
                    </div>

				<div class="control-group">
                      <div class="controls">
					  <label>Subject</label>
					  <select required="" name="subject" placeholder = "subject">
					  	<option></option>
							@foreach($subject as $subject)
								<option value ="{{$subject->name}}">{{$subject->name}}</option>
							@endforeach
						</select>
                        
                      </div>
                    </div>


				<div class="control-group">
                      <div class="controls">
					  <label>Chapter Name</label>
                       <input required=""  class="input focused"  name="chapter_name" id="focusedInput" type="text" placeholder = "Chapter Name" required>
                      </div>
                    </div>
					
					<div class="control-group">
                      <div class="controls">
							<button data-placement="right" title="Click to Save" id="save" name="save" class="btn btn-success">Save</button>
                      </div>
                    </div>
            </form>
			</div>
        </div>
    </div>
    <!-- /block -->
</div>

<div class="row-fluid" id="classdetail">
	@foreach($classlist as $classlist)
	<div class="navbar navbar-inner block-header" style="width: 598px">
		<div class="muted pull-left" id="classlistheading">{{$classlist->class_name}}</div>
    </div>
    <div>
    <div class="block-content collapse in">
    	<div class="span12" style="margin-bottom: 0px">
    		<form action="{{route('savesubject')}}" method="post">
  				<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
  					<thead>
  						<tr>
  							<th>Subject</th>
							<th>Chapter</th>
							<!-- <th>Action</th> -->
							</tr>
					</thead>
					<tbody>
						@foreach($chapterlist as $chaplist)
						@if($classlist->class_name==$chaplist->class_name)
						<tr>
							<td>{{$chaplist->subject_name}}</td>
							<td>{{$chaplist->name}}</td>
						<!-- 	<td width="140">
								<a data-placement="left" title="Click to Edit" href="{{route('editsubject',['id'=>$chaplist->id])}}"  data-toggle="modal" class="btn btn-success btnedit">Edit</a>
								<a data-placement="left" title="Click to Delete" href=""  data-toggle="modal" class="btn btn-danger">Delete</a>	
							</td> -->
						</tr>
						@endif
						@endforeach
					</tbody>
				</table>
			</form>
		</div>
	</div>	
    @endforeach
</div>
</div>


@endsection

