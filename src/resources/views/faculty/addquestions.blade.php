@extends("master2")
@section("addquestions")

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
	width: 500px;
	margin-top: 20px;
	margin-left: 10px;
	border: 1px solid green;
}
#det{
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
<dir class="container">
	<div class="row-fluid" id="det">
    <!-- block -->
     
    <div class="block">
        <div class="navbar navbar-inner block-header" style="color: green;">
            <div class="muted pull-left" id="classheading">Add Questions</div>
        </div>

        <div class="block-content collapse in">
            <div class="span12">
			<form action="{{route('addquestions')}}" method="post" id="">
				{{ csrf_field() }}

				<div class="control-group">
                      <div class="controls">
					  <label>Type</label>
					  <select name="type" placeholder = "class">
					  	<option>@if($type==0)
					  			fill in the blanks
					  			@endif
					  			@if($type==1)
					  			MCQ's
					  			@endif
					  			@if($type==2)
					  			Short Questions
					  			@endif
					  			@if($type==3)
					  			Long Questions
					  			@endif
					  			@if($type==4)
					  			True/False
					  			@endif
					  	</option>
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
					  	<option value="{{$class_name}}">{{$class_name}}</option>
							@foreach($class as $class)
								<option value ="{{$class->class_name}}">{{$class->class_name}}</option>
							@endforeach
						</select>
                        
                      </div>
                    </div>

				<div class="control-group">
                      <div class="controls">
					  <label>Subject</label>
					  <select name="subject" placeholder = "subject">
					  	<option value="{{$subject_name}}">{{$subject_name}}</option>
							@foreach($subject as $subject)
								<option value ="{{$subject->name}}">{{$subject->name}}</option>
							@endforeach
						</select>
                        
                      </div>
                    </div>
					
					<div class="control-group">
                      <div class="controls">
							<button data-placement="right" title="Click to Save" id="save" name="save" class="btn btn-success">Add</button>
                      </div>
                    </div>
            </form>
			</div>
        </div>
    </div>
    <!-- /block -->
</div>

</div>

<div class="row-fluid" id="detail">
    <!-- block -->
    <div class="block">
        <div class="navbar navbar-inner block-header" style="color: green;">
            <div class="muted pull-left" id="classheading">


@if($type==0)
Fill in the blanks
@endif
@if($type==1)
MCQ's
@endif
@if($type==2)
Short Questions
@endif
@if($type==3)
Long Questions
@endif
@if($type==4)
True or False
@endif
</div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">
			<form action="{{route('savequestions')}}" method="post" id="">
				{{ csrf_field() }}

				<input type="hidden" required="" name="type" value="{{$type}}">
				<input type="hidden" name="class_name" value="{{$class_name}}">
				<input type="hidden" name="subject_name" value="{{$subject_name}}">
				<div class="control-group">
                      <div class="controls">
					  <label>Chapters :</label>
					  <select required="" name="chapters" placeholder = "chapters">
					  	<option></option>
						@foreach($chapters as $chap)
							<option value ="{{$chap->name}}">{{$chap->name}}</option>
						@endforeach
						</select>
                        
                      </div>
                    </div>

                    <div class="control-group">
                      <div class="controls">
					  <label>Question :</label>
					  <span style="color:red;">Use New line for Multiple Questions</span>
                       <!-- <input required="" class="input focused"  name="question" id="focusedInput" type="text" placeholder = "Fill in the blanks" required> -->
                       <!-- <br>	
                       <input type="button"  id="changetype" value="Text View" class="btn btn-default">
                       <input type="button"  id="changetype1" value="Math" class="btn btn-default">
                       <div id="question_type"> -->
                       	    <textarea required="" style="width :500px;" class="input focused"  name="question" id="focusedInput" id="question" type="text" ></textarea>
                      <!--  </div>
                       <span class="math-tex">\( \sqrt{\frac{a}{b}} \)</span>
 -->

                      </div>
                    </div>
					@if($type==1)
					<div class="control-group">
                      <div class="controls">
					  <label>Option 1</label>
                       <input class="input focused"  name="option1" id="focusedInput" type="text" placeholder = "Option 1" required>
                      </div>
                    </div>

                    <div class="control-group">
                      <div class="controls">
					  <label>Option 2</label>
                       <input class="input focused"  name="option2" id="focusedInput" type="text" placeholder = "Option 2" required>
                      </div>
                    </div>

                    <div class="control-group">
                      <div class="controls">
					  <label>Option 3</label>
                       <input class="input focused"  name="option3" id="focusedInput" type="text" placeholder = "Option 3" required >
                      </div>
                    </div>

                    <div class="control-group">
                      <div class="controls">
					  <label>Option 4</label>
                       <input class="input focused"  name="option4" id="focusedInput" type="text" placeholder = "Option 4" required>
                      </div>
                    </div>

				@endif


					<div class="control-group">
                      <div class="controls">
							<button data-placement="right" title="Click to Save" id="save" name="save" id="save" class="btn btn-success" onmouseenter="Save()">Save</button>
                      </div>
                    </div>
            </form>
			</div>
        </div>
    </div>
</div>
</div>

<script type="text/javascript">
	
	$(document).ready(function(){
		$("#insertmath").click(function() {
  			$( "#editor1" ).html('<span class="math-tex">​​​​Double Click here to add math</span>');
		
		});


	// $("#changetype").click(function() {
 //  		$( "#question_type" ).html('<textarea required="" style="width :500px;" class="input focused"  name="question" id="question" id="focusedInput" type="text" ></textarea>');
	// });
	// $( "#changetype1" ).click(function() {
 //  		$("#question_type").html('<textarea class="ckeditor" cols="80" id="editor1" name="editor1" rows="10"><span class="math-tex">​​​​\( \sqrt{\frac{a}{b}} \)</span></textarea>');
	// 	CKEDITOR.replace( 'editor1' );
	// 	CKEDITOR.config.extraPlugins = 'mathjax';
	// 	//CKEDITOR.config.mathJaxLib = 'ckeditor/plugins/mathjax/MathJax.js?config=TeX-AMS_HTML';
	// 	CKEDITOR.config.mathJaxLib = '//cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML';

	// });

});
</script>
@endsection
