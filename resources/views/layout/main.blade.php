<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Recruitement</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- Style css !bootstrap -->
    <link rel="stylesheet" href="/css/style.css">

  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">E-Recruitement</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                {{-- <li class="nav-item">
                <a class="nav-link {{($title === 'Home') ? 'active' : ''}}" aria-current="page" href="/">Home</a>
                </li> --}}
                <li class="nav-item">
                <a class="nav-link {{ Request::is('/*') || Request::is('info*') ? 'active' : ''}}" href="/">Karir</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">
              @auth
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Selamat Datang, {{ auth()->user()->name }}
                </a>
                <ul class="dropdown-menu">
                  @can('isAdmin')
                  <li><a class="dropdown-item" href="/dashboard-admin"><i class="bi bi-window-dock"></i> Dashboard</a></li>
                  @endcan
                  @can('pendaftar')
                  <li><a class="dropdown-item" href="/dashboard-pelamar"><i class="bi bi-window-dock"></i> Dashboard</a></li>
                  @endcan
                  <li><hr class="dropdown-divider"></li>
                  <li>
                    <form action="/logout" method="post">
                      @csrf
                      <button class="dropdown-item" type="submit">
                        <i class="bi bi-box-arrow-right"></i> Logout
                      </button>
                    </form>
                  </li>
                </ul>
              </li>
              @else
              <li class="nav-item">
                <a href="/login" class="nav-link {{ Request::is('login') ? 'active' : ''}}"><i class="bi bi-box-arrow-in-right"></i>login</a>
              </li>
              @endauth
            </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        @yield('container')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  </body>
</html>