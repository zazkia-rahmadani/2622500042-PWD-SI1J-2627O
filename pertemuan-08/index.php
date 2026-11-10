<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'beranda';
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MANISE Dessert Cake</title>
    <link rel="stylesheet" href="style.css?v=2">
</head>

<body>

    <div class="container">

        <!-- HEADER -->
        <header class="header">
            <div class="logo">
                <img src="images/logo.png" alt="Logo MANISE"
                    onerror="this.style.display='none'">
            </div>

            <div class="header-text">
                <h1>MANISE</h1>
                <p>Sweet Moments, Sweet Memories</p>
                <span>Dessert Cake & Bakery</span>
            </div>
        </header>

        <!-- NAVIGASI -->
        <div class="main-layout">

            <nav class="navigasi">
                <h3>MENU</h3>

                <ul>
                    <li>
                        <a href="index.php?page=beranda">🏠 Beranda</a>
                    </li>

                    <li>
                        <a href="index.php?page=profile">👩 Profile</a>
                    </li>

                    <li>
                        <a href="index.php?page=pendaftaran">📝 Pendaftaran</a>
                    </li>
                </ul>

                <div class="nav-info">
                    <h4>MANISE CAKE</h4>
                    <p>Made with love, served with sweetness.</p>
                </div>
            </nav>

            <!-- KONTEN -->
            <main class="konten">

                <?php

                if ($page == 'beranda') {
                    include __DIR__ . '/beranda.php';
                } elseif ($page == 'profile') {
                    include __DIR__ . '/profile.php';
                } elseif ($page == 'pendaftaran') {
                    include __DIR__ . '/pendaftaran.php';
                } else {
                    echo "<h2>Halaman tidak ditemukan</h2>";
                }
                ?>

            </main>

        </div>

        <!-- FOOTER -->
        <footer class="footer">
            <p>©2622500042_Zazkia Rahmadani_SI1J_UTS Pemrograman Web Dasar.</p>
            <p>MANISE Dessert Cake | Sweetness in Every Bite ♡</p>
        </footer>

    </div>

    <script src="script.js"></script>

</body>

</html>