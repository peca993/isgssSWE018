<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>isGSS</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

        @include('layouts.navbar')        

        @include('layouts.poruke')
      
        <main class="py-4 container">
            @yield('sadrzaj')
        </main>
    </div>

    @yield('skripte')

    <br><br><br><br><br>
    <footer class="footer">
            <div class="container">
              <span class="text-muted"><small><i class="fa fa-copyright"></i>NWA team  <a href="#">Kristina Marjanovic</a> <a href="#">Dejan Randjelovic</a> <a href="https://github.com/dekicaR/">Dejan Cenkov</a> <a href="https://github.com/peca993/">Petar Markovic</a></small></span>
            </div>
    </footer>    
</body>
</html>
