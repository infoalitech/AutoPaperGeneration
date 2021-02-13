@extends("master2")
@section("generate1")

<div id="print">
<div style="border: 1px solid green;margin-top: 10px; margin-left: 10px;margin-right: 10px;margin-bottom: 50px; padding: 10px 60px 10px 60px;
	font-size: 12pt; font-family: Times New Roman;">

	<table style="width: 100%; border-style: double;">
		<tr style="border: 2px solid black;">
			<td>
				<img style="float: left;" src="{{asset('images/logoo.jpg')}}" width="100px" height="100px" alt="logo">
			</td>
			<td colspan="" style="text-align: center;">
					<h3 align="center">{{$school}}</h3>
					<h4 align="center">{{$exam}}</h4>
			</td>
		</tr>
		<tr>
			<td>
				T Marks: {{$tmarks}}
			</td>
			<td style="text-align: right;">
				Time: {{$time}}
			</td>
		</tr>
		<tr>
			<td>
				Subject: {{$subject_name}}
			</td>
			<td style="text-align: right;">
				Class: {{$class_name}}
			</td>
		</tr>
	</table>
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
			$perq=$fitb_marks*$count
		@endphp

	<table class="" style="width: 100%">
		<tr>
			<td style="font-size:14pt; font-weight: bold; float:left;">
				{{$no}}.Fill in the blanks.
			</td>
			<td style="font-size:14pt; text-align: right;">
				{{$fitb_marks}}&nbsp;x{{$count}}&nbsp;=&nbsp;{{$perq}}			
			</td>
		</tr>
		@php
        	$n='a'
        @endphp
		<tr>
			<td colspan="2">
				@foreach($fill_in_the_blanks as $fitb)
			<label style="font-size: 12pt; font-family: Times New Roman;">({{$n}}) {{$fitb->question}}</label>
			@php
				$n++
			@endphp
		@endforeach
			</td>
		</tr>
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
			$perq=$mcqs_marks*$count
		@endphp


		<tr>
			<td style="font-size:14pt; font-weight: bold; float:left;">
				{{$no}}.Choose the correct option.
			</td>
			<td style="font-size:14pt; text-align: right;">
				{{$mcqs_marks}}&nbsp;x{{$count}}&nbsp;=&nbsp;{{$perq}}		
			</td>
		</tr>
		@php
        	$n='a'
        @endphp
		<tr>
			<td colspan="2">
				<table style="width: 100%; border: 0px; margin: 0px;">
				@foreach($mcqs as $mcqs)
				<tr>
					<td colspan="4">
						({{$n}}) {{$mcqs->question}}
					</td>
				</tr>
				<tr>
					<td>i.{{$mcqs->option1}}</td>
					<td>ii.{{$mcqs->option2}}</td>
					<td>iii.{{$mcqs->option3}}</td>
					<td>iv.{{$mcqs->option4}}</td>
				</tr>
			@php
				$n++
			@endphp
		@endforeach
		</table>
			</td>
		</tr>
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
			$perq=$tf_marks*$count
		@endphp
		<tr>
			<td style="font-size:14pt; font-weight: bold; float:left;">
				{{$no}}.Tick true or false.
			</td>
			<td style="font-size:14pt;text-align: right;">
				{{$tf_marks}}&nbsp;x{{$count}}&nbsp;=&nbsp;{{$perq}}				
			</td>
		</tr>
		@php
        	$n='a'
        @endphp
		<tr>
			<td colspan="2">
				<table style="width: 100%; border: 0px; margin: 0px;">
					@foreach($true_false as $tf)
					<tr>
						<td style="font-size: 12pt; font-family: Times New Roman;">
							({{$n}}) {{$tf->question}} 
						</td>
						<td>
							 T&nbsp;/&nbsp;F
						</td>
					</tr>
					@php
						$n++
					@endphp
					@endforeach
				</table>

			</td>
		</tr>

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
			$perq=$short_marks*$count
		@endphp
		<tr>
			<td style="font-size:14pt; font-weight: bold; float:left;">
				{{$no}}. Answer the following.
			</td>
			<td style="font-size:14pt;	 text-align: right;">
				{{$short_marks}}&nbsp;x{{$count}}&nbsp;=&nbsp;{{$perq}}			
			</td>
		</tr>
		@php
        	$n='a'
        @endphp
		<tr>
			<td colspan="2">
				@foreach($short_questions as $s)
					<span style="font-size: 12pt; font-family: Times New Roman;">({{$n}}) {{$s->question}}</span><br>
					@php
						$n++
					@endphp
				@endforeach
			</td>
		</tr>
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
			$perq=$long_marks*$count
		@endphp

			<tr>
			<td style="font-size:14pt; font-weight: bold; float:left;">
				{{$no}}. Answer the following in detail.
			</td>
			<td style="font-size:14pt; text-align: right;">
				{{$long_marks}}&nbsp;x{{$count}}&nbsp;=&nbsp;{{$perq}}			
			</td>
		</tr>
		@php
        	$n='a'
        @endphp
		<tr>
			<td colspan="2">
				@foreach($long_questions as $l)
			<span style="font-size: 12pt; font-family: Times New Roman;">({{$n}}) {{$l->question}}</span><br>
			@php
				$n++
			@endphp
		@endforeach
			</td>
		</tr>	
	</table>
	<div style="margin-left: 20px;">
		
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