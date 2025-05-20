<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> BEP | BalikModalin </title>
  <link rel="icon" type="image/x-icon" href="img/Logo.png">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
  <link rel="stylesheet" href="css/HitungBalikModal.css">
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
  Cari tahu kapan kamu balik modal!
</div>
<main>
  <div class="form-card" data-aos="fade-right">
    <form method="POST" action="{{ route('balikmodal.store') }}">
      @csrf
    <div class="hasil-box" id="hasil">
      -
    </div>

    <label>Biaya Tetap (Rp)</label>
    <input type="number" name="biaya_tetap" id="biaya_tetap" required autofocus placeholder="ex. Harga jual lisensi software Rp 10.000.000">

    <label>Biaya per Unit (Rp)</label>
    <input type="number" name="biaya_per_unit" id="biaya_per_unit" required placeholder="ex. Biaya variable per lisensi Rp 50.000">

    <label>Harga Jual per Unit (Rp)</label>
    <input type="number" name="harga_jual" id="harga_jual" required placeholder="ex. Harga jual per lisensi Rp 200.000">

      <input type="hidden" name="hasil_input" id="hasil_input">

      <button type="button" onclick="hitung()">🔍 Hitung</button>
      <button type="submit">💾 Simpan</button>
      <button type="button" onclick="unduhHasil()">📥 Unduh Hasil</button>
  </form>
    </div>

  <div class="visualisasi-wrapper" data-aos="fade-left">
    <div class="visualisasi">
      <div class="grafik-card">
        <h3>Visualisasi Input</h3>
        <hr>
        <canvas id="inputChart"></canvas>
      </div>
      <div class="grafik-card">
        <h3>Visualisasi Target</h3>
        <hr>
        <canvas id="grafikHitung"></canvas>
      </div>
    </div>
  </div>
</main>



<script>

  // revisi 1
  // Tambah label di semua inputan di atas (di file html)
  // Tambah copy paste css selector label dan selector input dari file Targetlaba.css (di file css)
  // revisi 1 selesai

  let inputChart, grafikChart;

  function hitung() {
    const biayaTetap = parseFloat(document.getElementById("biaya_tetap").value);
    const biayaPerUnit = parseFloat(document.getElementById("biaya_per_unit").value);
    const hargaJual = parseFloat(document.getElementById("harga_jual").value);
    const hasilDiv = document.getElementById("hasil");

    

    // revisi 2
    // (Tukar tempat) validator cek input harus lebih dulu, karena kalo langsung cek pake contoh !biayaTetap ketika input '0' outputnya adalah 'semua kolom wajib diisi' yg mana gak nyambung.
    // Tambah harga jual per unit harus lebih besar dari biaya per unit biar bisa balik modal
    if (biayaTetap <= 0 || hargaJual <= 0 || biayaPerUnit <= 0) {
        hasilDiv.innerHTML = `<span style="color:red;">Semua input harus lebih dari 0.</span>`;
        return;
      }

    if (!biayaTetap || !biayaPerUnit || !hargaJual) {
      hasilDiv.innerHTML = '<span style="color:red;">Semua input wajib diisi!</span>';
      return;
    }

    if (hargaJual <= biayaPerUnit) {
        hasilDiv.innerHTML = `<span style="color:red;">Harga Jual per Unit harus lebih besar dari Biaya per Unit agar bisa balik modal</span>`;
        return;
      }

    // revisi 2 selesai
    
    const contributionMargin = hargaJual - biayaPerUnit;
    if (contributionMargin <= 0) {
      hasilDiv.innerHTML = '<span style="color:red;">Harga jual harus lebih besar dari biaya variabel!</span>';
      return;
    }

    const breakEven = Math.ceil(biayaTetap / contributionMargin);

    hasilDiv.innerHTML = `Balik Modal setelah jual <strong>${breakEven}</strong> unit.`;

    updateInputChart(biayaTetap, biayaPerUnit, hargaJual);
    // Simpan hanya angka breakEven
    document.getElementById("hasil_input").value = breakEven;
    updateGrafikHitung(biayaTetap, biayaPerUnit, hargaJual, breakEven);
  }

  function updateInputChart(biayaTetap, biayaPerUnit, hargaJual) {
    const ctx = document.getElementById('inputChart').getContext('2d');
    if (inputChart) inputChart.destroy();

    inputChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Biaya per Unit', 'Harga per Unit', 'Biaya Tetap'],
        datasets: [{
          label: 'Rp',
          data: [biayaPerUnit, hargaJual, biayaTetap],
          backgroundColor: ['#60a5fa', '#34d399', '#f87171']
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: { beginAtZero: true }
        }
      }
    });
  }

  function updateGrafikHitung(biayaTetap, biayaPerUnit, hargaJual, breakEven) {
    const ctx = document.getElementById('grafikHitung').getContext('2d');
    if (grafikChart) grafikChart.destroy();

    const dataPoints = Array.from({ length: breakEven + 5 }, (_, i) => i);
    const revenue = dataPoints.map(x => x * hargaJual);
    const cost = dataPoints.map(x => biayaTetap + x * biayaPerUnit);

    grafikChart = new Chart(ctx, {
      type: 'scatter',
      data: {
        datasets: [
          {
            label: 'Pengeluaran',
            data: dataPoints.map((x, i) => ({ x: x, y: cost[i] })),
            borderColor: '#f87171',
            showLine: true,
            fill: false,
            pointRadius: 3
          },
          {
            label: 'Pendapatan',
            data: dataPoints.map((x, i) => ({ x: x, y: revenue[i] })),
            borderColor: '#60a5fa',
            showLine: true,
            fill: false,
            pointRadius: 3
          },
          {
            label: 'Break Even',
            data: [{ x: breakEven, y: biayaTetap + biayaPerUnit * breakEven }],
            backgroundColor: '#ef4444',
            borderColor: '#ef4444',
            pointRadius: 6,
            type: 'scatter'
          }
        ]
      },
      options: {
        responsive: true,
        plugins: {
          legend: { position: 'top' },
          title: { display: false }
        },
        scales: {
          x: { title: { display: true, text: 'Jumlah Unit' } },
          y: { title: { display: true, text: 'Rp' } }
        }
      }
    });
  }

  function unduhHasil() {
    const biaya = document.getElementById("biaya_tetap").value;
    const unit = document.getElementById("biaya_per_unit").value;
    const jual = document.getElementById("harga_jual").value;
    const output = document.getElementById("hasil").innerText;

    const isi = `Biaya Tetap: Rp${biaya}\nBiaya per Unit: Rp${unit}\nHarga Jual: Rp${jual}\n\n${output}`;
    const blob = new Blob([isi], { type: 'text/plain' });
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = "hasil_Balik_modal.txt";
    a.click();
    URL.revokeObjectURL(url);
  }

  // revisi  3
  // validator input gk akan bisa simbol -, +, e
  document.querySelectorAll('input[type=number]').forEach(input => {
      input.addEventListener('keydown', function(e) {
        if (e.key === '-' || e.key === '+' || e.key.toLowerCase() === 'e') {
          e.preventDefault();
        }
      });
    });
  // revisi 3 selesai

</script>

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