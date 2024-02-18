<div class="header-top align-items-center d-flex" style="height: 1rem;">
    <div class="container">
        <div class="logo d-md-none">
            <a href="">
                <strong>APS</strong>
            </a>
        </div>
        <div class=" d-none d-md-flex d-lg-flex align-items-center">
            <h5 class="text-light text-center pt-2">Sistem Informasi Analisis Pupuk Kelapa Sawit</h5>
        </div>
        <div class="header-top-right">
            <div class="d-flex align-items-center justify-content-center text-center">
                <i class="text-light fas fa-sun"></i>
                <div class="form-check form-switch fs-6 mx-3">
                    <input class="form-check-input  me-0" type="checkbox" id="toggle-dark" style="cursor: pointer">
                    <label class="form-check-label"></label>
                </div>
                <i class="text-light fas fa-moon"></i>
            </div>
            @auth
            <div class="dropdown d-lg-none d-md-none">
                <a href="#" id="topbarUserDropdown"
                    class="user-dropdown d-flex align-items-center dropend dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <div class="avatar">
                        <img src="{{ asset('assets/compiled/jpg/3.jpg') }}" alt="Avatar">
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="topbarUserDropdown" style="">
                    <li><a class="dropdown-item" href="{{ route('profile.index') }}"><i class="fas fa-user-circle"></i>
                            Profile</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-cog"></i> Pengaturan</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class="dropdown-item" type="submit"><i class="fas fa-sign-out-alt"></i>
                                Keluar</button>
                        </form>
                    </li>
                </ul>
            </div>
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
            @else
            <a class="btn btn-outline-primary btn-sm d-md-none d-lg-none" href="{{ route('login') }}"><i
                    class="fas fa-sign-in-alt"></i>
                Login</a>
            @endauth
        </div>
    </div>
</div>