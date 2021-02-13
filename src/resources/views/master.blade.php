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
    <link rel="stylesheet" href="{{asset('css/logincss.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('favicon.ico')}}" />
    <script src="{{asset('js/vendor/modernizr.js')}}"></script>
  </head>
  <body>

    @if(Session::has('message'))
<!--     <blink>
        <div style="margin: 10px; position: fixed; text-align: center; width: 100%; color: white ;padding: 10px;">
        <span style="margin 10px; padding :10px 15px; border-style: double; border-radius: 40px; background-color: black; font-weight: bold; background-:   10%; opacity: 0.5;">
          {{Session::get('message')}}
        </span>
      </div>
    </blink> -->
    <div id="blink1" class="highlight">{{Session::get('message')}}</div>
      <script type="text/javascript">
        <!--
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
          setTimeout("hide()",i);
          setTimeout("show()",i+450);
        }
      </script>
    @endif


    <div class="row-fluid ">
      <div class="large-12 medium-4 small-12 columns">
      <div id="logo" style="margin-left: 50px"><a href="index.html"><img src="{{asset('images/logo.png')}}" alt="Conmpany Name"></a>
         
      </div>
      </div>


    <div class="large-8 medium-8 small-12 columns">
    <nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name"> </li>
         <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
      </ul>

      <section class="top-bar-section">
        <!-- Right Nav Section -->
        <ul class="right" >
          <li><a href="{{route('home')}}" style="font-weight: bold;color: green;font-family: Helvetica, Arial, sans-serif">Home</a></li>
          <li><a href="{{route('about')}}" style="font-weight: bold;color: green;font-family: Helvetica, Arial, sans-serif">About Us</a></li>
          <li><a href="{{route('contact')}}" style="font-weight: bold;color: green;font-family: Helvetica, Arial, sans-serif">Contact</a></li>
           <li><a href="{{route('login')}}" style="font-weight: bold;color: green;font-family: Helvetica, Arial, sans-serif">Login</a></li>  
          </ul>
          </li>
        </ul>
      </section>

    </nav>
    </div>
    </div>
    <hr>


  
    @section("home")
    @show

    @section("about")
    @show

    @section("contact")
    @show

    @section("login")
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
