<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Target Laba - BalikModalin</title>
  <link rel="icon" type="image/x-icon" href="img/Logo.png">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="css/Riwayat.css">
</head>
<body class="page-transition">

<header>
    <div class="left" style="display: flex; align-items: center; gap: 0.5rem;">
      <a href="/Index">
        <img src="img/Logo.png" alt="Logo BalikModalin" style="width: 40px; height: 40px; border-radius: 50%;">
      </a>
      <h1 class="logo">BalikModalin</h1>
    </div>
  <div class="hamburger" id="hamburger-button">
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
  </div>
</header>
<div class="menu" id="mobile-menu">
  <a href="/Kalkulator"><strong>Kalkulator</strong></a>
  <a href="/HitungBalikModal">Balik Modal</a>
  <a href="/TargetLaba">Target Laba</a>
  <a href="/LabaMaksimum">Laba Maksimum</a>
  <a href="/Riwayat">Riwayat</a>
</div>

<div class="menu-overlay" id="menu-overlay"></div>
<script>
  // Menu Hamburger Functionality
  const hamburger = document.getElementById('hamburger-button');
  const mobileMenu = document.getElementById('mobile-menu');
  const menuOverlay = document.getElementById('menu-overlay');
  let isMenuOpen = false;
  
  hamburger.addEventListener('click', function(e) {
    e.stopPropagation();
    this.classList.toggle('open');
    mobileMenu.classList.toggle('active');
    menuOverlay.classList.toggle('active');
    isMenuOpen = !isMenuOpen;
  });
  
  document.addEventListener('click', function(e) {
    if (isMenuOpen && !mobileMenu.contains(e.target) && e.target !== hamburger) {
      hamburger.classList.remove('open');
      mobileMenu.classList.remove('active');
      menuOverlay.classList.remove('active');
      isMenuOpen = false;
    }
  });
  
  menuOverlay.addEventListener('click', function() {
    hamburger.classList.remove('open');
    mobileMenu.classList.remove('active');
    menuOverlay.classList.remove('active');
    isMenuOpen = false;
  });
// Hamburger Menu Functionality End
</script>


    <div class="subtext" data-aos="fade-up">
        Riwayat Penghitungan Kalkulator Balik Modal
        </div>

        <div class="card-container">
            @forelse($BalikModal as $index => $item)
                <div class="riwayat-card" data-aos="fade-up">
                    <h3>Balik Modal #{{ $index + 1 }}</h3>
                    <p><strong>Biaya Tetap:</strong> Rp {{ number_format($item->biaya_tetap) }}</p>
                    <p><strong>Biaya per Unit:</strong> Rp {{ number_format($item->biaya_per_unit) }}</p>
                    <p><strong>Harga Jual:</strong> Rp {{ number_format($item->harga_jual) }}</p>
                    <p><strong>Balik Modal:</strong> Terjual {!! nl2br(e($item->hasil_input)) !!} Unit</p>
                    <p><strong></strong> {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y, H:i') }}</p>
                </div>
            @empty
                <p class="no-data" data-aos="fade-up">Belum ada riwayat</p>
            @endforelse
        </div>

        <div class="subtext" data-aos="fade-up">
        Riwayat Penghitungan Kalkulator Target Laba
        </div>

            <div class="card-container">
                @forelse($Riwayat as $index => $item)
                    <div class="riwayat-card" data-aos="fade-up">
                        <h3>Target Laba #{{ $index + 1 }}</h3>
                        <p><strong>Biaya:</strong> Rp {{ number_format($item['biaya']) }}</p>
                        <p><strong>Harga Jual:</strong> Rp {{ number_format($item['harga_jual']) }}</p>
                        <p><strong>Laba Target:</strong> Rp {{ number_format($item['laba']) }}</p>
                        <p><strong>Target Jual:</strong> {{ $item['jumlah_barang'] }} Unit</p>
                        <p><strong></strong> {{ \Carbon\Carbon::parse($item['created_at'])->translatedFormat('d F Y, H:i') }}</p>
                    </div>
                @empty
                    <p class="no-data" data-aos="fade-up">Belum ada riwayat</p>
                @endforelse
            </div>

        <div class="subtext" data-aos="fade-up">
        Riwayat Penghitungan Kalkulator Laba Maksimum
        </div>

            <div class="card-container">
                @forelse($LabaMaksimum as $index => $row)
                    <div class="riwayat-card" data-aos="fade-up">
                        <h3>Laba Maksimum #{{ $index + 1 }}</h3>
                        <p><strong>Biaya Tetap:</strong> Rp {{ number_format($row['biaya_tetap']) }}</p>
                        <p><strong>Biaya Variabel:</strong> Rp {{ number_format($row['biaya_variabel']) }}</p>
                        <p><strong>Harga Awal:</strong> Rp {{ number_format($row['harga_awal']) }}</p>
                        <p><strong>Penurunan Harga:</strong> Rp {{ number_format($row['penurunan_harga']) }}</p>
                        <p><strong>Perhitungan:</strong><br>{!! nl2br(e($row['hasil_input'])) !!}</p>
                        <p><strong></strong> {{ \Carbon\Carbon::parse($row['created_at'])->translatedFormat('d F Y, H:i') }}</p>
                    </div>
                @empty
                    <p class="no-data" data-aos="fade-up">Belum ada riwayat</p>
                @endforelse
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
