<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="index3.html" class="brand-link justify-content-center row" style="text-decoration: none">
    <img src="/img/logo.jpg" alt="AdminLTE Logo" class="brand-image" style="opacity: .8"">
    <span class="brand-text font-weight-light mt-2">Nikah Murah Tangerang</span>
    </a>
    
    <div class="sidebar">
    
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
    <img src="/img/admin.jpg" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
    @auth('admin') 
        <a href="#" class="d-block" style="text-decoration: none;">Admin</a>
    @endauth
    @auth('owner')
        <a href="#" class="d-block" style="text-decoration: none;">Owner</a> 
    @endauth
    </div>
    </div>
    
    <div class="form-inline">
    <div class="input-group" data-widget="sidebar-search">
    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
    <div class="input-group-append">
    <button class="btn btn-sidebar">
    <i class="fas fa-search fa-fw"></i>
    </button>
    </div>
    </div>
    </div>
    
    <nav class="mt-2">
    @auth('admin')
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        @foreach ($sidebar as $name => $url)
                <li class="nav-item">
                    <a class="nav-link" href="{{ $url }}">
                        <i class="nav-icon fa-solid fa-landmark" style="color: lightskyblue"></i>
                        <p>{{ $name }}</p>
                    </a>
                </li>
            @endforeach
        <li class="nav-item menu-open" name="masterdata">
            <a href="#" class="nav-link">
                <i class="nav-icon fa-solid fa-cubes-stacked" style="color: rgb(231, 224, 224)"></i>
                <p>
                Master Data
                <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                @foreach ($masterdata as $name=>$url)
                <li class="nav-item">
                    <a href="{{ $url }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ $name }}</p>
                    </a>
                </li>
                @endforeach
            </ul>
        </li>
        <li class="nav-item menu-open" name="masterlayanan">
            <a href="#" class="nav-link">
                <i class="nav-icon fa-solid fa-vihara" style="color: rgb(145, 128, 239)"></i>
                <p>
                Master Layanan
                <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                @foreach ($masterlayanan as $name=>$url)
                <li class="nav-item">
                    <a href="{{ $url }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ $name }}</p>
                    </a>
                </li>
                @endforeach
            </ul>
        </li>
        <li class="nav-item menu-open" name="masterblog">
            <a href="#" class="nav-link">
                <i class="nav-icon fa-solid fa-blog" style="color: rgb(113, 242, 128)"></i>
                <p>
                Master Blog
                <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                @foreach ($masterblog as $name=>$url)
                <li class="nav-item">
                    <a href="{{ $url }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ $name }}</p>
                    </a>
                </li>
                @endforeach
            </ul>
        </li>
        <li class="nav-item menu-open" name="laporan">
            <a href="#" class="nav-link">
                <i class="nav-icon fa-solid fa-file-lines" style="color: rgb(225, 231, 130)"></i>
                <p>
                Laporan
                <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                @foreach ($laporan as $name=>$url)
                <li class="nav-item">
                    <a href="{{ $url }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ $name }}</p>
                    </a>
                </li>
                @endforeach
            </ul>
        </li>
    </ul>
    @endauth

    {{-- owner side --}}
    @auth('owner')
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        @foreach ($ownerSidebar as $name => $url)
                <li class="nav-item">
                    <a class="nav-link" href="{{ $url }}">
                        <i class="nav-icon fa-solid fa-landmark" style="color: lightskyblue"></i>
                        <p>{{ $name }}</p>
                    </a>
                </li>
            @endforeach
        <li class="nav-item menu-open" name="masterdata">
            <a href="#" class="nav-link">
                <i class="nav-icon fa-solid fa-cubes-stacked" style="color: rgb(231, 224, 224)"></i>
                <p>
                Master Data
                <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                @foreach ($ownerMasterdata as $name=>$url)
                <li class="nav-item">
                    <a href="{{ $url }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ $name }}</p>
                    </a>
                </li>
                @endforeach
            </ul>
        </li>
        <li class="nav-item menu-open" name="masterlayanan">
            <a href="#" class="nav-link">
                <i class="nav-icon fa-solid fa-vihara" style="color: rgb(145, 128, 239)"></i>
                <p>
                Master Layanan
                <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                @foreach ($ownerMasterlayanan as $name=>$url)
                <li class="nav-item">
                    <a href="{{ $url }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ $name }}</p>
                    </a>
                </li>
                @endforeach
            </ul>
        </li>
        <li class="nav-item menu-open" name="masterblog">
            <a href="#" class="nav-link">
                <i class="nav-icon fa-solid fa-blog" style="color: rgb(113, 242, 128)"></i>
                <p>
                Master Blog
                <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                @foreach ($ownerMasterblog as $name=>$url)
                <li class="nav-item">
                    <a href="{{ $url }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ $name }}</p>
                    </a>
                </li>
                @endforeach
            </ul>
        </li>
        <li class="nav-item menu-open" name="laporan">
            <a href="#" class="nav-link">
                <i class="nav-icon fa-solid fa-file-lines" style="color: rgb(225, 231, 130)"></i>
                <p>
                Laporan
                <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                @foreach ($ownerLaporan as $name=>$url)
                <li class="nav-item">
                    <a href="{{ $url }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ $name }}</p>
                    </a>
                </li>
                @endforeach
            </ul>
        </li>
    </ul>
    @endauth
    </nav>
    
    </div>
    
    </aside>