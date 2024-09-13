@extends('layouts.master')
@section('judul')
    Halaman Tambah Buku
@endsection
@section('halaman')
    Tambah Buku
@endsection
@section('content')
    <form action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Judul Buku</label>
            <input type="text" name="title" class="form-control" placeholder="Masukkan Judul Buku">
        </div>
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="stock" class="form-label">Stok Buku</label>
                <input type="number" class="form-control" id="stock" name="stock" placeholder="Masukkan Stok Buku">
            </div>
            <div class="col-md-6">
                <label for="category_id" class="form-label">Kategori</label>
                <select class="form-control" id="id_department" name="category_id">
                    <option value="" class="text-center">.:: Pilih Kategori ::.</option>
                    @forelse ($category as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @empty
                        <option value="">Kategori tidak tersedia</option>
                    @endforelse
                </select>
            </div>
        </div>
        @error('stock')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @error('category_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label>Sinopsis</label>
            <textarea name="summary" cols="30" rows="6" class="form-control" placeholder="Masukkan Sinopsis"></textarea>
        </div>
        @error('summary')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label>Sampul Buku</label><br>
            <input type="file" name="image" class="" accept=".png, .jpg, .jpeg" onchange="previewImage(this)">
        </div>
        <div class="avatar-preview mb-3">
            <div id="imagePreview"></div>
        </div>
        @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <a href="{{ route('book.index') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
@push('scripts')
    <script type="text/javascript">
        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(700);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush
@push('styles')
    <style>
        .avatar-preview {
            width: 150px;
            height: 200px;
            position: relative;
            border-radius: 5px;
            border: 2px solid #ddd;
            background-color: #f8f9fa;
            margin-top: 15px;
            overflow: hidden;
        }

        #imagePreview {
            width: 100%;
            height: 100%;
            background-position: center center;
            background-size: cover;
            background-repeat: no-repeat;
            display: block;
        }
    </style>
@endpush
