<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <link href="/bootstrap/css2/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>{{ $judul }}</title>
</head>

<body>

   @include('dashboard.layout.load')
    <div id="main-wrapper">
        <div class="nav-header">
            <div class="brand-logo">
                <a href="index.html">
                    <!-- <b class="logo-abbr">Dashboard</b>
                    <span class="logo-compact">Dashboard</span> -->
                    <span class="brand-title text-white f-900">
                        Dashboard
                    </span>
                </a>
            </div>
        </div>
        <div class="header">    
            <div class="header-content clearfix">
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                
                <div class="header-right">
                    <ul class="clearfix">
                        
                        
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                              
                               Welcome Back {{ Auth::user()->name }} <i class="fa fa-angle-down f-s-14" aria-hidden="true"></i>
                            </div>
                            <div class="drop-down dropdown-profile   dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="/home" class="btn dropdown-item"> 
                                            <i class="icon-home"></i>Home</a>
                                        </li>
                                        <li>
                                            <form action="/logout" method="post">
                                                @csrf
                                                <button type="submit" class=" btn dropdown-item"> 
                                                <i class="icon-logout"></i> Logout</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Dashboard</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="/dashboard"">Dashboard Home </a></li>
                        </ul>
                    </li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Layouts</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="/dashboard/post">Dashboard Post</a></li>
                        </ul>
                    </li>
                    @can('admin')
                    <li class="nav-label">Administrator</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-user menu-icon"></i> <span class="nav-text">Admin</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="/dashboard/categories">Post Category</a></li>
                        </ul>
                    </li>
                    @endcan
                </ul>
            </div>
        </div>
        <div class="content-body">
            @yield('container')
            <div class="row page-titles mx-0">
            </div>
        </div>
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by Ricky</a> 2024</p>
            </div>
        </div>
    </div>
    <script src="/bootstrap/plugins/common/common.min.js"></script>
    <script src="/bootstrap/js/custom.min.js"></script>
    <script src="/bootstrap/js/settings.js"></script>
    <script src="/bootstrap/js/gleek.js"></script>
    <script src="/bootstrap/js/styleSwitcher.js"></script>
    <script src="/bootstrap/js/img.js"></script>

</body>

</html>