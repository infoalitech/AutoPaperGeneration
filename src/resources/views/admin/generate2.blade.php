@extends("master2")
@section("generate1")

<div id="print">
	<div>
<div style="border: 1px solid green;margin-left: 10px;margin-right: 10px;margin-bottom: 50px; padding: 10px 60px 10px 60px;
	font-size: 12pt; font-family: Times New Roman;

">
	<h3 align="center">{{$school}}</h3>
	<h4 align="center">{{$exam}}</h4>
	<div style="float: left;margin-left: 10px">
		<p>T Marks: {{$tmarks}}</p>
		<p>Time: {{$time}}</p>
	</div>
	<div style="float: right;margin-right: 10px">
		<p>Subject: {{$subject_name}}</p>
		<p>Class: {{$class_name}}</p>
	</div>
	<hr>
	@php
        $no=1
    @endphp
	@if($fitb_marks!=0)
		@php
        	$count=0
        @endphp
		@foreach($fill_in_the_blanks as $fitb)
			@php
				$count++
			@endphp
		@endforeach
		@php
			$perq=$fitb_marks/$count
		@endphp
	<div style="">
	<span style="font-size:14pt; font-weight: bold; float:left;">{{$no}}.Fill in the blanks.</span>
		<span style="font-size:14pt; float:  right; padding-right: 50px;"> 
			{{$perq}}&nbsp;x{{$count}}&nbsp;=&nbsp;{{$fitb_marks}}</span>
	</div>
	<br>
		@php
        	$n='a'
        @endphp
	<div style="margin-left: 20px;" class="questionns">
		@foreach($fill_in_the_blanks as $fitb)
			<label style="font-size: 12pt; font-family: Times New Roman; ">
				({{$n}}) {{$fitb->question}}
			</label>
			@php
				$n++
			@endphp
		@endforeach
	</div>
	@php
        $no++
    @endphp
	@endif

	@if($mcqs_marks!=0)
		@php
        	$count=0
        @endphp
		@foreach($mcqs as $fitb)
			@php
				$count++
			@endphp
		@endforeach
		@php
			$perq=$mcqs_marks/$count
		@endphp
	<div style="">
	<span style="font-size:14pt; font-weight: bold; float:left;">{{$no}}.Choose the correct option.</span>
		<span style="font-size:14pt; float:  right; padding-right: 50px;">
		{{$perq}}&nbsp;x{{$count}}&nbsp;=&nbsp;{{$mcqs_marks}}</span>
	</div>
	<br>

	@php
        $n='a'
    @endphp
	<div style="margin-left: 20px; ">
		@foreach($mcqs as $mcqs)
			<p style="font-size: 12pt; font-family: Times New Roman;">({{$n}}) {{$mcqs->question}}</p>
			<p style="font-size: 12pt; font-family: Times New Roman;">i.{{$mcqs->option1}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ii.{{$mcqs->option2}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;iii.{{$mcqs->option3}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;iv.{{$mcqs->option4}}</p>
			@php
				$n++
			@endphp
		@endforeach
	</div>
	@php
        $no++
    @endphp
	@endif

	@if($tf_marks!=0)
		@php
        	$count=0
        @endphp
		@foreach($true_false as $fitb)
			@php
				$count++
			@endphp
		@endforeach
		@php
			$perq=$tf_marks/$count
		@endphp
	<div style="">
	<span style="font-size:14pt; font-weight: bold; float:left;">{{$no}}.Tick true or false.</span>
		<span style="font-size:14pt; float:  right; padding-right: 50px;">
		{{$perq}}&nbsp;x{{$count}}&nbsp;=&nbsp;{{$tf_marks}}</span>
	</div>
	<br>
	@php
        $n='a'
    @endphp
	<div style="margin-left: 20px; ">
		@foreach($true_false as $tf)
			<p style="font-size: 12pt; font-family: Times New Roman;">({{$n}}) {{$tf->question}}  T/F</p>
			@php
				$n++
			@endphp
		@endforeach
	</div>
	@php
        $no++
    @endphp
	@endif

	@if($short_marks!=0)
	@php
        	$count=0
        @endphp
		@foreach($short_questions as $fitb)
			@php
				$count++
			@endphp
		@endforeach
		@php
			$perq=$short_marks/$count
		@endphp
	<div style="">
	<span style="font-size:14pt; font-weight: bold; float:left;">{{$no}}. Answer the following.</span>
		<span style="font-size:14pt; float:  right; padding-right: 50px;">
		{{$perq}}&nbsp;x{{$count}}&nbsp;=&nbsp;{{$short_marks}}</span>
	</div>
	<br>

	@php
        $n='a'
    @endphp
	<div style="margin-left: 20px;">
		@foreach($short_questions as $s)
			<p style="font-size: 12pt; font-family: Times New Roman;">({{$n}}) {{$s->question}}</p>
			@php
				$n++
			@endphp
		@endforeach
	</div>
	@php
        $no++
    @endphp
	@endif

	@if($long_marks!=0)
	@php
        	$count=0
        @endphp
		@foreach($long_questions as $fitb)
			@php
				$count++
			@endphp
		@endforeach
		@php
			$perq=$long_marks/$count
		@endphp
	<div style="">
		<span style="font-size:14pt; font-weight: bold; float:left;">{{$no}}. Answer the following in detail.</span>
		<span style="font-size:14pt; float:  right; padding-right: 50px;">
		{{$perq}}&nbsp;x{{$count}}&nbsp;=&nbsp;{{$long_marks}}</span>
	</div>
	<br>
	@php
        $n='a'
    @endphp
	<div style="margin-left: 20px;">
		@foreach($long_questions as $l)
			<p style="font-size: 12pt; font-family: Times New Roman;">({{$n}}) {{$l->question}}</p>
			@php
				$n++
			@endphp
		@endforeach
	</div>
	@php
        $no++
    @endphp
	@endif

</div>
</div>

<div align="center"><button onclick="printdata('print');"align="center">Print</button></div>
<script>
function printdata(p){
    if(document.getElementById(p)!=null){
    var body=document.body.innerHTML;
    var printablecontent=document.getElementById(p).innerHTML;
    document.body.innerHTML=printablecontent;
    window.print();
    document.body.innerHTML=body;}
}
</script>
@endsection