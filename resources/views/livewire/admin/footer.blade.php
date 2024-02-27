<footer class="footer">
    <div class="container-fluid">
        <div class="row justify-content-evenly">
            <div class="col-md-4 mb-4">
                <p class="about">
                    <span> Tentang Sawita Raya</span>
                <article align="justify" class="fw-normal text-light">
                    {{ $footer->excerpt }}
                    <a href="{{ route('about.show') }}" class="">Baca selengkapnya...</a>
                </article>
                </p>
            </div>
            <div class="col-md-3 mb-4">
                <ol class="list-group">
                    <li class="d-flex align-items-center">
                        <p class="text-light">
                            <i class="fas fa-location"></i>
                            <span>{{ $footer->address }}</span>
                        </p>
                    </li>
                    <li class="d-flex align-items-center">
                        <p class="text-light">
                            <i class="fas fa-phone"></i>
                            <span>{{ $footer->contact }}</span>
                        </p>
                    </li>
                    <li class="d-flex align-items-center">
                        <p class="text-light">
                            <i class="fas fa-envelope"></i>
                            <span>{{ $footer->email }}</span>
                        </p>
                    </li>
                </ol>
            </div>
            <div class="col-md-4 mb-4">
                <h2>Sawita <span>Raya</span></h2>
                <p class="menu">
                    <a class="{{ Request::is('home*') ? 'text-light': 'text-muted' }}" href="/"> Home</a> |
                    <a class="{{ Request::is('about*') ? 'text-light': 'text-muted' }}"
                        href="{{ route('about.show') }}">
                        About</a>
                    @can('admin')
                    | <a class="{{ Request::is('dashboard/setting*') ? 'text-light': 'text-muted' }}"
                        href="{{ route('setting.index') }}">Pengaturan</a>
                    @endcan
            </div>
        </div>
    </div>
</footer>