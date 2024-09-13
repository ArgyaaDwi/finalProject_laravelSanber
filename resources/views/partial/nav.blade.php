<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown user-menu">
            <a href="" class="nav-link bg-white dropdown-toggle " data-toggle="dropdown"
                style="background-color: #ffffff; ">
                <span class="d-none d-md-inline mr-2">
                    @auth
                        {{ Auth::user()->name }}
                    @else
                        Belum login (Guest)
                    @endauth
                </span>
                <img src="{{ asset('images/user.jpg') }}" class="user-image img-circle elevation-2" alt="User Image">
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- User image -->
                <li class="user-header">
                    <img src="{{ asset('images/user.jpg') }}" class="img-circle elevation-2" alt="User Image">
                    <p>
                        @auth
                            {{ Auth::user()->name }}
                        @else
                            Belum login (Guest)
                        @endauth
                        <small>
                            @auth
                                {{ Auth::user()->email }}
                            @else
                                Email tidak terdeteksi!
                            @endauth
                        </small>

                    </p>
                </li>
                <li class="user-footer">
                    <a href="/profile"
                        class="btn btn-outline-info  rounded btn-flat ">Profil</a>
                    <form action="{{ route('logout') }}" method="post" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger rounded btn-flat float-right">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</nav>
