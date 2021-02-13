@extends("master2")
@section("showquestiondetails")

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
            <div class="muted pull-left" id="classheading">Show Questions</div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">
			<form action="{{route('showquestiondetails')}}" method="post" id="">
				{{ csrf_field() }}

				<div class="control-group">
                      <div class="controls">
					  <label>Type</label>
					  <select name="type" placeholder = "class">
					  	<option></option>
							<option value ="0">Fill in the blanks</option>
							<option value="1">MCQ's</option>
							<option value="4">True/False</option>
							<option value="2">Short Questions</option>
							<option value="3">Long Questions</option>
						</select>
                        
                      </div>
                    </div>

				<div class="control-group">
                      <div class="controls">
					  <label>Class</label>
					  <select name="class" placeholder = "class">
					  	<option></option>
							@foreach($class as $c_name)
								@if($c_name->class_name==$class_name)
									<option value ="{{$c_name->class_name}}" selected="" >{{$c_name->class_name}}</option>
								@endif
								@if($c_name->class_name!=$class_name)
									<option value ="{{$c_name->class_name}}" >{{$c_name->class_name}}</option>
								@endif
							@endforeach
						</select>
                        
                      </div>
                    </div>

				<div class="control-group">
                      <div class="controls">
					  <label>Subject</label>
					  <select name="subject" placeholder = "subject">
					  	<option></option>
							@foreach($subject as $s_name)
								@if($s_name->name==$subject_name)
									<option value ="{{$s_name->name}}" selected="">{{$s_name->name}}</option>
								@endif
								@if($s_name->name!=$subject_name)
									<option value ="{{$s_name->name}}">{{$s_name->name}}</option>
								@endif
							@endforeach
						</select>
                        
                      </div>
                    </div>
					
					<div class="control-group">
                      <div class="controls">
							<button data-placement="right" title="Click to Save" id="save" name="save" class="btn btn-success">Go</button>
                      </div>
                    </div>
            </form>
			</div>
        </div>
    </div>
    <!-- /block -->
</div>




@if($type==0)
<div class="row-fluid" id="detail">
    <!-- block -->
    <div class="block">
        <div class="navbar navbar-inner block-header" style="color: green;">
            <div class="muted pull-left" id="classheading">Fill in the blanks</div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">
			<form action="{{route('allquestions')}}" method="post" id="">
				{{ csrf_field() }}

				<input type="hidden" name="type" value="0">
				<input type="hidden" name="class_name" value="{{$class_name}}">
				<input type="hidden" name="subject_name" value="{{$subject_name}}">
				<div class="control-group">
                      <div class="controls">
					  <label>Chapters</label>
<!-- 					  <select required=""  name="chapters" placeholder = "chapters">
					  	<option></option>
						@foreach($chapters as $chap)
								<option value ="{{$chap->name}}">{{$chap->name}}</option>
						@endforeach
						</select> -->
						@foreach($chapters as $chap)
								<input type="checkbox" name="chapters" value="{{$chap->name}}"> {{$chap->name}}
						@endforeach
                        
                        
                      </div>
                    </div>

					<div class="control-group">
                      <div class="controls">
							<button data-placement="right" title="Click to Save" id="save" name="save" class="btn btn-success">Go</button>
                      </div>
                    </div>
            </form>
			</div>
        </div>
    </div>
    <!-- /block -->
</div>


@endif

@if($type==1)
<div class="row-fluid" id="detail">
    <!-- block -->
    <div class="block">
        <div class="navbar navbar-inner block-header" style="color: green;">
            <div class="muted pull-left" id="classheading">MCQ'S</div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">
			<form action="{{route('allquestions')}}" method="post" id="">
				{{ csrf_field() }}

				<input type="hidden" name="type" value="1">
				<input type="hidden" name="class_name" value="{{$class_name}}">
				<input type="hidden" name="subject_name" value="{{$subject_name}}">
				<div class="control-group">
                      <div class="controls">
					  <label>Chapters</label>
					  <select name="chapters" placeholder = "chapters">
					  	<option></option>
						@foreach($chapters as $chap)
								<option value ="{{$chap->name}}">{{$chap->name}}</option>
						@endforeach
						</select>
                        
                      </div>
                    </div>

					<div class="control-group">
                      <div class="controls">
							<button data-placement="right" title="Click to Save" id="save" name="save" class="btn btn-success">Go</button>
                      </div>
                    </div>
            </form>
			</div>
        </div>
    </div>
    <!-- /block -->
