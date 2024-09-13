<div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('images/user.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            @auth
                <a href="#" style="text-decoration: none" class="d-block">{{ Auth::user()->name }}</a>
            @else
                <a href="#" style="text-decoration: none" class="d-block">Belum login (Guest)</a>
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
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item active">
                <a href="/home" class="nav-link">
                    <i class="nav-icon fa-solid fa-bars-progress"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('category.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Kategori
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('book.index') }}" class="nav-link">
                    <i class="nav-icon fa-solid fa-book"></i>
                    <p>
                        Buku
                    </p>
                </a>
            </li>
            @auth
                <li class="nav-item">
                    <a href="/profile" class="nav-link">
                        <i class="nav-icon fa-solid fa-user"></i>
                        <p>
                            Profile
                        </p>
                    </a>
                </li>
            @endauth
            <div class="nav-item mt-5"></div>
            <div class="nav-item mt-5"></div>
            <div class="nav-item mt-5"></div>
            <div class="nav-item mt-5"></div>
            <div class="nav-item mt-5"></div>
            <div class="nav-item mt-5"></div>
            @auth
                <li class="nav-item bg-danger rounded-sm">
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon fa-solid fa-right-from-bracket"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            @endauth
            @guest
                <li class="nav-item bg-info rounded-sm">
                    <a class="nav-link" href="{{ route('login') }}">
                        Login
                    </a>
                </li>
            @endguest
        </ul>
    </nav>
</div>
