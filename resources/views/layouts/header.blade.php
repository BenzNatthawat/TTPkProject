<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Book Your Travel - Online Booking HTML Template">
    <meta name="description" content="Book Your Travel - Online Booking HTML Template">
    <meta name="author" content="themeenergy.com">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <!-- icon title -->
    <link rel="icon" href="../images/logotitle.png" type="image/png" sizes="16x16">
    <!-- Custom styles for this template -->
    <link href="../css/timepicki.css" rel="stylesheet">
    
    <link rel="stylesheet" href="/css/styles.css" />
    <link rel="stylesheet" href="/css/theme-turqoise.css" id="template-color" />
    <link rel="stylesheet" type="text/css" href="../css/alert.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/css/lightslider.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800|Roboto+Slab:400,700&subset=latin,latin-ext,greek-ext,greek,cyrillic,vietnamese,cyrillic-ext">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://use.fontawesome.com/e808bf9397.js"></script>
    <link rel="shortcut icon" href="../images/favicon.ico" />
    <link rel="stylesheet" href="/css/styler.css" type="text/css" />
     <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    
    <!--header-->
    <header class="header">
        <div class="wrap">
            <!--logo-->
            <div class="logo"><a href="home" title="Book Your Travel"><img src="/images/logo.png" alt="Travel Transport Phuket" /></a></div>
            <!--//logo-->
            
            <!--contact-->
            <!-- <div class="contact">
                <span>47/2 Support number</span>
                <span class="number">1- 555 - 555 - 555</span>
            </div> -->
            <!--//contact-->
        </div>
        
        <!--main navigation-->
        <nav class="main-nav">
            <div class="wrap">

                <ul class="slimmenu" id="nav">
                    <li><a class="manufont" href="/home" title="Home">Home</a></li>
                    <li><a class="manufont" href="/activity" title="activity">activity</a></li>
                    <li><a class="manufont" href="/package" title="package">package</a></li>
                    <li><a class="manufont" href="/reservation" title="shuttle">shuttle</a></li>
<!--                     <li class="has-submenu"><a class="manufont" href="#" title="Pages">Pages</a>
                        <ul style="display: none;">
                            <li><a href="/activity" title="activity">activity</a></li>
                        </ul>
                    </li> -->
                    <li><a class="manufont" href="#" title="Contact">Contact</a></li>
                    @guest
                        <li style="float:right">
                            <a class="manufont" href="{{ route('login') }}"><span class="material-icons" style="font-size:20px;">person</span> Login</a>
                        </li>
                        <li style="float:right">
                            <a class="manufont" href="{{ route('register') }}"><span class="material-icons" style="font-size:20px;">person_add</span> Register</a>
                        </li>
                    @else
                        <li style="float:right"><a href="#" title="Pages" class="manufont">{{ Auth::user()->user_name }} {{ Auth::user()->roles->role_name }}</a>
                            <ul style="display: none;">
                                <li><a href="/account">My Account</a></li>
                                <li><a href="/booking">Open Booking</a></li>
                                <li><a href="/positions">position</a></li>
                                <li><a href="#">Setting</a></li>
                                <li><a href="{{ route('logout') }}" 
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
            </ul>
            </div>
        </nav>
        <!--//main navigation-->
    </header>
    <!--//header-->
    
        @yield('content')
    
    <!--footer-->
    <footer class="footer">
        <div class="wrap">
            <div class="row">
                <!--column-->
                <article class="one-half ">
                    <h6>Travel Transport Phuket</h6>
                    <p><em>P:</em> 47/2 Phuket, Thailand</p>
                    <p><em>E:</em> <a href="#" title="Travel_Transport_Phuket@mail.com">Travel_Transport_Phuket@mail.com</a></p>
                </article>
                <!--//column-->
                
                <!--column-->
                <article class="one-half ">
                    <h6>Customer support</h6>
                    <ul>
                        <li><a href="#" title="Faq">Faq</a></li>
                        <li><a href="#" title="How do I make a reservation?">How do I make a reservation?</a></li>
                        <li><a href="#" title="Payment options">Payment options</a></li>
                        <li><a href="#" title="Booking tips">Booking tips</a></li>
                    </ul>
                </article>
                <!--//column-->
                
                
                <div class="bottom full-width">
                    <p class="copy">Travel_Transport_Phuket_2016</p>
                    <nav>
                        <ul>
                            <li><a href="#" title="About us">About us</a></li>
                            <li><a href="contact.html" title="Contact">Contact</a></li>
                            <li><a href="#" title="Partners">Partners</a></li>
                            <li><a href="#" title="Customer service">Customer service</a></li>
                            <li><a href="#" title="FAQ">FAQ</a></li>
                            <li><a href="#" title="Terms & Conditions">Terms &amp; Conditions</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </footer>
    <!---footer-->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhbRYJJIdx5t-FbQBg_Ra9wXcQ7Z9RMgg&callback=initMap"
    async defer"></script>
    <script type="text/javascript" src="/js/jquery.uniform.min.js"></script>
    <script type="text/javascript" src="/js/jquery.slimmenu.min.js"></script>
    <script type="text/javascript" src="/js/lightslider.min.js"></script>
    @yield('js')
    <script src="/js/scripts.js"></script>
</body>
</html>