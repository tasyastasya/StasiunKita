<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <!-- LEAFLET CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
    <!-- BOOTSTRAP CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"/>
     <!-- FONT AWESOME -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
     
    @yield('styles')
</head>

<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"> <i class="fa-solid fa-map-location-dot"></i>{{$title}}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('index') }}"> <i class="fa-solid fa-house-chimney"></i>Home</a>
          </li>
        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-table"></i></i></i> Data Tables
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="nav-link" href="{{ route('table-point') }}">Table Point</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="nav-link" href="{{ route('table-polyline') }}">Table Polyline</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="nav-link" href="{{ route('table-polygon') }}">Table Polygon</a></li>
                        </ul>
                      </li>
        <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#infoModal"><i class="fa-solid fa-circle-info"></i></i> Info</a>
         </li>
         
         <!-- Modal -->
<div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="infoModalLabel">Informasi Mahasiswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Nama:</strong> Nurnita Permatasari</p>
                <p><strong>NIM:</strong> 22/505630/SV/21849</p>
                <p><strong>Prodi:</strong> Sistem Informasi Geografis</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
        
        
        @if (Auth::check())

        <li class="nav-item">
          <a class="nav-link" href="{{ route('dashboard') }}"><i class="fa-solid fa-gauge"></i>Dashboard</a>
        </li>
        <form method="POST" action="{{ route('logout') }}">
        @csrf
        <li class="nav-item">
          <button class="nav-link text-danger" type="submit"><i class="fa-solid fa-right-from-bracket"></i>Logout</button>
        </li>
      </form>
        @else
        <li class="nav-item">
          <a class="nav-link text-primary" href="{{ route('login') }}"> <i class="fa-solid fa-right-to-bracket"></i>Login</a>
        </li>

        @endif
      </ul>
    </div>
  </div>
</nav>
    <!-- <h1>This is Laravel Page, Welcome!</h1> -->
    @yield('content')

    <!-- LEAFLET JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" ></script>
    
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    @include('components.toast')
    @yield('script')
</body>
</html>