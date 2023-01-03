<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8" name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $title }} | NMT</title>

        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="/css/styles.css">
        <link rel="stylesheet" type="text/css" href="/css/trix.css">
        
        <script nonce="f4ce4a0d-685f-4aa8-aee4-2d2bb4cfccd7">(function(w,d){!function(a,e,t,r){a.zarazData=a.zarazData||{},a.zarazData.executed=[],a.zaraz={deferred:[]},a.zaraz.q=[],a.zaraz._f=function(e){return function(){var t=Array.prototype.slice.call(arguments);a.zaraz.q.push({m:e,a:t})}};for(const e of["track","set","ecommerce","debug"])a.zaraz[e]=a.zaraz._f(e);
        a.zaraz.init=()=>{var t=e.getElementsByTagName(r)[0],z=e.createElement(r),n=e.getElementsByTagName("title")[0];for(n&&(a.zarazData.t=e.getElementsByTagName("title")[0].text),a.zarazData.x=Math.random(),a.zarazData.w=a.screen.width,a.zarazData.h=a.screen.height,a.zarazData.j=a.innerHeight,a.zarazData.e=a.innerWidth,a.zarazData.l=a.location.href,a.zarazData.r=e.referrer,a.zarazData.k=a.screen.colorDepth,a.zarazData.n=e.characterSet,a.zarazData.o=(new Date).getTimezoneOffset(),a.zarazData.q=[];a.zaraz.q.length;){const e=a.zaraz.q.shift();a.zarazData.q.push(e)}z.defer=!0;for(const e of[localStorage,sessionStorage])Object.keys(e||{}).filter((a=>a.startsWith("_zaraz_"))).forEach((t=>{try{a.zarazData["z_"+t.slice(7)]=JSON.parse(e.getItem(t))}catch{a.zarazData["z_"+t.slice(7)]=e.getItem(t)}}));z.referrerPolicy="origin",z.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(a.zarazData))),t.parentNode.insertBefore(z,t)},["complete","interactive"].includes(e.readyState)?zaraz.init():a.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,0,"script");})(window,document);</script>
        
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="/AdminLTE-3.0.5/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
        <script type="text/javascript" src="/js/trix.js"></script>
        
        <!-- REQUIRED SCRIPTS -->

        <!-- jQuery -->
        <script src="/AdminLTE-3.0.5/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="/AdminLTE-3.0.5/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="/AdminLTE-3.0.5/dist/js/adminlte.min.js"></script>
    </head>

    <body class="hold-transition sidebar-min dark-mode">

    <div class="wrapper">
       <nav class="main-header navbar navbar-expand navbar-dark">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">Home</a>
        </li>
    </ul>

    @auth('owner')
        <ul class="navbar-nav ml-auto">
            <li class="nav-item mr-3">
                <a class="nav-link" href="{{ route('owner.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa-solid fa-right-from-bracket"></i>  Logout owner
                </a>
                <form action="{{ route('owner.logout') }}" method="POST" class="d-none" id="logout-form">
                    @csrf
                </form>
            </li>
        </ul>
    @endauth
    @auth('admin')
        <ul class="navbar-nav ml-auto">
        <li class="nav-item mr-3">
                <a class="nav-link" href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa-solid fa-right-from-bracket"></i>  Logout admin
                </a>
                <form action="{{ route('admin.logout') }}" method="POST" class="d-none" id="logout-form">
                    @csrf
                </form>
            </li>
        </ul>
    @endauth
</nav>
        <x-admin-sidebar></x-admin-sidebar>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>{{ $title }}</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a style="text-decoration: none;" href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active">{{ $title }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                {{ $slot }}
            </section>
        </div>         
        
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.2.0
            </div>
            <strong>Copyright &copy; Nikah Murah Tangerang.</strong> All rights reserved.
        </footer>
    </div>
    @include('sweetalert::alert')
    <script src="/js/app.js">
    </script>
    </body>
</html>
