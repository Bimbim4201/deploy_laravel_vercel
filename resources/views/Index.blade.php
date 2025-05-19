<!DOCTYPE html>
<html lang="id" data-theme="light">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>BalikModalin | {{ $title }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="css/Index.css" />
  </head>

  <body class="page-transition">
    <header class="navbar">
      <div class="left" style="display: flex; align-items: center; gap: 0.5rem;">
        <a href="/Index">
          <img src="img/Logo.png" alt="Logo BalikModalin" style="width: 40px; height: 40px; border-radius: 50%;">
        </a>
        <div class="logo">BalikModalin</div>
      </div>

      <nav class="nav-links">
        <a href="/Index"><i class="fas fa-home"></i> Beranda</a>
        <a href="/Informasi"><i class="fas fa-info-circle"></i> Informasi</a>
        <a href="/Belajar"><i class="fas fa-book"></i> Belajar</a>
        <a href="/Kalkulator"><i class="fas fa-calculator"></i> Kalkulator</a>
        <a href="/"><i class="fas fa-sign-out-alt"></i> Keluar</a>
      </nav>

    </header>

    <section class="hero">
      <div class="hero-text">
        <h1>HITUNG UNTUNGMU,<br>JANGAN ASAL JALAN!</h1>
        <p>BalikModalin bantu kamu kalkulasi usaha dengan pendekatan Kalkulus</p>
        <div class="buttons">
          <button onclick="window.location.href='/Kalkulator';" class="btn-primary"><i class="fas fa-calculator"></i> Coba Kalkulator</button>
          <button onclick="window.location.href='/Informasi';" class="btn-secondary"><i class="fas fa-circle-info"></i> Pelajari Lebih Lanjut</button>
        </div>
      </div>
      <div class="hero-img">
        <img src="img/Image.png" alt="Ilustrasi kalkulasi usaha" style="width: 600px; height: 600px; border-radius: 50%;">
      </div>
    </section>

    <section>
      <h2 class="section-title">Tentang BalikModalin</h2>
      <p class="section-subtext">BalikModalin adalah platform edukatif dan praktis yang dirancang untuk membantu pelaku usaha kecil menghitung strategi keuntungan secara matematis menggunakan konsep turunan dalam kalkulus. Dengan tiga kalkulator cerdas, pengguna dapat menghitung laba target, laba maksimum, dan titik balik modal dengan cepat. </p>
    </section>

    <section class="why-section">
      <h2 class="section-title">Mengapa harus BalikModalin?</h2>
      <div class="reasons">
        <div class="reason-box">Akurat Berdasarkan Rumus Kalkulus</div>
        <div class="reason-box">Mudah Digunakan Oleh Semua Usaha</div>
        <div class="reason-box">Tidak Perlu Ribet Instal Aplikasi & Gratis</div>
      </div>
    </section>

    <section>
      <h2 class="section-title">Fitur Unggulan</h2>
      <div class="features">
        <div class="feature-box">
          <strong>Kalkulator Balik Modal</strong>
          <p>Ketahui berapa barang yang harus terjual untuk balik modal (impas).</p>
        </div>
        <div class="feature-box">
          <strong>Kalkulator Target Laba</strong>
          <p>Hitung berapa banyak barang yang perlu dijual untuk mencapai keuntungan tertentu.</p>
        </div>
        <div class="feature-box">
          <strong>Kalkulator Laba Maksimum</strong>
          <p>Hitung potensi laba maksimum dari modal yang dimiliki.</p>
        </div>
      </div>
    </section>

  <!-- Footer -->
    <footer class="footer">
      <!-- Kolom 1 -->
      <div class="footer-column">
        <div class="footer-header">
          <div class="footer-logo">
            <img src="img/Logo.png" alt="Logo" style="width: 40px; height: 40px; border-radius: 50%;">
            <span>BalikModalin</span>
          </div>
        </div>
        <div class="footer-content">
          <p>Platform kalkulasi laba sederhana berbasis konsep kalkulus. Membantu pelaku usaha memahami titik untung, balik modal, dan potensi laba hanya dalam beberapa klik.</p>
        </div>
      </div>
    
      <!-- Kolom 2 -->
      <div class="footer-column">
        <div class="footer-header">
          <h4>Kontak Kami</h4>
        </div>
        <div class="footer-content">
          <p><i class="fas fa-map-marker-alt"></i> Jl. Mugarsari, Kec. Tamansari, Kota Tasikmalaya, Prov. Jawa Barat 46196</p>
          <p><i class="fas fa-phone"></i> +62 813-1244-9168</p>
          <p><i class="fas fa-envelope"></i> balikmodalin25@gmail.com</p>
        </div>
      </div>

      <!-- Kolom 3 -->
      <div class="footer-column">
        <div class="footer-header">
          <h4>Media Sosial</h4>
        </div>
        <div class="footer-content sosial-media">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-x-twitter"></i></a>
          <a href="#"><i class="fab fa-youtube"></i></a>
        </div>
      </div>
    </footer>

  <!-- Footer bawah -->
    <div class="footer-bottom">
      <div class="footer-bottom-left">
        © 2025 BalikModalin. Hak Cipta Dilindungi
      </div>
      <div style="display: flex; gap: 1rem;">
        <a href="#" style="color: #ccc; text-decoration: none;">Kebijakan Privasi</a>
        <a href="#" style="color: #ccc; text-decoration: none;">Syarat & Ketentuan</a>
      </div>
    </div>

    <!-- Script untuk transisi dan tema -->
    <script>
      function toggleTheme() {
        const html = document.documentElement;
        const currentTheme = html.getAttribute("data-theme");
        html.setAttribute("data-theme", currentTheme === "dark" ? "light" : "dark");
      }

      document.addEventListener("DOMContentLoaded", () => {
        const body = document.body;
        body.classList.add("page-transition");

        setTimeout(() => {
          body.classList.add("active");
        }, 10);

        // Efek transisi halaman internal
        document.querySelectorAll("a[href]").forEach(link => {
          const url = new URL(link.href);
          if (url.hostname === location.hostname && !link.hasAttribute("target")) {
            link.addEventListener("click", function (e) {
              e.preventDefault();
              const href = this.getAttribute("href");
              document.body.classList.remove("active");
              setTimeout(() => {
                window.location.href = href;
              }, 300);
            });
          }
        });
      });
  
    </script>
  </body>
</html>

{{-- ----------------------------------------------------------------------------------------------------------------------- --}}



