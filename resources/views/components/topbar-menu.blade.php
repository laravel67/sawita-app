<div>
    @auth
    <ul>
        <li class="menu-item {{ Request::is('dashboard') ?'active':'' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <span><i class="fas fa-th"></i> Dashboard</span>
            </a>
        </li>
        <li
            class="menu-item  has-sub {{ Request::is('dashboard/pupuk', 'dashboard/categories', 'dashboard/benefit') ? 'active':'' }}">
            <a href="#" class="menu-link">
                <span><i class="fas fa-baby-carriage"></i> Katalog Pupuk</span>
            </a>
            <div class="submenu ">
                <div class="submenu-group-wrapper">
                    <ul class="submenu-group">

                        <li class="submenu-item  ">
                            <a href="{{ route('pupuk.index') }}" class="submenu-link">Data Pupuk
                            </a>
                        </li>
                        <li class="submenu-item  ">
                            <a href="{{ route('category.index') }}" class="submenu-link">
                                Kategori / Jenis
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </li>

        <li class="menu-item  has-sub">
            <a href="#" class="menu-link">
                <span><i class="fas fa-chart-line"></i> Analisis Lahan</span>
            </a>
            <div class="submenu ">
                <div class="submenu-group-wrapper">
                    <ul class="submenu-group">

                        <li class="submenu-item  ">
                            <a href="{{ route('analize.index') }}" class="submenu-link">Analisis Tanah
                            </a>
                        </li>
                        <li class="submenu-item  ">
                            <a href="{{ route('result.index') }}" class="submenu-link">Hasil Analisis Lahan</a>
                        </li>
                    </ul>
                </div>
            </div>
        </li>

        <li class="menu-item  has-sub">
            <a href="#" class="menu-link">
                <span><i class="fas fa-book"></i> Guides</span>
            </a>
            <div class="submenu ">
                <div class="submenu-group-wrapper">
                    <ul class="submenu-group">
                        <li class="submenu-item  ">
                            <a href="{{ route('jadwal.index') }}" class="submenu-link">Jadwal Pemberian Pupuk
                            </a>
                        </li>
                        <li class="submenu-item  ">
                            <a href="" class="submenu-link">Panduan Pemberian Pupuk
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </li>

        <li class="menu-item  has-sub">
            <a href="#" class="menu-link">
                <span><i class="fas fa-map"></i> Data Lahan</span>
            </a>
            <div class="submenu ">
                <div class="submenu-group-wrapper">
                    <ul class="submenu-group">

                        <li class="submenu-item  ">
                            <a href="{{ route('garden.index') }}" class="submenu-link">Daftar Lahan/Perkebunan
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </li>

        <li class="menu-item  has-sub">
            <a href="#" class="menu-link">
                <span><i class="fas fa-info-circle"></i> Info</span>
            </a>
            <div class="submenu ">
                <div class="submenu-group-wrapper">
                    <ul class="submenu-group">

                        <li class="submenu-item  ">
                            <a href="#" class="submenu-link">Lokasi
                            </a>
                        </li>
                        <li class="submenu-item  ">
                            <a href="#" class="submenu-link">Kontak
                            </a>
                        </li>
                        <li class="submenu-item  ">
                            <a href="#" class="submenu-link">Sawita Raya
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </li>
    </ul>
    @endauth
</div>