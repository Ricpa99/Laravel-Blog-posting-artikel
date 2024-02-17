<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   {{-- <link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
   <link rel="stylesheet" href="/bootstrap/js/bootstrap.js"> --}}
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
   <link rel="stylesheet" href="/bootstrap/css2/style.css">
   <title>{{ $judul }}</title>
</head>
<body>
   <div id="preloader">
      <div class="loader">
          <svg class="circular" viewBox="25 25 50 50">
              <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
          </svg>
      </div>
   </div>
   <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container">
         <a href="/home" class="navbar-brand {{ $judul == 'Home' ? 'active' : '' }}" aria-current="page">Blog</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
               <li  class="nav-item">
                  <a href="/postkategori" class="nav-link {{($judul == 'Post kategori') ? 'active' : ''}}">Post Category</a>
               </li>
            </ul>
            <ul class="navbar-nav ms-auto">
            @auth
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="/home" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  welcome back {{ Auth::user()->username }}
               </a>
               <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i> Dashboard</a></li>
                  <li>
                     <hr class="dropdown-divider">
                  </li>
                  <form action="/logout" method="post">
                  @csrf
                     <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Log out</button>
                  </form>
               </ul>
            </li>
            @else
            <li class="nav-item"><a class="nav-link {{($judul == 'login') ? 'active' : ''}}" href="\login"> <i class="bi bi-box-arrow-in-right"></i> Login</a></li>
            @endauth
            </ul>
         </div>
      </div>
   </nav>
   <div class="container mt-4">
      @yield('container')
   </div>
   <script src="/bootstrap/plugins/common/common.min.js"></script>
    <script src="/bootstrap/js/custom.min.js"></script>
</body>
</html>
