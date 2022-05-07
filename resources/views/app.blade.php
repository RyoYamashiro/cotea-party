<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <title>
      @yield('title')
    </title>
  </head>
  <body>
    @yield('content')


    <script src="{{asset('js/app.js')}}"></script>
  </body>
</html>
