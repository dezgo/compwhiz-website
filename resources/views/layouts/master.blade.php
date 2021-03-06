<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" lang="en-US" prefix="og: http://ogp.me/ns#">
<![endif]-->
<!--[if IE 7]>
<html id="ie7" lang="en-US" prefix="og: http://ogp.me/ns#">
<![endif]-->
<!--[if IE 8]>
<html id="ie8" lang="en-US" prefix="og: http://ogp.me/ns#">
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html lang="en-US" prefix="og: http://ogp.me/ns#">
<!--<![endif]-->
<head>
	<meta charset="UTF-8" />
    <meta name="description" content="Offering a high-quality, timely, professional IT support service to home users and small to medium sized businesses in Canberra and Queanbeyan."/>
    <meta property="og:locale" content="en_US"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="High-quality IT support services"/>
    <meta property="og:description" content="Offering a high-quality, timely, professional IT support service to home users and small to medium sized businesses in Canberra and Queanbeyan."/>
    <meta property="og:url" content="{{ url('') }}"/>
    <meta property="og:site_name" content="Computer Whiz - Canberra"/>
    <meta property="og:image" content="{{ url('/images/logo.jpg') }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="robots" content="index, follow" />
    <title>Computer Whiz - Canberra</title>
    <link href='https://fonts.googleapis.com/css?family=Work+Sans' rel='stylesheet' type='text/css'>
    <link href="{{ url('/css/all.css') }}" rel="stylesheet">
	<script> (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){ (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o), m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m) })(window,document,'script','//www.google-analytics.com/analytics.js','ga'); ga('create', 'UA-75871864-1', 'auto'); ga('send', 'pageview'); </script>
    @yield('head')
</head>

<body id="app-layout">

	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header navbar-brand">
	        <a href='/'><img alt="Computer Whiz - Canberra" src="/images/logo-h.png" width="68" height="30"></a>
	    </div>
		<ul class="nav navbar-nav navbar-right">
			@if (!Auth::guest())
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
						{{ Auth::user()->name }} <span class="caret"></span>
					</a>

					<ul class="dropdown-menu" role="menu">
						<li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
					</ul>
				</li>
			@endif
			<li class="navbar-link h4">
				<a>
					<i class="fa fa-phone" aria-hidden="true"></i>&nbsp;02 6112 8025
				</a>
			</li>
	    </ul>
	  </div>
	</nav>

	@yield('header')
    <div class="container">
        @yield('content')

        <div id="footer">
            <script src="/js/all.js"></script>
            @yield('footer')
            <br />
            <span class="glyphicon glyphicon-copyright-mark" aria-hidden="true"></span>
            <small>Computer Whiz - Canberra 2016</small>
            </div>

    </div>
	<!--Start of Tawk.to Script-->
	<script type="text/javascript">
	var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
	(function(){
	var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
	s1.async=true;
	s1.src='https://embed.tawk.to/57304918c6045a5c6e8c96ce/default';
	s1.charset='UTF-8';
	s1.setAttribute('crossorigin','*');
	s0.parentNode.insertBefore(s1,s0);
	})();
	</script>
	<!--End of Tawk.to Script-->
</body>
</html>
