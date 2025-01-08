<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Profil Sejarah')</title>
    <!-- Tambahkan link CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profil_sejarah.index') }}">Sejarah</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('visi_misi.index') }}">Visi Misi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('struktur_organisasi.index') }}">Struktur Organisasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ad_art.index') }}">AD/ART</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('galeri.index') }}">Galeri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('keanggotaan.index') }}">Keanggotaan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('artikel.index') }}">Artikel</a>
                    </li>
                </ul>

                <!-- Dropdown Menu untuk Admin -->
                <ul class="navbar-nav">
                    @if (Auth::check())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="adminDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-user"></i> {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="adminDropdown">
                                <li><a class="dropdown-item">Level: {{ Auth::user()->role }}</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item text-danger" href="{{ route('logoutAksi') }}">
                                        <i class="fa fa-power-off"></i> Log Out
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        @yield('content')
    </div>
    <!-- Tambahkan script JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
