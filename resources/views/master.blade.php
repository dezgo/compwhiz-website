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
    <meta name="description" content="Offering a high-quality, timely, professional IT support service to small to medium sized businesses in Canberra and Queanbeyan."/>
    <meta property="og:locale" content="en_US"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="High-quality IT support services"/>
    <meta property="og:description" content="Offering a high-quality, timely, professional IT support service to small to medium sized businesses in Canberra and Queanbeyan."/>
    <meta property="og:url" content="{{ url('') }}"/>
    <meta property="og:site_name" content="Computer Whiz - Canberra"/>
    <meta property="og:image" content="{{ url('/images/logo.jpg') }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="robots" content="index, follow" />
    <title>Computer Whiz - Canberra</title>
    <link href='https://fonts.googleapis.com/css?family=Work+Sans' rel='stylesheet' type='text/css'>
    <link href="{{ url('/css/all.css') }}" rel="stylesheet">
    @yield('head')
</head>

<body id="app-layout">

	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header navbar-brand">
	        <img alt="Computer Whiz - Canberra" src="/images/logo-h.png" width="68" height="30">
	    </div>
		<div class="navbar-header navbar-right">
			<a href="/booknow" class="navbar-link">
		        <img alt="Book Now" src="/images/book_now.png" width="169" height="52">
			</a>
	    </div>
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
</body>
</html>
