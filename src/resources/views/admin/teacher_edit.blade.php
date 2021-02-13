@extends("master2")
@section("teacher")

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
	<div class="row-fluid" id="detail">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header" style="color: green;">
                                <div class="muted pull-left" id="classheading">Add Teacher</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form action="{{route('saveteacher')}}" method="post" id="">
									{{ csrf_field() }}
									<div class="control-group">
                                          <div class="controls">
										  <label>Teacher Name</label>
                                           <input class="input focused"  name="teacher_name" id="focusedInput" type="text" placeholder = "Teacher Name" required>
                                          </div>
                                        </div>

										<div class="control-group">
                                          <div class="controls">
										  <label>Designation</label>
										  <select name="designation" placeholder = "designation">
												<option></option>
												<option value ="Principal">Principal</option>
												<option value ="Vice Principal">Vice Principal</option>
												<option value ="General">General</option>
												<option value="Elementary">Elementary</option>
												<option value="Support">Support</option>
												
											</select>
                                            
                                          </div>
                                        </div>

										<div class="control-group">
                                          <div class="controls">
										  <label>Contact No</label>
                                           <input class="input focused"  name="contact_no" id="focusedInput" type="text" placeholder = "Contact No" required>
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
	<div class="navbar navbar-inner block-header" style="width: 598px">
		<div class="muted pull-left" id="classlistheading">Teacher List</div>
    </div>
    <div class="block-content collapse in">
    	<div class="span12" style="margin-bottom: 0px">
    		<form action="" method="post">
  				<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
  					<thead>
  						<tr>
  							<th>Teacher Name</th>
							<th>Designation</th>
							<th>Contact</th>
							<th>Action</th>
							</tr>
					</thead>
					<tbody>
						@foreach($teacher as $teacher)
						<tr>
							<td>{{$teacher->name}}</td>
							<td>{{$teacher->designation}}</td>
							<td>{{$teacher->contact}}</td>
							<td width="140">
								<a data-placement="left" title="Click to Edit" href="{{route('teacher')}}" data-toggle="modal" class="btn btn-success">Edit</a>
								<a data-placement="left" title="Click to Delete" href="{{route('teacher')}}"  data-toggle="modal" class="btn btn-danger">Delete</a>
							</td>
						</tr>
					</tbody>
					@endforeach
				</table>
			</form>
		</div>
	</div>
</div>
</div>


<!--input type="submit" class="btn btn-success" name=""!-->

@endsection