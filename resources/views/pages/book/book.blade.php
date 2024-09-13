@extends('layouts.master')
@section('judul')
    Halaman Buku
@endsection
@section('halaman')
    Buku
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
            setTimeout(function() {
                $('.alert').fadeOut('slow');
            }, 1500); // 3 detik
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
@endpush
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" />
@endpush
@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @auth
        <a href="{{ route('book.create') }}" class="btn btn-outline-primary mb-3">+ Tambah Buku</a>
    @endauth
    <table class="stripe-responsive" id="myTable">
        <thead>
            <tr>
                <th>No. </th>
                <th>ID Buku</th>
                <th>Nama Buku</th>
                <th>Gambar</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($book as $value)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->title }}</td>
                    <td>
                        <img src="{{ asset('storage/images/' . $value->image) }}" alt="{{ $value->title }}"
                            style="width: 100px; height: 100px; object-fit: cover">
                    </td>
                    <td>{{ $value->getCategory->name }}</td>
                    <td>{{ $value->stock }}</td>
                    <td>
                        <form action="{{ route('book.destroy', $value->id) }}" method="POST"
                            id="delete-form-{{ $value->id }}">
                            @csrf
                            @method('DELETE')
                            <div class="d-flex gap-2">
                                <a href="{{ route('book.show', $value->id) }}" class="btn btn-outline-info">
                                    <i class="fa-regular fa-eye"></i>
                                </a>
                                @auth
                                    <a href="{{ route('book.edit', $value->id) }}" class="btn btn-warning mx-1">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#confirmDeleteModal-{{ $value->id }}">
                                        Hapus
                                    </button>
                                @endauth
                            </div>
                        </form>
                    </td>
                    <div class="modal fade" id="confirmDeleteModal-{{ $value->id }}" tabindex="-1"
                        aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmDeleteLabel">Konfirmasi Penghapusan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Apakah kamu yakin ingin menghapus <span
                                        class="text-danger text-bold">{{ $value->title }}</span> dari buku?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="button" class="btn btn-danger"
                                        onclick="document.getElementById('delete-form-{{ $value->id }}').submit();">
                                        Hapus
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data buku</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
