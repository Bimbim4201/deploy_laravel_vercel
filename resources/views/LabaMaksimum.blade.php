<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title }} | BalikModalin</title>
  <link rel="icon" type="image/x-icon" href="img/Logo.png">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="css/LabaMaksimum.css">
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

  <main>
    <h1 data-aos="fade-up">Dapati Analisis Rancangan Bisnismu Laba atau Rugi!</h1>
<form action="{{ route('LabaMaksimum.store') }}" method="POST">
  @csrf
    <div class="content">
      <div class="card form" data-aos="fade-right">
        <div id="hasilBox">
          -
        </div>

        <div class="form-group">

          <label>Biaya Tetap (Rp) </label>
          <input type="number" id="biaya_tetap" name="biaya_tetap"  placeholder="ex. Biaya tetap Produksi Handphone Rp 50.000.000">
          
          <label>Biaya per Unit (Rp) </label>
          <input type="number" id="biaya_variabel" name="biaya_variabel" placeholder="ex. Biaya variable per unit Rp 400.000">
          
          <label>Harga Jual per Unit (Rp) </label>
          <input type="number" id="harga_awal" name="harga_awal" placeholder="ex. Harga jual per unit (awal) Rp 1.000.000">
          
          <label>Penurunan Harga per Unit (Rp) </label>
          <input type="number" id="penurunan_harga" name="penurunan_harga" placeholder="ex. Penurunan harga per unit Rp 5.000">
        </div>

      <input type="hidden" id="hasil_input" name="hasil_input">
      <button type="button" onclick="prosesHitung()">🔍 Hitung</button>
      <button type="button" onclick="hitungDanSubmit()">💾 Simpan</button>
      <button type="button" onclick="unduhHasil()">📥 Unduh Hasil</button>
      </div>

      <div class="card visual" data-aos="fade-left">
        <div class="chart-area">
          <div class="chart-box">
            <div class="chart-title">Visualisasi Input</div>
            <canvas id="inputChart"></canvas>
          </div>
          <div class="chart-box">
            <div class="chart-title">Visualisasi Grafik Hitung</div>
            <canvas id="hasilChart"></canvas>
          </div>
        </div>
      </div>
    </div>
    </form>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    function hitungDanSubmit() {
      prosesHitung();
      setTimeout(() => {
        sisipkanHasil();
        document.querySelector("form").submit();
        document.querySelector('.chart-area').scrollIntoView({ behavior: 'smooth' });
      }, 300);
    }
  
    function sisipkanHasil() {
      const hasilText = document.getElementById("hasilBox").innerText;
      document.getElementById("hasil_input").value = hasilText;
    }

    function handleFormSubmit() {
      sisipkanHasil(); // isi input tersembunyi sebelum kirim form
      return true;     // lanjutkan pengiriman form
    }
  // revisi 1
  // Tambah label di semua inputan di atas (di file html)
  // Tambah copy paste css selector label dan selector input dari file Targetlaba.css (di file css)
  // revisi 1 selesai

    let inputChart, hasilChart;

    function hitungLabaMaksimum(bt, bv, ha, ph) {
      const produksiOptimal = (ha - bv) / (2 * ph);
      const hargaOptimal = ha - ph * produksiOptimal;
      const labaMaksimum = (hargaOptimal * produksiOptimal) - (bt + bv * produksiOptimal);
      return { produksiOptimal, hargaOptimal, labaMaksimum };
    }

    function prosesHitung() {
      const bt = parseFloat(document.getElementById("biaya_tetap").value);
      const bv = parseFloat(document.getElementById("biaya_variabel").value);
      const ha = parseFloat(document.getElementById("harga_awal").value);
      const ph = parseFloat(document.getElementById("penurunan_harga").value);
      const hasilBox = document.getElementById("hasilBox");
      
      // revisi 2
      // (Tukar urutan) karena kalo cek isNaN dulu, ketika input '0' output 'semua input harus diisi', makanya ganti urutan, cek angka nol dulu.
      // Tambah harga jual hrs lebih besar dari biaya per unit
      // Tambah penurunan harga gak boleh melebihi harga per unit
      // Tambah harga optimal gak boleh negatif
      if (bt <= 0 || ha <= 0 || bv <= 0 || ph <= 0) {
        hasilBox.innerHTML = `<span style="color:red;">Semua input harus lebih dari 0.</span>`;
        return;
      }

      if (isNaN(bt) || isNaN(bv) || isNaN(ha) || isNaN(ph)) {
        hasilBox.innerHTML = '<span style="color:red">Semua input wajib diisi!</span>';
        updateInputChart(0, 0, 0, 0);
        updateHasilChart([], 0, 0, 0, 0);
        return;
      }

      if (ha < bv) {
        hasilBox.innerHTML = `<span style="color:red;">Harga Jual per Unit harus lebih besar dari Biaya per Unit.</span>`;
        return;
      }
      
      if (ph >= ha) {
        hasilBox.innerHTML = `<span style="color:red;">Penurunan Harga per Unit tidak boleh lebih besar atau sama dengan Harga Jual per Unit.</span>`;
        return;
      }

      const produksiUji = (ha - bv) / (2 * ph);
      const hargaOptimalUji = ha - ph * produksiUji;
      
      if (hargaOptimalUji < 0) {
        hasilBox.innerHTML = `<span style="color:red;">
          Kombinasi input menyebabkan harga optimal menjadi negatif.<br>
          Harap sesuaikan Harga Jual per Unit atau Penurunan Harga per Unit .
          </span>`;
        return;
      }
    
    //revisi 2 selesai

      const hasil = hitungLabaMaksimum(bt, bv, ha, ph);
      const label = hasil.labaMaksimum >= 0 ? "Laba Maksimum" : "Rugi Minimum";

      hasilBox.innerHTML = `
        Produksi Optimal: ${Math.floor(hasil.produksiOptimal).toLocaleString()} unit<br>
        Harga Optimal: Rp ${Math.floor(hasil.hargaOptimal).toLocaleString()}<br>
        ${label}: Rp ${Math.floor(hasil.labaMaksimum).toLocaleString()}
      `;

      updateInputChart(ph, bv, ha, bt);
      updateHasilChart(bt, bv, ha, ph, hasil.produksiOptimal);
    }

    function updateInputChart(ph, bv, ha, bt) {
      const ctx1 = document.getElementById('inputChart').getContext('2d');
      if (inputChart) inputChart.destroy();

      inputChart = new Chart(ctx1, {
        type: 'bar',
        data: {
          labels: ['Penurunan Harga', 'Biaya per Unit', 'Harga Jual per Unit', 'Biaya Tetap'],
          datasets: [{
            label: 'Nilai (Rp)',
            data: [ph, bv, ha, bt],
            backgroundColor: '#9ca3af'
          }]
        },
        options: {
          plugins: { legend: { display: false } },
          scales: { y: { beginAtZero: true } }
        }
      });
    }

    function updateHasilChart(bt, bv, ha, ph, produksiOptimal) {
      const ctx2 = document.getElementById('hasilChart').getContext('2d');
      if (hasilChart) hasilChart.destroy();

      const dataLaba = [];
      for (let x = 0; x <= produksiOptimal * 2; x += Math.max(1, produksiOptimal / 10)) {
        const harga = ha - ph * x;
        const labaTemp = (harga * x) - (bt + bv * x);
        dataLaba.push({ x: x, y: labaTemp });
      }

      hasilChart = new Chart(ctx2, {
        type: 'scatter',
        data: {
          datasets: [
            {
              label: 'Laba/Rugi',
              data: dataLaba,
              showLine: true,
              borderColor: '#6b7280',
              backgroundColor: '#6b7280',
            },
            {
              label: 'Puncak',
              data: [{ x: produksiOptimal, y: dataLaba.find(d => d.x === produksiOptimal)?.y || 0 }],
              backgroundColor: 'red',
              pointRadius: 6
            }
          ]
        },
        options: {
          scales: {
            x: { title: { display: true, text: 'Unit' } },
            y: { title: { display: true, text: 'Laba/Rugi (Rp)' } }
          }
        }
      });
    }

    function unduhHasil() {
    const biaya = document.getElementById("biaya_tetap").value;
    const variabel = document.getElementById("biaya_variabel").value;
    const HAwal = document.getElementById("harga_awal").value;
    const turunH = document.getElementById("penurunan_harga").value;
    const output = document.getElementById("hasilBox").innerText;

    const isi = `Biaya Tetap: Rp${biaya}\nBiaya Variabel: Rp${variabel}\nHarga Awal: Rp${HAwal}\nPenurunan Harga: Rp${turunH}\n\n${output}`;
    const blob = new Blob([isi], { type: 'text/plain' });
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = "hasil_Laba_Maksimum.txt";
    a.click();
    URL.revokeObjectURL(url);
  }
  // revisi  3
  // tambah validator input, input gk akan bisa simbol -, +, e
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