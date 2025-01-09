<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 20px;
            background-color: #003366;
            color: white;
        }

        header .logo {
            width: 60px;
            height: auto;
        }

        header h1 {
            font-size: 1.5rem;
            margin: 0;
            padding: 0 15px;
            white-space: nowrap;
        }

        header nav {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        header nav a {
            color: white;
            text-decoration: none;
            font-size: 1rem;
        }

        header nav a:hover {
            text-decoration: underline;
        }

        footer {
            background-color: #003366;
            color: white;
            padding: 20px 0;
            text-align: center;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            text-align: center;
        }

        .footer-grid div {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .footer-grid i {
            font-size: 1.5rem;
            margin-right: 10px;
        }

        footer p {
            margin-top: 20px;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="d-flex align-items-center">
            <img src="{{ asset('storage/images/logoIKF.png') }}" alt="Logo IKF" class="logo">
            <h1>Ikatan Keluarga Flobamora NTT</h1>
        </div>
        <nav>
            <a href="{{ route('user.home.index') }}">Home</a>
            <a href="{{ route('user.sejarah.index') }}">Sejarah</a>
            <a href="{{ route('user.visimisi.index') }}">Visi Misi</a>
            <a href="{{ route('user.adArt.index') }}">AD/ART</a>
            <a href="{{ route('user.galeri.index') }}">Galeri</a>
            <a href="{{ route('user.keanggotaan.index') }}">Keanggotaan</a>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="container py-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        <div class="footer-grid">
            <div>
                <i class="bi bi-geo-alt"></i>
                <p>Lokasi: Kabupaten Sorong, Papua Barat Daya</p>
            </div>
            <div>
                <i class="bi bi-envelope"></i>
                <p>Email: info@ikfntt-sorong.id</p>
            </div>
            <div>
                <i class="bi bi-facebook"></i>
                <p>Facebook: IKF NTT Sorong</p>
            </div>
        </div>
        <p>&copy; 2025 IKF NTT Kabupaten Sorong. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
