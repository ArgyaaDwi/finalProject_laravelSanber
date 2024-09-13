@extends('layouts.master')
@section('judul')
    Halaman Tambah Kategori
@endsection
@section('halaman')
    Tambah Kategori
@endsection
@section('content')
    <form action="{{ route('category.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama Kategori</label>
            <input type="text" name="name" class="form-control">
        </div>
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label for="">Deskripsi Kategori</label>
            <textarea name="category_description" id="" cols="30" rows="6" class="form-control"></textarea>
        </div>
        @error('category_description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <a href="{{ route('category.index') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
