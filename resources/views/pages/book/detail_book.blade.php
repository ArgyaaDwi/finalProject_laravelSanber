@extends('layouts.master')
@section('judul')
    Detail Buku
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('.alert').fadeOut('slow');
            }, 1500); // 3 detik
        });
    </script>
@endpush
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@endpush
@section('halaman')
    Detail Buku {{ $books->title }}
@endsection
@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <img src="{{ asset('storage/images/' . $books->image) }}" alt="{{ $books->title }}" class="img-fluid"
                    style="max-width: 100%; height: 400px; object-fit: cover">
            </div>
            <div class="col-md-9">
                <h1><b>{{ $books->title }}</b></h1>
                <p>Kategori: {{ $books->getCategory->name }}</p>
                <p>Jumlah Stok: {{ $books->stock }}</p>
                <p>Sinopsis singkat:</p>
                <p>{{ $books->summary }}</p>
                <a href="#" class="btn btn-primary rounded btn-flat" data-bs-toggle="modal"
                    data-bs-target="#modalPinjaman">+ Tambah Pinjaman</a>
                <div class="modal fade" id="modalPinjaman" tabindex="-1" aria-labelledby="modalPinjamanLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalPinjamanLabel">Tambah Pinjaman</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('borrow.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="nama_buku">Nama Buku</label>
                                        <input type="text" class="form-control" value="{{ $books->title }}" readonly>
                                    </div>
                                    <input type="hidden" name="book_id" value="{{ $books->id }}">
                                    @error('book_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="form-group">
                                        <label for="user_id" class="form-label">Peminjam</label>
                                        <select class="form-control" id="user_id" name="user_id">
                                            <option value="" class="text-center">.:: Pilih Peminjam ::.</option>
                                            @forelse ($user as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @empty
                                                <option value="">Peminjam tidak tersedia</option>
                                            @endforelse
                                        </select>
                                    </div>
                                    @error('user_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="form-group">
                                        <label for="tanggal_peminjaman">Tanggal Peminjaman</label>
                                        <input type="date" name="tanggal_peminjaman" class="form-control">
                                    </div>
                                    @error('tanggal_peminjaman')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="form-group">
                                        <label for="tanggal_pengembalian">Tanggal Pengembalian</label>
                                        <input type="date" name="tanggal_pengembalian" class="form-control">
                                    </div>
                                    @error('tanggal_pengembalian')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Pinjamkan</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><br>
        <a href="" class="btn btn-warning disabled"><i class="fa-regular fa-rectangle-list"></i><span
                class="text-bold text-black"> List Peminjam Buku {{ $books->title }}</span></a>
        <div class="mt-2 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th>ID Transaksi</th>
                        <th>Peminjam</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Tanggal Pengembalian</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($borrows as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->tanggal_peminjaman }}</td>
                            <td>{{ $item->tanggal_pengembalian }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada transaksi peminjaman untuk buku ini</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <a href="{{ route('book.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
@endsection
