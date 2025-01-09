<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sejarah IKF NTT Kabupaten Sorong</title>
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
            margin-bottom: 30px;
            padding: 0 15px;
        }

        header .logo {
            width: 80px;
            height: auto;
        }

        header h1 {
            font-size: 1.8rem;
            color: #003366;
            margin-left: 20px;
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 20px;
            text-align: center;
            margin-bottom: 40px;
            padding: 0 15px;
        }

        .menu-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            text-decoration: none;
            color: #333;
            transition: all 0.3s ease-in-out;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .menu-item:hover {
            background-color: #007bff;
            color: white;
        }

        .menu-item i {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .artikel-section {
            padding: 0 15px;
        }

        .artikel-section h2 {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 20px;
        }

        .artikel-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .artikel-item {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: all 0.3s ease-in-out;
        }

        .artikel-item img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .artikel-item:hover {
            transform: scale(1.02);
        }

        .artikel-content {
            padding: 15px;
        }

        .info-section {
            padding: 20px 0;
            background-color: #003366;
            color: white;
            text-align: center;
            width: 100%;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .info-grid div {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .info-grid i {
            font-size: 1.5rem;
            margin-right: 10px;
        }

        footer p {
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="container-fluid p-0">
        <!-- Header -->
        <header class="d-flex align-items-center">
            <img src="{{ asset('storage/images/logoIKF.png') }}" alt="Logo IKF" class="logo">
            <h1>Ikatan Keluarga Flobamora NTT Kabupaten Sorong</h1>
        </header>

        <!-- Menu -->
        <div class="menu-grid">
            <a href="{{ route('user.sejarah.index') }}" class="menu-item">
                <i class="bi bi-person-circle"></i>
                <p>Sejarah</p>
            </a>
            <a href="{{ route('user.visimisi.index') }}" class="menu-item">
                <i class="bi bi-lightbulb"></i>
                <p>Visi Misi</p>
            </a>
            <a href="{{ route('user.adArt.index') }}" class="menu-item">
                <i class="bi bi-file-text"></i>
                <p>AD/ART</p>
            </a>
            <a href="{{ route('user.strukturOrganisasi.index') }}" class="menu-item">
                <i class="bi bi-diagram-3"></i>
                <p>Struktur Organisasi</p>
            </a>
            <a href="{{ route('user.galeri.index') }}" class="menu-item">
                <i class="bi bi-images"></i>
                <p>Galeri</p>
            </a>
            <a href="{{ route('user.keanggotaan.index') }}" class="menu-item">
                <i class="bi bi-people"></i>
                <p>Keanggotaan</p>
            </a>
        </div>

        <!-- Artikel -->
        <div class="artikel-grid">
            @forelse($artikel as $item)
                <div class="artikel-item">
                    <!-- Gambar Artikel -->
                    @if($item->gambar)
                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" style="height: 150px; object-fit: cover;">
                    @else
                        <img src="{{ asset('images/default-image.png') }}" alt="Default Image" style="height: 150px; object-fit: cover;">
                    @endif

                    <!-- Konten Artikel -->
                    <div class="artikel-content">
                        <h3>{{ $item->judul }}</h3>
                        <p>{{ Str::limit($item->teks, 100, '...') }}</p>
                        <a href="{{ route('user.artikel.show', $item->id) }}" class="btn btn-primary btn-sm mt-2">Baca Selengkapnya</a>
                    </div>
                </div>
            @empty
                <p class="text-muted text-center">Belum ada artikel tersedia.</p>
            @endforelse
        </div>


        <!-- Informasi -->
        <footer class="info-section">
            <div class="info-grid">
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
    </div>
</body>
</html>
