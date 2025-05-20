<!DOCTYPE html>
<html lang="id" data-theme="light">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>BalikModalin | {{ $title }}</title>
  <link rel="icon" type="image/x-icon" href="img/Logo.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
  <link rel="stylesheet" href="css/Kalkulator.css" />
  
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
      <a href="/LoginPage"><i class="fas fa-sign-out-alt"></i> Keluar</a>
    </nav>
  </header>

  <main>
    <h1 data-aos="fade">Pilih Kalkulatormu!</h1>
    <div class="calculator-buttons">
    <a href="/HitungBalikModal"><div data-aos="fade-right"><strong><h4>KALKULATOR BALIK MODAL</h4></strong>
        <p>Ketahui berapa barang yang harus terjual untuk balik modal (impas).</p>
    </div></a> 
    <a href="/TargetLaba"><div data-aos="fade-up"><strong><h4>KALKULATOR TARGET LABA</h4></strong>
        <p>Hitung berapa banyak barang yang perlu dijual untuk mencapai keuntungan tertentu.</p>
    </div></a>
    <a href="/LabaMaksimum"><div data-aos="fade-left"><strong><h4>KALKULATOR LABA MAKSIMUM</h4></strong>
        <p>Hitung potensi laba maksimum dari modal yang dimiliki.</p>
      </div></a>
    </div>
  </main>

   <!-- Footer -->
    <footer class="footer" data-aos="fade-up">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
  AOS.init({
    duration: 800,
    once: true,
});
</script>
  </body>
</html>