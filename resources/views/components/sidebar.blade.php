<header class="mb-5 fixed-top">
    @include('components.header-top')
    <nav class="main-navbar">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand d-none d-md-flex d-lg-flex align-items-center" href="{{ route('home') }}">
                <img src="{{ asset('logo.png') }}" alt="" width="30" height="30">
                <h4 class="ps-1 text-light">Sawita Raya</h4>
            </a>
            <div class="d-flex justify-content-md-center align-items-center">
                @include('components.topbar-menu')
            </div>
            @guest
            <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">Login <i
                    class="fas fa-sign-in-alt"></i></a>
            @else
            <div class="dropdown d-none d-md-flex d-lg-flex">
                <a href="#" class="dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false" data-reference="parent">
                    <div class="avatar">
                        @if (Auth::user()->image)
                        <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="Avatar">
                        @else
                        <img src="{{ asset('user.svg') }}" alt="Avatar">
                        @endif
                    </div>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('account.index') }}"><i class="fas fa-user-circle"></i>
                        Profile</a>
                    @can('admin')
                    <a class="dropdown-item" href="{{ route('setting.index') }}"><i class="fas fa-cog"></i>
                        Pengaturan</a>
                    <a class="dropdown-item" href="{{ route('users.index') }}"><i class="fas fa-users"></i>
                        Pengguna</a>
                    @endcan
                    <div class="dropdown-divider"></div>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="dropdown-item" type="submit"><i class="fas fa-sign-out-alt"></i> Keluar</button>
                    </form>
                </div>
            </div>
            @endguest
        </div>
    </nav>
</header>