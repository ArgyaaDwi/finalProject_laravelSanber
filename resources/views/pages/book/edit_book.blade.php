@extends('layouts.master')
@section('judul')
    Halaman Edit Buku
@endsection
@section('halaman')
    Edit Buku {{ $books->title }}
@endsection
@section('content')
    <form action="{{ route('book.update', $books->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Judul Buku</label>
            <input type="text" name="title" value="{{ $books->title }}" class="form-control">
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="stock" class="form-label">Stok Buku</label>
                <input type="number" class="form-control" id="stock" name="stock" value="{{ $books->stock }}">
            </div>
            <div class="col-md-6">
                <label for="category_id" class="form-label">Kategori</label>
                <select class="form-control" id="category_id" name="category_id">
                    <option value="" disabled class="text-center">.:: Pilih Kategori ::.</option>
                    @forelse ($category as $item)
                        <option value="{{ $item->id }}" {{ $books->category_id == $item->id ? 'selected' : '' }}>
                            {{ $item->name }}
                        </option>
                    @empty
                        <option value="">Kategori tidak tersedia</option>
                    @endforelse
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="">Sinopsis</label>
            <textarea name="summary" id="" cols="30" rows="6" class="form-control">{{ $books->summary }}</textarea>
        </div>
        <div class="form-group">
            <label>Sampul Buku</label><br>
            @if ($books->image)
                <div class="mb-3">
                    <label>Gambar Lama:</label><br>
                    <img src="{{ asset('storage/images/' . $books->image) }}" alt="Gambar Sampul"
                        style="width: 150px; height: auto;">
                </div>
            @endif
            <input type="file" name="image" class="" accept=".png, .jpg, .jpeg" onchange="previewImage(this)">
            <small class="form-text text-muted">Jika ingin mengganti gambar, pilih gambar baru.</small>
        </div>

        <div class="form-group">
            <div class="avatar-preview mb-3">
                <div id="imagePreview"></div>
            </div>
        </div>
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
