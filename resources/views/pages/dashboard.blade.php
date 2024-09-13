@extends('layouts.master')
@section('judul')
    Dashboard
@endsection
@section('halaman')
    Dashboard
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-6 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>
                        @if ($categoryCount == 0)
                            0
                        @else
                            {{ $categoryCount }}
                    </h3>
                    @endif
                    <p>Kategori</p>
                </div>
                <div class="icon">
                    <i class="nav-icon fas fa-copy"></i>
                </div>
                <br>
                <a href="{{ route('category.index') }}" class="small-box-footer">
                    Lihat selengkapnya <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-6 col-6">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>
                        @if ($bookCount == 0)
                            0
                        @else
                            {{ $bookCount }}
                        @endif
                    </h3>
                    <p>Buku</p>
                </div>
                <div class="icon">
                    <i class="nav-icon fa-solid fa-book"></i>
                </div>
                <br>
                <a href="{{ route('book.index') }}" class="small-box-footer">
                    Lihat selengkapnya <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
    <h3><b>Selamat Datang di e-Library</b></h3>
    <p> Selamat datang di e-Library, perpustakaan digital yang menyediakan berbagai koleksi buku, jurnal, artikel, dan bahan
        bacaan lainnya secara online. Di sini, Anda dapat menjelajahi ribuan judul buku dari berbagai kategori, mulai dari
        fiksi hingga non-fiksi, ilmu pengetahuan, teknologi, sejarah, dan masih banyak lagi. Semua tersedia di ujung jari
        Anda!</p>
    <p>Dengan e-Library, membaca dan menambah wawasan menjadi lebih mudah dan praktis. Nikmati kemudahan akses kapan saja
        dan di mana saja, baik melalui komputer, tablet, maupun smartphone. Daftar sekarang dan mulai petualangan membaca
        Anda tanpa batas!</p>
@endsection
