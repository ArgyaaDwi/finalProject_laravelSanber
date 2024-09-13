@extends('layouts.master')
@section('judul')
    Halaman Edit Kategori
@endsection
@section('halaman')
    Edit Kategori {{ $categories->name }}
@endsection
@section('content')
    <form action="{{ route('category.update', $categories->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Nama Kategori</label>
            <input type="text" name="name" value="{{ $categories->name }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Deskripsi Kategori</label>
            <textarea name="category_description" id="" cols="30" rows="6" class="form-control">{{ $categories->category_description }}</textarea>
        </div>
        <a href="{{ route('category.index') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
