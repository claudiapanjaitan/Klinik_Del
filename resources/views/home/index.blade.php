@extends('layouts.main')

@section('content')
<link href="{{ asset('css/home.css') }}" rel="stylesheet" />
    {{-- Carousel --}}
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
        </div>
        <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="images/mencuci.png" class="d-block w-100" alt="...">
            <div class="carousel-caption">
            </div>
        </div>
        <div class="carousel-item">
            <img src="images/masker.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption">
            </div>
        </div>
        <div class="carousel-item">
            <img src="images/menjaga.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption">
            </div>
        </div>
        <div class="carousel-item">
            <img src="images/kerumunan.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption">
            </div>
        </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
        </button>
    </div>
    <hr class="mt-5 mx-2" />
    <div class="card mx-4">
        <div class="row no-gutters">
            <div class="col-md-6 mt-4 mx-2"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.3673457451055!2d99.14644411470289!3d2.383215198263204!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e00fdad2d7341%3A0xf59ef99c591fe451!2sInstitut%20Teknologi%20Del!5e0!3m2!1sid!2sid!4v1654355784858!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
            <div class="col-md-5">
                <div class="card-body">
                    <h5 class="card-title text-center"><strong>Informasi Klinik Del</strong></h5>
                    <p class="card-text">
                        Praktek umum dokter Del resmi didirikan pada bulan Mei tahun 2009, terletak disamping pintu masuk ke area kampus Institut Teknologi Del. Tujuan didirikan praktek umum ini yang terutama adalah untuk melayani siswa, mahasiswa, pegawai Del tetapi selain itu juga untuk melayani masyarakat disekitar lingkungan kampus. Praktek umum ini bersifat sosial, non-profit, tetapi juga tetap berusaha menjaga mutu pelayanan agar sesuai dengan standar pelayanan termutakhir. Praktek umum ini juga bekerja sama dengan Jamsostek sebagai PPK I untuk melayani pasien-pasien yang terdaftar sebagai tanggungan Jamsostek dalam wilayah ini. Praktek umum ini bisa melayani pengobatan dasar (meliputi anak dan dewasa) hingga yang membutuhkan tindakan bedah sederhana. Di dalam praktek umum ini juga sudah tersedia obat sehingga tidak perlu membeli obat lagi di tempat lain. Saat ini praktek umum ini sedang dalam proses pengembangan menjadi klinik Yayasan Del<br>
                        <br><p><strong>Dokter Yang Bertugas:</strong>
                            <br>
                            a. dr. Togumanata Naipospos
                            <br>
                            b. Zr. Eva Viviana Pasaribu
                            <br>
                            c. Bd. Karolina Sitorus
                    </p>
                </div>
            </div>
        </div>
    </div>
    <section>
        <h1 class="title">staf Klinik</h1>
        <div class="team-row">
            <div class="member">
                <img src="{{ asset('staff/dokter.jpeg') }}" alt="">
                <h2>dr. Togumanata Naipospos</h2>
                <p>Laguboti, 23 Juli 1993<br>Sarjana Kedokteran<br>0853-7205-3344.
    
                </p>
            </div>
            <div class="member">
                <img src="{{ asset('staff/suster.jpeg') }}" alt="">
                <h2>Zr. Eva Viviana Pasaribu</h2>
                <p>Janji Maria, 06 Januari 1990<br>D3 Keperawatan<br>0852-0794-2500.
                </p>
            </div>
            <div class="member">
                <img src="{{ asset('staff/bidan.jpeg') }}" alt="">
                <h2>Bd. Karolina Sitorus</h2>
                <p>Porsea, 04 Januari 1999<br>D3 Kebidanan<br>0821-6569-4843.
                </p>
            </div>
        </div>
    </section>
@endsection