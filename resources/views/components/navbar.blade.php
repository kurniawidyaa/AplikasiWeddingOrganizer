     <!-- ======= Header ======= -->
     <header id="header" class="fixed-top d-flex align-items-center ">
        <div class="container d-flex justify-content-between align-items-center">
    
          <div class="logo">
            {{-- <h1 class="text-light"><a href="index.html"><span>Moderna</span></a></h1> --}}
            <!-- Uncomment below if you prefer to use an image logo -->
            <a href="index.html"><img src="img/logo.jpg" alt="" class="img-fluid"></a>
          </div>
    
          <nav id="navbar" class="navbar">
            <ul>
              @foreach ($navbar as $name => $url)
              <li><a href={{ $url }}>{{ $name }}</a></li>
              @endforeach
              <li><a href="{{ route('user.cart.index') }}"><i class="bi bi-cart2" style="font-size: 20px"></i></a></li>
              {{-- login untuk user --}}
              @auth
              <li class="dropdown"><a href=""><span>Welcome, {{ Auth::user()->name }}</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                  <li><a href="{{ route('user.order.index') }}">Riwayat Pesanan</a></li>
                  <li>
                    <a href="{{ route('user.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form action="{{ route('user.logout') }}" method="post" class="d-none" id="logout-form">
                      @csrf
                    </form>
                  </li>
                </ul>
              </li>
              @else   
              <li><a href="{{ route('user.login') }}"><i class="bi bi-box-arrow-in-right" style="font-size:18px"></i>&nbsp; Login</a></li> 
              @endauth
            </ul> 
            <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->
    
        </div>
    </header>
      <!-- End Header -->
    

      {{-- 
        bedanya agar transparant :
        ditambahkan didalam class -> header-transparent
        --}}