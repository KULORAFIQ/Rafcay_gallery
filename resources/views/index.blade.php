<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rafcay_gallery</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome untuk ikon -->
    <style>
        /* Style untuk navbar dan judul */
        body {
            background-color: black;
            color: rgb(250, 250, 250);
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: stretch;
        }

        .navbar {
            background-color: #333;
            overflow: hidden;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            position: relative; /* Mengatur posisi relatif */
            z-index: 2; /* Mengatur z-index agar navbar berada di depan gambar */
        }

        .navbar h1 {
            margin: 0;
            cursor: pointer;
            overflow: hidden;
            white-space: nowrap;
            color: #FFA500; /* Warna teks */
            position: relative;
            display: inline-block;
            font-size: 24px;
        }

        .typing-animation {
            overflow: hidden;
            white-space: nowrap;
            border-right: 2px solid white; /* Tampilan kursor mengetik */
            animation: typing 5s steps(50, end) infinite alternate; /* Mengubah animasi ke maju dan mundur */
            width: 0;
            display: inline-block;
        }

        @keyframes typing {
            0% { width: 0; }
            100% { width: 100%; }
        }

        .navbar .menu-toggle {
            font-size: 24px;
            color: white;
            cursor: pointer;
            transition: transform 0.3s; /* Menambahkan transisi untuk ikon menu */
        }

        .navbar .menu-toggle.rotate {
            transform: rotate(90deg); /* Mengubah ikon menu saat menu terbuka */
        }

        .menu-container {
            position: absolute;
            top: 70px; /* Menyembunyikan menu di atas navbar */
            right: 20px; /* Menentukan posisi menu dari kanan */
            background-color: #333;
            padding: 10px;
            width: 200px;
            border-radius: 5px;
            display: none; /* Awalnya menu disembunyikan */
            z-index: 1; /* Mengatur z-index agar menu berada di bawah navbar */
        }

        .menu-container.show {
            display: block; /* Menampilkan menu saat class show aktif */
        }

        .menu-items a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
            transition: background-color 0.3s;
        }

        .menu-items a:hover {
            background-color: #555;
        }

        .title {
            text-align: center;
            font-size: 36px;
            margin-top: 20px;
            animation: color-change 3s infinite; /* Animasi pulsasi */
            font-weight: bold;
            font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif
        }

        @keyframes color-change {
  0% { color: red; }
  50% { color: blue; }
  100% { color: green; }
        }

        /* Tata letak unik untuk galeri */
        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); /* Mengatur lebar kolom */
            grid-gap: 20px; /* Jarak antara gambar */
            margin: 20px; /* Margin dari galeri */
        }

        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            cursor: pointer;
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Menyembunyikan potongan gambar yang berlebihan */
            transition: transform 0.5s ease; /* Efek transisi hover */
        }

        .gallery-item:hover img {
            transform: scale(1.1); /* Efek zoom in saat hover */
        }

        .gallery-item:before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5); /* Warna overlay */
            opacity: 0; /* Awalnya transparan */
            transition: opacity 0.5s ease; /* Efek transisi hover */
        }

        .gallery-item:hover:before {
            opacity: 1; /* Munculkan overlay saat hover */
        }

        .gallery-item:hover .image-text {
            opacity: 1; /* Munculkan teks saat hover */
        }

        .image-text {
            position: absolute;
            bottom: 10px; /* Jarak dari bawah */
            left: 50%;
            transform: translateX(-50%); /* Pusatkan horizontal */
            color: white;
            font-size: 18px;
            font-weight: bold;
            opacity: 0; /* Awalnya transparan */
            transition: opacity 0.5s ease; /* Efek transisi hover */
        }

        /* Style untuk pop-up detail gambar */
        .popup-container {
            display: none; /* Sembunyikan secara default */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7); /* Warna overlay */
            z-index: 999; /* Atur indeks z agar berada di atas elemen lain */
        }

        .popup-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #333;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }

        .popup-content img {
            max-width: 100%;
            max-height: 80vh;
            display: block;
            margin: 0 auto;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .popup-description {
            color: white;
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            color: white;
            font-size: 24px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h1><span  class="typing-animation" id="title1">Rafcay_Gallery</span></h1>
        <div class="menu-toggle" onclick="toggleMenu()">
            <i class="fas fa-bars"></i>
        </div>
    </div>

    <div class="title">Welcome to Rafcay Gallery</div> <!-- Judul di dalam body -->

    <div class="menu-container" id="menuContainer">
        <div class="menu-items">
            <a href="#">Home</a>
            <a href="#">Gallery</a>
            <a href="#">About</a>
            <a href="#">Contact</a>
            <a href="#">Create Gallery</a> <!-- Tombol Create Gallery -->
            <a href="{{ route('login') }}">Login</a>
            <a href="{{route('register')}}">register</a>
        </div>
    </div>

    <div class="gallery">
        <div class="gallery-item" onclick="showDetail('img/1.png', 'Image 1 Description')">
            <img src="{{ asset('img/1.png') }}" alt="Image 1">
            <div class="image-text">Image 1</div>
        </div>
        <div class="gallery-item" onclick="showDetail('img/2.png', 'Image 2 Description')">
            <img src="{{ asset('img/2.png') }}" alt="Image 2">
            <div class="image-text">Image 2</div>
        </div>
        <div class="gallery-item" onclick="showDetail('img/3.png', 'Image 3 Description')">
            <img src="{{ asset('img/3.png') }}" alt="Image 3">
            <div class="image-text">Image 3</div>
        </div>
        <div class="gallery-item" onclick="showDetail('img/4.png', 'Image 4 Description')">
            <img src="{{ asset('img/4.png') }}" alt="Image 4">
            <div class="image-text">Image 4</div>
        </div>
    </div>

    <!-- Popup Detail Gambar -->
    <div class="popup-container" id="popupContainer">
        <div class="popup-content">
            <span class="close-btn" onclick="hideDetail()">&times;</span>
            <img src="" alt="Image Detail" id="popupImage">
            <div class="popup-description" id="popupDescription"></div>
        </div>
    </div>

    <script>
        function toggleMenu() {
            var menuContainer = document.getElementById("menuContainer");
            var menuToggle = document.querySelector(".menu-toggle");

            menuContainer.classList.toggle("show");
            menuToggle.classList.toggle("rotate");
        }

        function showDetail(imageSrc, description) {
            var popupContainer = document.getElementById("popupContainer");
            var popupImage = document.getElementById("popupImage");
            var popupDescription = document.getElementById("popupDescription");

            popupImage.src = imageSrc;
            popupDescription.textContent = description;
            popupContainer.style.display = "block";
        }

        function hideDetail() {
            var popupContainer = document.getElementById("popupContainer");
            popupContainer.style.display = "none";
        }
    </script>
</body>
</html>
