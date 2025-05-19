<!DOCTYPE html>
<html lang="id" data-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BalikModalin | {{ $title }}</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="css/Informasi.css"> 
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
    <h2>Tentang BalikModalin</h2>
    <p>BalikModalin adalah alat bantu online untuk menghitung laba, menentukan target penjualan, dan mengetahui titik balik modal...</p>
  </section>

  <section class="features">
    <h2>Fitur Kalkulator di BalikModalin</h2>
  <div class="timeline">
    <div class="timeline-item left">
      <a href="/LabaMaksimum" class="timeline-circle">01</a>
      <h3>Kalkulator Balik Modal</h3>
      <p>Ketahui berapa barang yang harus terjual untuk balik modal (impas)</p>
    </div>
    <div class="timeline-item right">
      <a href="/TargetLaba" class="timeline-circle">02</a>
      <h3>Kalkulator Target Laba</h3>
      <p>Hitung berapa banyak barang yang perlu dijual untuk mencapai target keuntungan tertentu</p>
    </div>
    <div class="timeline-item left">
      <a href="/HitungBalikModal" class="timeline-circle">03</a>
      <h3>Kalkulator Laba Maksimum</h3>
      <p>Hitung potensi laba maksimum dari modal yang dimiliki</p>
    </div>
  </div>

    <div class="summary">
      <div>
        500+<br>Pegguna Aktif
      </div>
      <div>
        300+<br>Usaha Terbantu
      </div>
    </div>
  </section>

  <section class="how-it-works">
    <h2>Cara Kerja BalikModalin</h2>
    <p>Berikut Tahapan dan juga proses perhitungan BalikModalin</p>
  </section>

  <section class="steps">
    <div class="step" data-step="1">
      <div>
        <h3>Memahami Pedoman Penggunaan</h3>
        <p>
          <a href="#">Pergi</a> ke halaman Pedoman Penggunaan
        </p>
      </div>
    </div>
    <div class="step" data-step="2">
      <div>
        <h3>Pilih Kalkulator</h3>
        <p>Sesuaikan dengan kebutuhan (Kalkulator Balik Modal, Target Laba, dan Laba Maksimum)</p>
      </div>
    </div>
    <div class="step" data-step="3">
      <div>
        <h3>Input Data Usaha</h3>
        <p>Pengguna memasukan seluruh inputan berdasarkan kalkulator yang dipilih</p>
      </div>
    </div>
    <div class="step" data-step="4">
      <div>
        <h3>Klik Hitung</h3>
        <p>Dapatkan hasil langsung tanpa perlu instalasi tambahan</p>
      </div>
    </div>
    <div class="step" data-step="5">
      <div>
        <h3>Baca Hasil & Insight</h3>
        <p>Nikmati penjelasan hasil secara otomatis dan mudah dimengerti</p>
      </div>
    </div>
    <div class="step" data-step="6">
      <div>
        <h3>Unduh Hasil</h3>
        <p>Unduh hasil dalam format txt untuk referensi di lain waktu</p>
      </div>
    </div>
    <div class="step" data-step="7">
      <div>
        <h3>Riwayat Hasil</h3>
        <p>Semua hasil yang pernah dihitung akan tersimpan di dalam akun pengguna</p>
      </div>
    </div>
  </section>

  <section class="faq">
    <h2>Pertanyaan Umum (FAQ)</h2>
    <div class="faq-item" onclick="toggleFaq(this)">
      <div class="faq-question">
        Apakah saya perlu punya latar belakang di bidang ekonomi atau matematika untuk menggunakan BalikModalin?
        <span class="faq-toggle">▼</span>
      </div>
      <div class="faq-answer">
        Tidak, Anda tidak perlu latar belakang khusus. BalikModalin dirancang agar mudah digunakan siapa saja!
      </div>
    </div>
    <div class="faq-item" onclick="toggleFaq(this)">
      <div class="faq-question">
        Bagaimana jika saya tidak tahu harga beli per satuan barang?
        <span class="faq-toggle">▼</span>
      </div>
      <div class="faq-answer">
        Anda dapat memperkirakan harga satuan rata-rata atau memasukkan total biaya dibagi jumlah unit.
      </div>
    </div>
  </section>

  <section class="tim-balikmodalin">
    <h1 class="timbalikmodalin">Tim BalikModalin</h1>
    <p>Mengenal lebih dekat dengan tim hebat yang berdedikasi <br>
      untuk mengembangkan solusi berkelanjutan.</p>
  </section>

  <section class="team">
    <div class="team-members">
      <div class="member">
        <img src="img/Bila.jpg" alt="Anggota Tim 1">
        <h3>Nabila Rohmatul A.</h3>
        <h4>KETUA TIM</h4>
        <p>Memimpin dan mengkoordinasikan seluruh aspek pengembangan website.</p>
      </div>
      <div class="member">
        <img src="img/Nadiaz.jpg" alt="Anggota Tim 2">
        <h3>M. Zaki Zaidan B.</h3>
        <h4>FRONTEND DEVELOPER</h4>
        <p>Pengembangan Antarmuka Pengguna</p>
      </div>
      <div class="member">
        <img src="img/Hans.jpg" alt="Anggota Tim 3">
        <h3>Khansa Rasendriya A.</h3>
        <h4>FRONTEND DEVELOPER</h4>
        <p>Pengembangan Antarmuka Pengguna</p>
      </div>
      <div class="member">
        <img src="img/Sigma.jpg" alt="Anggota Tim 2">
        <h3>Bimantara P. Jatnika</h3>
        <h4>BACKEND DEVELOPER</h4>
        <p>Pengembangan Backend dan Infrastruktur Sistem</p>
      </div>
      <div class="member">
        <img src="img/Adit.jpg" alt="Anggota Tim 3">
        <h3>Aditya Ihsan M.</h3>
        <h4>UI/UX DESIGNER</h4>
        <p>Perancangan pengalaman dan tampilan antarmuka pengguna</p>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer">
    <!-- Kolom 1 -->
    <div class="footer-column">
      <div class="footer-header">
        <div class="footer-logo">
          <img src="../img/Logo.png" alt="Logo" style="width: 40px; height: 40px; border-radius: 50%;">
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
        <p><i class="fas fa-phone"></i> +62 123-4567-8901</p>
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

  <script>
    // Toggle menu untuk mobile
    const menuToggle = document.getElementById('menuToggle');
    const navLinks = document.getElementById('navLinks');
    
    menuToggle.addEventListener('click', function() {
      navLinks.classList.toggle('active');
      // Mengubah ikon menu toggle
      const icon = menuToggle.querySelector('i');
      if (navLinks.classList.contains('active')) {
        icon.classList.remove('fa-bars');
        icon.classList.add('fa-times');
      } else {
        icon.classList.remove('fa-times');
        icon.classList.add('fa-bars');
      }
    });
    
    // Toggle FAQ
    function toggleFaq(el) {
      el.classList.toggle("active");
    }
    
    // Close menu jika klik di luar menu
    document.addEventListener('click', function(event) {
      const isClickInsideMenu = navLinks.contains(event.target);
      const isClickOnMenuToggle = menuToggle.contains(event.target);
      
      if (!isClickInsideMenu && !isClickOnMenuToggle && navLinks.classList.contains('active')) {
        navLinks.classList.remove('active');
        const icon = menuToggle.querySelector('i');
        icon.classList.remove('fa-times');
        icon.classList.add('fa-bars');
      }
    });
  </script>
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