<!DOCTYPE HTML>
<html>
  <head>
    <title>SIM System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
    Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all">
    <!-- Custom Theme files -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" media="all"/>

    <!-- css select2 -->
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" type="text/css" media="all"/>

    <!--js-->
    <script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
    <!--datatables-->
    <link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" media="all">
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>

    <!--icons-css-->
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <!--Google Fonts-->
    <link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
    <!--static chart-->
    <script src="{{ asset('js/Chart.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <!-- SELECT2 -->
    <script src="{{ asset('js/select2.min.js') }}"></script>

  </head>

  <body>
    <div class="page-container">
      <div class="left-content">
       <div class="mother-grid-inner">
        <!--header start here-->
        <div class="header-main" style="background-color:maroon;margin-left:-5px">
         	<div class="header-left">
                <div class="logo-name">
                    <h1>SIM System</h1>
                    <!--<img id="logo" src="" alt="Logo"/>-->    
                </div>

            </div>
            <div class="clearfix"> </div>
         </div>
         <!--heder end here-->


         <!-- script-for sticky-nav -->
         <script>
         $(document).ready(function() {
         	 var navoffeset=$(".header-main").offset().top;
         	 $(window).scroll(function(){
         		var scrollpos=$(window).scrollTop();
         		if(scrollpos >=navoffeset){
         			$(".header-main").addClass("fixed");
         		}else{
         			$(".header-main").removeClass("fixed");
         		}
         	 });

         });
         </script>
         <!-- /script-for sticky-nav -->

          <div class="inner-block">
            @yield('content')
          </div>

          <!--copy rights start here-->
          <div class="copyrights">
          	 <p>©Copyright 2020 By Felicia | SIM System</p>
          </div>
          <!--COPY rights end here-->
        </div>
      </div>

      <!--slider menu-->
      <div class="sidebar-menu" style="position:fixed;">
        	<div class="logo"> 
            <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="#"> <span id="logo" ></span></a>
          </div>
          <div class="menu">
            <ul id="menu" >
              <li><a href="/"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
              <li><a><i class="fa fa-user"></i><span>Master</span><span class="fa fa-angle-right" style="float: right"></span></a>
                <ul id="menu-comunicacao-sub" >
                    <li id="menu-mensagens"><a href="{{url('/kota')}}"> Kota</a></li>
                    <li id="menu-arquivos" ><a href="{{url('/tempatPembuatan')}}">Tempat Pembuatan SIM</a></li>
                </ul>
              </li>
              <li><a href="/sim"><i class="fa fa-database"></i><span>Data SIM</span></a></li>
            </ul>
          </div>
      </div>
      <div class="clearfix"> </div>
      <!--slide bar menu end here-->
    </div>
 
    <script>
    var toggle = true;

    $(".sidebar-icon").click(function() {
      if (toggle){
        $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
        $("#menu span").css({"position":"absolute"});
      } else {
        $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
        setTimeout(function() {
          $("#menu span").css({"position":"relative"});
        }, 400);
      }
       toggle = !toggle;
    });
    </script>

    <!--scrolling js-->
    <script src="{{ asset('js/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <!--//scrolling js-->
    <script src="{{ asset('js/bootstrap.js') }}"> </script>
    
  </body>
</html>
