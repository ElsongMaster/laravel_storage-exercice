<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Document</title>
</head>
<body class="position-relative  min-vh-100 h-100">
    
    @include('partials.navBar')
    <div class="container pb-5">

        @yield('content')
    </div>
    @include('partials.footer')
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>