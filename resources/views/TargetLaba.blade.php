
<!DOCTYPE html>
<html lang="id">
<head> 
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Target Laba | BalikModalin</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
  <link rel="stylesheet" href="css/TargetLaba.css">
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

  <div class="subtext" data-aos="fade-up">
  Hitung Laba sebanyak yang kamu mau
</div>

<main>

  <div class="form-card" data-aos="fade-right">
    <form action="{{ route('Riwayat.store') }}" method="POST">
      @csrf
      <label for="output">Hasil :</label>
    <div class="hasil-box" id="output" value="{{ old('output') }}">
    </div>

    <label for="biaya">Biaya per Unit (Rp)</label>
    <input type="number" name="biaya" id="biaya" required autofocus placeholder="ex. Biaya produksi untuk satu mug custom Rp. 30.000">

    <label for="hargaJual">Harga Jual per Unit (Rp)</label>
    <input type="number" name="hargaJual" id="hargaJual" required placeholder="ex. Harga jual untuk satu mug custom Rp. 50.000">

    <label for="laba">Laba yang Diinginkan (Rp)</label>
    <input type="number" name="laba" id="laba" required placeholder="ex. Jumlah laba yang diinginkan Rp. 1.000.000">

    <input type="hidden" id="jumlahBarang" name="jumlahBarang">

    <button type="button" onclick="hitungJumlahBarang()">🔍 Hitung</button>
    <button type="submit">💾 Simpan</button>
    <button type="button" onclick="unduhHasil()">📥 Unduh Hasil</button>
    </form>
  </div>

  <div class="visualisasi-wrapper" data-aos="fade-left">
    <div class="visualisasi">
      <div class="grafik-card">
        <h3>Visualisasi Input</h3>
        <hr>
        <canvas id="grafikInput"></canvas>
      </div>
      <div class="grafik-card">
        <h3>Visualisasi Target</h3>
        <hr>
        <canvas id="grafikOutput"></canvas>
      </div>
    </div>
  </div>
</main>

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

  

  function hitungJumlahBarang() {
  const biaya = parseFloat(document.getElementById("biaya").value);
  const hargaJual = parseFloat(document.getElementById("hargaJual").value);
  const laba = parseFloat(document.getElementById("laba").value);
  const output = document.getElementById("output");

    // revisi 1
    // (Tukar urutan)cek input '0' lebih dulu, karena kalo isNaN dulu ketika input '0' outputnya adalah 'semua input harus diisi' jdi gak nyambung

    if (laba <= 0 || hargaJual <= 0 || biaya <= 0) {
    output.innerHTML = `<span style='color:red;'>Semua input harus lebih dari 0.</span>`;
    return false;
  }
  
     if (isNaN(biaya) || isNaN(hargaJual) || isNaN(laba)) {
    output.innerHTML = `<span style="color:red;">Semua input wajib diisi!</span>`;
    return false;
  }
   // revisi 1 selesai

    if (hargaJual <= biaya) {
    output.innerHTML = `<span style="color:red;">Harga Jual per Unit harus lebih besar dari Biaya per Unit!</span>`;
    return false;
  }

  const keuntunganPerUnit = hargaJual - biaya;
  const jumlahBarang = Math.ceil(laba / keuntunganPerUnit);

    output.innerHTML = `Untuk mendapatkan laba sebesar <strong>Rp${laba.toLocaleString()}</strong>, kamu perlu menjual <strong>${jumlahBarang}</strong> unit.`;

  tampilkanGrafikInput(biaya, hargaJual, laba);
  tampilkanGrafikOutput(jumlahBarang, laba);

  document.getElementById("jumlahBarang").value = jumlahBarang; // simpan ke form

  return true;
}

  function tampilkanGrafikInput(biaya, hargaJual, laba) {
    const ctx = document.getElementById('grafikInput').getContext('2d');
    if (window.grafikInputInstance) window.grafikInputInstance.destroy();
    window.grafikInputInstance = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Biaya', 'Harga Jual', 'Target Laba'],
        datasets: [{
          label: 'Nilai (Rp)',
          data: [biaya, hargaJual, laba],
          backgroundColor: ['#f87171', '#60a5fa', '#34d399']
        }]
      },
      options: {
        plugins: { legend: { display: false }},
        responsive: true,
        scales: {
          y: { beginAtZero: true }
        }
      }
    });
  }

  function tampilkanGrafikOutput(jumlahBarang, laba) {
    const ctx = document.getElementById('grafikOutput').getContext('2d');
    if (window.grafikOutputInstance) window.grafikOutputInstance.destroy();
    window.grafikOutputInstance = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['0', jumlahBarang.toString()],
        datasets: [{
          label: 'Laba (Rp)',
          data: [0, laba],
          borderColor: '#ef4444',
          backgroundColor: '#ef4444',
          tension: 0.3,
          pointRadius: 5,
          pointHoverRadius: 7,
          fill: false
        }]
      },
      options: {
        plugins: { legend: { display: false }},
        responsive: true,
        scales: {
          y: { beginAtZero: true }
        }
      }
    });
  }

  function unduhHasil() {
    const biaya = document.getElementById("biaya").value;
    const harga = document.getElementById("hargaJual").value;
    const laba = document.getElementById("laba").value;
    const output = document.getElementById("output").innerText;

    const isi = `Biaya per Unit: Rp${biaya}\nHarga Jual per Unit: Rp${harga}\nLaba Target: Rp${laba}\n\n${output}`;
    const blob = new Blob([isi], { type: 'text/plain' });
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = "hasil_target_laba.txt";
    a.click();
    URL.revokeObjectURL(url);
  }

  // revisi  2
  // validator input gk akan bisa simbol -, +, e
  document.querySelectorAll('input[type=number]').forEach(input => {
      input.addEventListener('keydown', function(e) {
        if (e.key === '-' || e.key === '+' || e.key.toLowerCase() === 'e') {
          e.preventDefault();
        }
      });
    });
  // revisi 2 selesai
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

