@extends('layouts.master')

@section('judul')
    Detail Kategori
@endsection
@section('halaman')
    Detail Kategori {{ $categories->name }}
@endsection
@section('content')
    <h1>{{ $categories->name }}</h1>
    <p>{{ $categories->category_description }}</p>
    <a href="" class="btn btn-warning disabled"><i class="fa-regular fa-rectangle-list"></i><span
            class="text-bold text-black"> List Buku Kategori {{ $categories->name }}</span></a>
    <div class="mt-2 table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th>ID Buku</th>
                    <th>Nama Buku</th>
                    <th>Gambar</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($books as $item)
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td> <img src="{{ asset('storage/images/' . $item->image) }}" alt="{{ $item->title }}"
                            style="width: 100px; height: 100px; object-fit: cover"></td>
                    <td>{{ $item->getCategory->name }}</td>
                    <td>{{ $item->stock }}</td>
                @empty
                    <td colspan="6" class="text-center">Tidak ada buku untuk kategori ini</td>
                @endforelse

            </tbody>
        </table>
    </div>
    <a href="{{ route('category.index') }}" class="btn btn-secondary">Kembali</a>
@endsection
