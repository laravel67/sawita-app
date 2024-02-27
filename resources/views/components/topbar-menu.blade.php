<div>
    @auth
    <ul>
        <li class="menu-item {{ Request::is('dashboard') ?'active fw-bold':'' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <span><i class="fas fa-th"></i> Dashboard</span>
            </a>
        </li>
        <li
            class="menu-item {{ Request::is('dashboard/pupuk*', 'dashboard/categories*', 'dasboard/stoks*') ? 'active fw-bold':'' }}">
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
                        @can('admin')
                        <li class="submenu-item  ">
                            <a href="{{ route('category.index') }}" class="submenu-link">
                                Kategori / Jenis
                            </a>
                        </li>
                        @endcan
                    </ul>
                </div>
            </div>
        </li>

        <li class="menu-item {{ Request::is('dashboard/analisis*') ? 'active fw-bold':'' }}">
            <a href="{{ route('analisi.index') }}" class="menu-link">
                <span><i class="fas fa-chart-line"></i> Analisis Lahan</span>
            </a>
            <div class="submenu ">
                <div class="submenu-group-wrapper">
                    <ul class="submenu-group">
                        <li class="submenu-item">
                            <a href="{{ route('analisi.index') }}" class="submenu-link">Hasil Analisis Lahan</a>
                        </li>
                        <li class="submenu-item">
                            <a href="{{ route('analisi.create') }}" class="submenu-link">Analisis Tanah
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </li>

        <li
            class="menu-item  {{ Request::is('dashbaord/guides*', 'dashboard/jadwal*', 'dashboard/generate*') ? 'active fw-bold':'' }}">
            <a href="#" class="menu-link">
                <span><i class="fas fa-book"></i> Panduan</span>
            </a>
            <div class="submenu ">
                <div class="submenu-group-wrapper">
                    <ul class="submenu-group">
                        <li class="submenu-item  ">
                            <a href="{{ route('jadwal.index') }}" class="submenu-link">Jadwal Pemberian Pupuk
                            </a>
                        </li>
                        <li class="submenu-item  ">
                            <a href="{{ route('guide.index') }}" class="submenu-link">Panduan Pemberian Pupuk
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </li>

        <li class="menu-item {{ Request::is('dashboard/gardens*') ? 'active fw-bold':'' }}">
            <a href="{{ route('garden.index') }}" class="menu-link">
                <span><i class="fas fa-map"></i> Data Lahan</span>
            </a>
        </li>

        <li class="menu-item {{ Request::is('about*') ? 'active fw-bold':'' }}">
            <a href="{{ route('about.show') }}" class="menu-link">
                <span><i class="fas fa-info-circle"></i> Info</span>
            </a>
        </li>
    </ul>
    @endauth
</div>