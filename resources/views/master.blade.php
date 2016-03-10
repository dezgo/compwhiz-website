<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Computer Whiz - Canberra</title>
    <link href='https://fonts.googleapis.com/css?family=Work+Sans' rel='stylesheet' type='text/css'>
    <link href="{{ url('/css/all.css') }}" rel="stylesheet">
    @yield('head')
</head>

<body id="app-layout">
    <div class="container">
        <img src='/images/logo.jpg'>
        <br><br>
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
