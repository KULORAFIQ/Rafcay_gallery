<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome untuk ikon -->
    <link rel="stylesheet" href="{{ asset('css/gallery.css') }}"> <!-- Load CSS untuk galeri -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #292929; /* Ubah warna latar belakang */
            color: white; /* Warna teks putih */
        }

        .navbar {
            background-color: #333;
            color: white;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h1 {
            overflow: hidden;
            white-space: nowrap;
            border-right: 2px solid white; /* Tampilan kursor mengetik */
            animation: typing 5s steps(10, end) infinite alternate forwards; /* Mengubah animasi ke maju dan mundur */
            width: 0;
            display: inline-block;
        }

        @keyframes typing {
            from { width: 0; } /* Mulai dari lebar 0 */
            to { width:   6%; } /* Menuju lebar penuh */
        }

        @keyframes blink {
            0% { opacity: 1; }
            50% { opacity: 0; }
            100% { opacity: 1; }
        }

        .navbar nav ul {
            margin: 0;
            padding: 0;
            list-style: none;
            display: flex;
        }

        .navbar nav ul li {
            margin-right: 20px;
        }

        .navbar nav ul li:last-child {
            margin-right: 0;
        }

        .navbar nav ul li a {
            color: white;
            text-decoration: none;
        }

        .navbar nav ul li a:hover {
            color: #FFA500;
        }

        .logout-button {
            background-color: #555;
            color: white;
            padding: 8px 16px;
            border-radius: 5px;
            text-decoration: none;
        }

        .logout-button:hover {
            background-color: #777;
        }

        .logout-button i {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h1>Gallery</h1>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="{{ route('foto.index') }}">Foto</a></li>
                <li><a href="{{ route('album.index') }}">album</a></li>
                <li><a class="logout-button" href="{{ route('login') }}"> <i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </nav>
    </div>

    <div class="gallery">
        <h1>hallo,</h1>
        <div class="gallery-item">
            <img src="{{ asset('img/image1.jpg') }}" alt="Image 1">
            <div class="overlay">
                <div class="overlay-content">
                    <i class="fas fa-search"></i> View Details
                </div>
            </div>
        </div>
        <!-- Tambahkan gambar lainnya di sini -->
    </div>

    <script src="{{ asset('js/app.js') }}"></script> <!-- Load JavaScript -->
</body>
</html>
