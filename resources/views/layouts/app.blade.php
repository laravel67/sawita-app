<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <title>Sawita|
        @if ($title)
        {{ $title }}
        @else
        {{ config('app.name') }}
        @endif
    </title>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,300;6..12,400;6..12,500;6..12,600;6..12,700;6..12,800;6..12,900&display=swap"
        rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,300;6..12,400;6..12,500;6..12,600;6..12,700;6..12,800;6..12,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }

        .equal-image {
            width: 300px;
            height: 300px;
            object-fit: cover;
        }
    </style>
</head>

<body class="dark">
    <script src="{{ asset('assets/js/themes/initTheme.js') }}"></script>
    <div id="app">
        <div id="main" class="layout-horizontal">
            @include('components.sidebar')
            <div class="content-wrapper container mt-md-5">
                <div class="page-heading">
                    <div style="height: 10vh"></div>
                    <h5>Sawita | <small class="text-muted">{{ $title }}</small>
                    </h5>
                </div>
                <div class="page-content">
                    @yield('content')
                </div>
            </div>
        </div>
        @livewire('admin.footer')
    </div>
    <script src="{{ asset('assets/js/dark.js') }}"></script>
    <script src="{{ asset('assets/js/horizontal-layout.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/js/jquery/jquery.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/js/sweet-alert.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script>
        @if (session('success'))
            Swal.fire({
                title: 'Berhasil !',
                icon: 'success',
                text: "{{ session('success') }}",
            });
        @elseif ($errors->any())
            Swal.fire({
            icon: "error",
            title: "Oops...",
            html: '{!! implode('<br>', $errors->all()) !!}',
            });
        @endif
    </script>
    @stack('js')
</body>

</html>