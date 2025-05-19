<!DOCTYPE html>
<html lang="id" data-theme="light">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Balik Modalin | {{ $title }}</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="css/Belajar.css"/>
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

  <div class="container">
    <div class="subtext">Pelajari Cara Kalkulator di BalikModalin Bekerja</div>
    <div class="card">
        <h2>1. Kalkulator Titik Impas (Break Even) / Balik Modal</h2>
        <h3>Fungsi Dasar:</h3>
        <p>Diberikan:</p>
        <ul>
            <li>Biaya tetap = <strong>Bₜ</strong></li>
            <li>Biaya variabel per unit = <strong>Bᵥ</strong></li>
            <li>Harga jual per unit = <strong>P</strong></li>
        </ul>
        <p>Fungsi laba:</p>
        <img src="img/Materi/Bep1.jpg" style="width: 50%; height: auto; border-radius: 10px; justify-content: center; display: block; margin: 0 auto;">
        <p>Titik impas saat laba = 0:</p>
        <img src="img/Materi/Bep2.jpg" style="width: 30%; height: auto; border-radius: 10px; justify-content: center; display: block; margin: 0 auto;">
        
        <h3>Konsep Turunan:</h3>
        <img src="img/Materi/Bep3.jpg" style="width: 17%; height: auto; border-radius: 10px; justify-content: center; display: block; margin: 0 auto;">
        <p>Fungsi ini juga linear, dan turunan konstan (P - B_v) menunjukkan laju pertumbuhan laba per unit. Tidak ada titik maksimum, hanya titik di mana garis laba memotong sumbu x (titik impas).</p>
    
        <h3>Interpretasi Kalkulator:</h3>
        <ul>
            <li>Fungsi ini juga linear dengan gradien positif.</li>
            <li>Titik impas tercapai ketika total pendapatan = total biaya.</li>
            <li>Turunan (P - B_v) menunjukkan kecepatan pertumbuhan laba per unit.</li>
            <li>Setelah titik ini, semua penjualan memberikan laba bersih.</li>
            <li>Cocok digunakan untuk menganalisis minimum jumlah barang yang harus dijual agar tidak rugi.</li>
        </ul>

        <h3>Contoh:</h3>
        <p>Misal:</p>
        <img src="img/Materi/Bep4.jpg" style="width: 40%; height: auto; border-radius: 10px;">
        <p>Fungsi laba:</p>
        <img src="img/Materi/Bep5.jpg" style="width: 70%; height: auto; border-radius: 10px; justify-content: center; display: block; margin: 0 auto;">
        <p>Interpretasi:</p>
        <ul>
            <li>Perusahaan tidak untung atau rugi jika menjual 67 lisensi</li>
            <li>Setiap lisensi tambahan setelah itu → untung Rp150.000</li>
            <li>Untuk setiap lisensi tambahan, laba meningkat Rp150.000 secara konstan</li>
        </ul>
    </div>

    <div class="card">
        <h2>2. Kalkulator Jumlah Barang untuk Target Laba</h2>
        <h3>Fungsi Dasar:</h3>
        <p>Diberikan:</p>
        <ul>
            <li>Biaya per unit = <strong>C</strong></li>
            <li>Harga jual per unit = <strong>P</strong></li>
            <li>Target laba = <strong>L</strong></li>
        </ul>
        <p>Untuk menghitung berapa unit barang yang harus dijual untuk mencapai laba L, digunakan:</p>
        <img src="img/Materi/TargetLaba1.jpg" style="width: 30%; height: auto; border-radius: 10px; justify-content: center; display: block; margin: 0 auto;">
        
        <h3>Konsep Turunan:</h3>
        <p>Fungsi laba di sini adalah:</p>
        <img src="img/Materi/TargetLaba2.jpg" style="width: 20%; height: auto; border-radius: 10px; justify-content: center; display: block; margin: 0 auto;">
        <p>Turunannya:</p>
        <img src="img/Materi/TargetLaba3.jpg" style="width: 20%; height: auto; border-radius: 10px; justify-content: center; display: block; margin: 0 auto;">
        <p>Karena (P - C) adalah konstanta positif (diasumsikan), maka grafik laba linear dan naik terus. Turunan konstan ini menunjukkan bahwa penambahan satu unit barang akan selalu menambah laba sebesar (P - C). Tidak ada titik maksimum di sini, hanya kebutuhan untuk mencapai target laba.</p>
        
        <h3>Interpretasi Kalkulator :</h3>
        <ul>
            <li>Karena turunan konstan dan positif, artinya setiap penambahan satu unit barang selalu menambah laba sebesar P−CP - CP−C.</li>
            <li>Grafik fungsi linear naik → tidak ada maksimum/minimum.</li>
            <li>Kita hanya mencari berapa unit (x) untuk mencapai laba tertentu.</li>
            <li>Ini cocok digunakan saat harga dan biaya tetap, dan ingin tahu kapan bisa mencapai target laba.</li>
        </ul>
        
        <h3>Contoh:</h3>
        <p>Misal:</p>
        <img src="img/Materi/TargetLaba4.jpg" style="width: 35%; height: auto; border-radius: 10px;">
        <p>Fungsi:</p>
        <img src="img/Materi/TargetLaba5.jpg" style="width: 60%; height: auto; border-radius: 10px; justify-content: center; display: block; margin: 0 auto;">
        <p>Interpretasi turunan:</p>
        <img src="img/Materi/TargetLaba6.jpg" style="width: 50%; height: auto; border-radius: 10px;">
    </div>

    <div class="card">
        <h2>3. Kalkulator Laba Maksimum dengan Penurunan Harga</h2>
        <h3>Fungsi Dasar:</h3>
        <p>Diberikan:</p>
        <ul>
            <li>Biaya tetap = <strong>Bₜ</strong></li>
            <li>Biaya variabel per unit = <strong>Bᵥ</strong></li>
            <li>Harga awal = <strong>H₀</strong></li>
            <li>Penurunan harga per unit produk = <strong>p</strong></li>
        </ul>
        <p>Harga jual bergantung pada kuantitas:</p>
        <img src="img/Materi/LabaMaks1.jpg" style="width: 20%; height: auto; border-radius: 10px; justify-content: center; display: block; margin: 0 auto;">
        <p>Fungsi laba:<p>
        <img src="img/Materi/LabaMaks2.jpg" style="width: 60%; height: auto; border-radius: 10px; justify-content: center; display: block; margin: 0 auto;">   
        
        <h3>Konsep Turunan:</h3>
        <img src="img/Materi/LabaMaks3.jpg" style="width: 30%; height: auto; border-radius: 10px; justify-content: center; display: block; margin: 0 auto;">   
        <p>Setel turunan ke nol untuk mencari titik maksimum:<p>
        <img src="img/Materi/LabaMaks4.jpg" style="width: 30%; height: auto; border-radius: 10px; justify-content: center; display: block; margin: 0 auto;">    
        <p>Inilah produksi optimal yang memaksimalkan laba. Fungsi ini adalah fungsi kuadrat menurun (karena koefisien x² negatif), sehingga terdapat titik puncak – yaitu maksimum lokal, yang ditentukan melalui turunan pertama.</p>
        
        <h3>Interpretasi Kalkulator:</h3>
        <ul>
            <li>Fungsi laba berbentuk kuadrat menurun (parabola menghadap ke bawah)</li>
            <li>Fungsi laba berbentuk kuadrat menurun (parabola menghadap ke bawah)</li>
            <li>Di sinilah konsep turunan = 0 digunakan untuk menemukan puncak fungsi.</li>
            <li>Cocok untuk situasi di mana semakin banyak barang diproduksi, harga makin turun → harus cari titik paling menguntungkan.</li>
        </ul>

        <h3>Contoh:</h3>
        <img src="img/Materi/LabaMaks5.jpg" style="width: 70%; height: auto; border-radius: 10px;">
        <p>Fungsi laba:</p>
        <img src="img/Materi/LabaMaks6.jpg" style="width: 70%; height: auto; border-radius: 10px; justify-content: center; display: block; margin: 0 auto;">
        <p>Interpretasi:</p>
        <ul>
            <li>Laba maksimum dicapai jika menjual 60 unit headphone</li>
            <li>Jika dijual lebih dari 60, laba menurun karena harga terlalu rendah</li>
            <li>Turunan positif saat x < 60: laba bertambah</li>
            <li>Turunan negatif saat x > 60: laba menurun</li>
            <li>Turunan nol di puncak kurva laba</li>
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