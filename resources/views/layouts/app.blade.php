<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Acceuil</title>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">G-Article</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            @auth
            <li class="nav-item active">
              <a class="nav-link" href="#">Acceuil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('articles.mine',Auth::user()->id)}}">Mes articles</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Dashboard ({{Auth::user()->name}})</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('logout')}}">Me deconnecter</a>
            </li>
            
              @else
              <li class="nav-item">
                <a class="nav-link" href="#">Mon compte</a>
              </li>
            @endauth
          </ul>
        </div>
    </nav>
    <div class="card">
        @yield('page-content')
    </div>
</body>
</html>