</div>


@endif

@if($type==2)
<div class="row-fluid" id="detail">
    <!-- block -->
    <div class="block">
        <div class="navbar navbar-inner block-header" style="color: green;">
            <div class="muted pull-left" id="classheading">Short Questions</div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">
			<form action="{{route('allquestions')}}" method="post" id="">
				{{ csrf_field() }}

				<input type="hidden" name="type" value="2">
				<input type="hidden" name="class_name" value="{{$class_name}}">
				<input type="hidden" name="subject_name" value="{{$subject_name}}">
				<div class="control-group">
                      <div class="controls">
					  <label>Chapters</label>
					  <select name="chapters" placeholder = "chapters">
					  	<option></option>
						@foreach($chapters as $chap)
								<option value ="{{$chap->name}}">{{$chap->name}}</option>
						@endforeach
						</select>
                        
                      </div>
                    </div>

					<div class="control-group">
                      <div class="controls">
							<button data-placement="right" title="Click to Save" id="save" name="save" class="btn btn-success">Go</button>
                      </div>
                    </div>
            </form>
			</div>
        </div>
    </div>
    <!-- /block -->
</div>


@endif

@if($type==3)
<div class="row-fluid" id="detail">
    <!-- block -->
    <div class="block">
        <div class="navbar navbar-inner block-header" style="color: green;">
            <div class="muted pull-left" id="classheading">Long Questions</div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">
			<form action="{{route('allquestions')}}" method="post" id="">
				{{ csrf_field() }}

				<input type="hidden" name="type" value="3">
				<input type="hidden" name="class_name" value="{{$class_name}}">
				<input type="hidden" name="subject_name" value="{{$subject_name}}">
				<div class="control-group">
                      <div class="controls">
					  <label>Chapters</label>
					  <select name="chapters" placeholder = "chapters">
					  	<option></option>
						@foreach($chapters as $chap)
								<option value ="{{$chap->name}}">{{$chap->name}}</option>
						@endforeach
						</select>
                        
                      </div>
                    </div>

					<div class="control-group">
                      <div class="controls">
							<button data-placement="right" title="Click to Save" id="save" name="save" class="btn btn-success">Go</button>
                      </div>
                    </div>
            </form>
			</div>
        </div>
    </div>
    <!-- /block -->
</div>


@endif

@if($type==4)
<div class="row-fluid" id="detail">
    <!-- block -->
    <div class="block">
        <div class="navbar navbar-inner block-header" style="color: green;">
            <div class="muted pull-left" id="classheading">True/False</div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">
			<form action="{{route('allquestions')}}" method="post" id="">
				{{ csrf_field() }}

				<input type="hidden" name="type" value="4">
				<input type="hidden" name="class_name" value="{{$class_name}}">
				<input type="hidden" name="subject_name" value="{{$subject_name}}">
				<div class="control-group">
                      <div class="controls">
					  <label>Chapters</label>
		<!-- 			  <select name="chapters" placeholder = "chapters">
					  	<option></option>
						@foreach($chapters as $chap)
								<option value ="{{$chap->name}}">{{$chap->name}}</option>
						@endforeach
						</select> -->
						@foreach($chapters as $chap)
								<input type="checkbox" name="chapters" value="{{$chap->name}}"> {{$chap->name}}
						@endforeach
                        
                      </div>
                    </div>

					<div class="control-group">
                      <div class="controls">
							<button data-placement="right" title="Click to Save" id="save" name="save" class="btn btn-success">Go</button>
                      </div>
                    </div>
            </form>
			</div>
        </div>
    </div>
    <!-- /block -->
</div>

</div>
@endif

@endsection

