<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo App</title>
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<link rel="stylesheet" href="{{asset('css/my.css')}}">

<script src="https://kit.fontawesome.com/7a249e95a6.js" crossorigin="anonymous"></script>
</head>
<body>

    @yield('content')

    <footer class="text-center" id="footer">
        <p>Copyright &copy; <b>2020</b> Hehehe</p>
    </footer>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/my.js')}}"></script>
</body>
</html>