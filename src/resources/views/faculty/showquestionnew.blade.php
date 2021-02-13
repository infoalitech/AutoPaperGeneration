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
            <div class="muted pull-left" id="classheading">Fill in the blanks</div>
        </div>
        <div class="block-content collapse in">
        	<table>
        		<tr>
        			<td>Class</td>
        			<td>Subject</td>
        			<td>Chapter</td>
        			<td>Type</td>
        		</tr>
        		<tr>
        			<td><input type="text" name="class" onchange="getdata()"></td>
        			<td><input type="text" name="subject"></td>
        			<td><input type="text" name="chapter"></td>
        			<td><input type="text" name="type"></td>
        		</tr>
        	</table>
        	<div class="questionns">
        		
        	</div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
	function getdata(){
			var classs=$("#class").val();
			var subject=$("#subject").val();
			var chapter=$("#chapter").val();
  			var type=$("#type").val();
  			$.ajax({
				type:'post',
				url:'{!!URL::to('showquestionnew')!!}',
				data:{
					'class':classs,
					'subject':subject,
					'chapter': chapter,
					'type':type
				},
				success:function(data){
					for(var i=0;i<data.length;i++)
					{
						
					}
					div.find('.questionns').html(" ");
					div.find('.questionns').append(op);
				},
				error:function(){
				}
			});
	}
	
</script>




@endsection