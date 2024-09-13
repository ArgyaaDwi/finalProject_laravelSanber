@extends('layouts.master')
@section('judul')
    Halaman Kategori
@endsection
@section('halaman')
    Kategori
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
            setTimeout(function() {
                $('.alert').fadeOut('slow');
            }, 1500); // 1.5 detik
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
        <a href="{{ route('category.create') }}" class="btn btn-outline-primary mb-3">+ Tambah Kategori</a>
    @endauth
    <div class="table-repsonsive">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>ID Kategori</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($category as $value)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->name }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('category.show', $value->id) }}" class="btn btn-outline-info">
                                    <i class="fa-regular fa-eye"></i>
                                </a>
                                @auth
                                    <a href="{{ route('category.edit', $value->id) }}" class="btn btn-warning mx-1">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                    <!-- Tombol untuk membuka modal -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#confirmDeleteModal-{{ $value->id }}">
                                        Hapus
                                    </button>
                                @endauth
                            </div>
                        </td>

                        <!-- Modal Konfirmasi Penghapusan -->
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
                                        Apakah kamu yakin ingin menghapus <span class="text-danger text-bold">{{ $value->name }}</span> dari kategori?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                        <!-- Form Penghapusan -->
                                        <form action="{{ route('category.destroy', $value->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data kategori</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
