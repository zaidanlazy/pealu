@extends('welcome')

@section('content')

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Berita</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Garis tengah */
        .divider {
            border-right: 2px solid #ccc; /* Garis vertikal */
            height: 100vh; /* Garis memenuhi tinggi layar */
        }

        /* Scroll independen untuk setiap bagian */
        .scrollable {
        height: 100vh; /* Tinggi penuh layar */
        overflow-y: auto; /* Aktifkan scroll vertikal */
        padding: 20px;
}

        /* Mengatur lebar scrollbar */
        .scrollable::-webkit-scrollbar {
            width: 6px; /* Lebar scrollbar lebih kecil */
        }

        /* Warna track scrollbar */
        .scrollable::-webkit-scrollbar-track {
            background: #f1f1f1; /* Warna latar belakang track */
            border-radius: 10px;
        }

        /* Warna thumb (bagian yang bisa digeser) */
        .scrollable::-webkit-scrollbar-thumb {
            background: #888; /* Warna thumb */
            border-radius: 10px; /* Membuatnya lebih bulat */
        }

        /* Efek saat hover di scrollbar */
        .scrollable::-webkit-scrollbar-thumb:hover {
            background: #555;
        }


        /* Pastikan row dan column mengambil tinggi penuh */
        .full-height {
            height: 100vh;
        }

        /* Kolom kiri (30% lebar) */
        .col-left {
            width: 70%; /* Lebar 30% */
        }

        /* Kolom kanan (70% lebar) */
        .col-right {
            width: 30%; /* Lebar 70% */
        }

        /* Layout artikel dengan gambar dan teks sejajar */
        .article {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
        }

        /* Ukuran gambar kecil dan seragam */
        .article img {
            width: 80px; 
            height: auto;
            flex-shrink: 0;
        }

        /* Ukuran gambar di bagian kiri harus sama */
        .col-left img {
            width: 100%; /* Menyesuaikan dengan lebar kontainer */
            height: 400px; /* Menjaga aspek rasio */
        }
        .indent {
        text-indent: 30px; /* Sesuaikan jaraknya */
    }
    </style>
</head>
<body>

    <div class="container">
        <div class="row full-height">
            <!-- Bagian Kiri (30%) -->
            <div class="col-left divider scrollable">
                <div class="content">
                  <h2>Pt Badak NGL Plant</h2>
                  <br>
                
                        <img src="https://images.bisnis.com/posts/2021/08/16/1430146/bontanglngplant-ist.jpg" alt="PT  Badak">
                  <br>
                  <br>
                  <p class="indent">
    PT Badak NGL (berbisnis dengan nama Badak LNG) adalah anak usaha dari Pertamina Hulu Energi yang bergerak di bidang produksi LNG dan LPG. Untuk mendukung kegiatan bisnisnya, perusahaan ini memiliki kilang di Bontang dan kantor perwakilan di Balikpapan.

    Kilang milik perusahaan ini di Bontang memiliki 8 train yang dirancang dapat memproduksi LNG sebanyak 22,5 juta metrik ton per tahun, sehingga menjadikan perusahaan ini sebagai produsen LNG terbesar di Indonesia.
</p>
              
                    <hr>
                    <br>
                    <h2>Pupuk Kaltim</h2>
                    <br>
                  <img src="https://www.pupukkaltim.com/public/assets/files/img/Home%20Slider/banner-2.jpg" alt="Pupuk Kaltim">
                  <br>
                  <br>
                    <p class="indent">PT Pupuk Kalimantan Timur (PKT) adalah salah satu produsen pupuk urea dan NPK terbesar di Asia yang didirikan pada tanggal 7 Desember 1977. Berawal dari fasilitas pabrik pupuk terapung yang dikelola oleh Pertamina, kemudian berdasarkan Keputusan Presiden No. 43 tahun 1975 dan Keputusan Presiden No. 39 tahun 1976 pengelolaannya diserahkan kepada Departemen Perindustrian. Pada Tahun 2012 PKT menjadi anak perusahaan PT Pupuk Indonesia (Persero).</p>
                  <hr>
                  <br>
                   <h2>KIE (Kaltim Industrial Estate)</h2>
                   <br>
                  <img src="https://kie.co.id/wp-content/uploads/2023/01/WISMA-KIE-1-logo1.jpg" alt="KIE">
                  <br>
                  <br>
                    <p class="indent">PT Kaltim Industrial Estate (KIE) merupakan anak perusahaan
dari PT Pupuk Kalimantan Timur. Awalnya KIE memulai bisnis dengan menyediakan dan mengelola lahan kawasan industri bagi perusahaan berbasis gas bumi di Kawasan Bontang dengan total lahan kelolaan seluas 214,08 Hektar.Seiring dengan tuntutan perkembangan dunia bisnis, KIE berkembang dan tumbuh tidak hanya menyediakan dan mengelola kawasan industri, KIE telah bertransformasi menjadi perusahaan multilevel yang berbasis 5 (lima) pilar bisnis yaitu Kawasan Industri, Properti, Trading, Beton dan Konstruksi.

</p>
                  <hr>
                </div>
            </div>

            <!-- Bagian Kanan (70%) -->
            <div class="col-right scrollable">
                <h4>Artikel Terbaru</h4>
                <div class="content">
                    <div class="article">
                        <img src="https://cdn-web-2.ruangguru.com/landing-pages/assets/0394debe-32f7-45b3-ad8e-ce8e3775331d.png" alt="Portofolio SNBP dan SNBT">
                        <a href="#"><h6>Portofolio SNBP dan SNBT: Jenis, Ketentuan & Cara Mengisinya</h6></a>
                    </div>
                    <hr>
                    <div class="article">
                        <img src="https://cdn-web.ruangguru.com/landing-pages/assets/hs/kritik-sastra-dan-esai.png" alt="Kritik Sastra dan Esai">
                        <a href="#"><h6>Perbedaan Kritik Sastra dan Esai: Ciri, Struktur, dan Contoh</h6></a>
                    </div>
                    <hr>
                    <div class="article">
                        <img src="https://cdn-web.ruangguru.com/landing-pages/assets/hs/teks-diskusi.png" alt="Teks Diskusi">
                        <a href="#"><h6>Pengertian Teks Diskusi, Ciri, Struktur, Kebahasaan, & Jenis</h6></a>
                    </div>
                    <hr>
                    <div class="article">
                        <img src="https://cdn-web-2.ruangguru.com/landing-pages/assets/d30e3210-06a6-4ece-a01c-6d4a6df0d3ee.png" alt="SPAN PTKIN 2025">
                        <a href="#"><h6>Jadwal Pendaftaran SPAN PTKIN 2025, Syarat dan Tahapannya</h6></a>
                    </div>
                    <hr>
                    <div class="article">
                        <img src="https://cdn-web.ruangguru.com/landing-pages/assets/hs/Header%20-%20Pojok%20Sekolah%20-%20Resensi.jpg" alt="Teks Resensi">
                        <a href="#"><h6>Pengertian Teks Resensi, Struktur, Jenis, dan Contohnya!</h6></a>
                    </div>
                </div>
            </div>
        </div>
    </div>


        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <!-- Boostrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    
</html>

@endsection