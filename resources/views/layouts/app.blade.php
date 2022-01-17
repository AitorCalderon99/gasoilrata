<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @stack('head')
</head>
<body>
    <!-- <div id="app">
        <Header></Header>
    </div> -->

    @yield('content')

    <div id="app">
        <Footer></Footer>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"/>

</body>
</html>
