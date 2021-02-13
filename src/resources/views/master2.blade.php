<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AQPG</title>
    <link rel="stylesheet" href="{{asset('css/foundation.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('slick/slick.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}" />
    <!-- <link rel="stylesheet" href="{{asset('css/logincss.css')}}"> -->
    <!-- <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}"> -->
    <!-- <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"> -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('favicon.ico')}}" />
   

 <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
 <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML')}}"></script>

<!-- these links are for math editor -->

    
 <script src="{{asset('js/vendor/modernizr.js')}}"></script>
  <!--   <script src="{{asset('https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js')}}"></script>
    <script src="{{asset('lib/mathquill.min.js')}}"></script>
    <script src="{{asset('lib/matheditor.js')}}"></script>
 -->
<!-- this area is being used for Math editor-->
<script src="{{asset('https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js')}}"></script>

<script src="{{asset('generic_wiris/wirisplugin-generic.js')}}"></script>


 <!--  <script src="{{asset('Simple-WYSIWYG-Math-Editor-With-jQuery-Mathquill-matheditor-js/org/mathdox/formulaeditor/main.js')}}"></script> -->
    <style type="text/css">
        blink {
          -webkit-animation: 1s linear infinite condemned_blink_effect; // for Android
          animation: 1s linear infinite condemned_blink_effect;
        }
        @-webkit-keyframes condemned_blink_effect { // for Android
          0% {
            visibility: hidden;
          }
          50% {
            visibility: hidden;
          }
          100% {
            visibility: visible;
          }
        }
        @keyframes condemned_blink_effect {
          0% {
            visibility: hidden;
          }
          50% {
            visibility: hidden;
          }
          100% {
            visibility: visible;
          }
        }
    </style>
  </head>
  <body>
    @if(Session::has('message'))
<!--     <blink>
        <div style="margin: 10px; position: fixed; text-align: center; width: 100%; color: white ;padding: 10px;">
        <span style="margin 10px; padding :10px 15px; border-style: dotted; border-radius: 40px; background-color: green; font-weight: bold; background-:   10%; opacity: 0.7;">
            {{Session::get('message')}}
        </span>
      </div>
    </blink> -->
    <div id="blink1" class="highlight">
      <div style="margin: 10px; position: fixed; text-align: center; width: 100%; color: white ;padding: 10px;">
        <span style="margin 10px; padding :10px 15px; border-style: dotted; border-radius: 40px; background-color: green; font-weight: bold; background-:   10%; opacity: 0.7;">
            {{Session::get('message')}}
        </span>
      </div>
    </div>
      <script type="text/javascript">
        // blink "on" state
        function show()
        {
          if (document.getElementById)
          document.getElementById("blink1").style.visibility = "visible";
        }
        // blink "off" state
        function hide()
        {
          if (document.getElementById)
          document.getElementById("blink1").style.visibility = "hidden";
        }
        // toggle "on" and "off" states every 450 ms to achieve a blink effect
        // end after 4500 ms (less than five seconds)
        for(var i=900; i < 4500; i=i+900)
        {
          setTimeout("show()",i+450);
          setTimeout("hide()",i);
        }
      </script>
    @endif

    <div class="row-fluid ">
      <div class="large-2 medium-4 small-12 columns">
      <div id="logo" style="margin-left: 50px">
      <a href="{{route('fhome')}}"><img src="{{asset('images/logo.png')}}" alt="Conmpany Name">
      </a>
      <br>
      <div style="background-color: white;">
        @if(isset($name))
           Welcome {{$name}}
        @endif 
      </div>

         
      </div>
      </div>
    <div class="large-10 medium-10 small-12 columns">
    <nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name"> </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
      </ul>
      <section class="top-bar-section">
    @section("adminhome")
    @show

    @section("facultyhome")
    @show

    @section("class")
    @show

    @section("subject")
    @show

    @section("teacher")
    @show

    @section("chapters")
    @show

    @section("editsubject")
    @show

    @section("questions")
    @show

    @section("addquestions")
    @show

    @section("showquestions")
    @show

    @section("showquestiondetails")
    @show

    @section("allquestions")
    @show

    @section("generate")
    @show

    @section("generate1")
    @show

    @section("editsubjects")
    @show
    
<!--<div class="footer-sec">
 <div class="row">
 <div class="large-3 medium-3 small-12 columns">
 <div class="foot-1">
 <h4>Quick Links</h4>
 <ul>
 <li><a href="{{route('home')}}" title="Home">Home</a></li>
 <li><a href="{{route('about')}}" title="About Us">About Us</a></li>
 <li><a href="{{route('contact')}}" title="Contact">Contact</a></li>
 <li><a href="{{route('login')}}" title="Login">Login</a></li>
 </ul>
 </div>
 </div>
 
 
 <div class="large-4 medium-3 small-12 columns">
 <div class="foot-1">
 <h4>Address</h4>
 <p>Green-Baltistan Software Solutions, Skardu<br>
03480004729</p>
 <ul>
 <li><a href="mailto:info@companyname.com" target="_blank">fazil.kiu@gmail.com</a></li>
 <li><a href="tel:(01) 800 854 633" target="_blank">03555252052</a></li>
 </ul>
 </div>
 </div>
 
 <div class="large-2 medium-3 small-12 columns">
 <div class="foot-1">
 <h4>Follow Us</h4>
 <div class="social">
 <div class="facebook"><a href="#" class="facebook"></a></div>
 <div class="twitter"><a href="#" class="twitter"></a></div>
 
 </div>
 </div>
 
 </div>
 </div>
 
 <div class="copy">
 <div class="row">
 <div class="large-12 columns">
 Copyright &copy; 2019. All Rights Reserved to GB-SS. <a href="http://www.pfind.com/goodies/sleekbiz/"></a> <a href="http://www.pfind.com/goodies/"></a>
 </div>
 </div>
 </div>!-->
 
 
    
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
    <script type="text/javascript" src="js/all.js"></script>
    <script type="text/javascript" src="slick/slick.js"></script>
    <script type="text/javascript" src="js/scripts.js"></script>
    

    
  </body>
</html>
