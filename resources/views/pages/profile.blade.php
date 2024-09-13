@extends('layouts.master')

@section('judul')
    Profile
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('.alert').fadeOut('slow');
            }, 1500); // 3 detik
        });
    </script>
@endpush
@section('halaman')
    Profile
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            {{-- <button type="button"  data-bs-dismiss="alert" aria-label="Close"></button> --}}
        </div>
    @endif
    @if ($dataProfile)
        <form action="/profile/{{ $dataProfile->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Umur</label>
                <input type="number" name="age" value="{{ $dataProfile->age }}" class="form-control">
            </div>
            @error('age')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="">Alamat</label>
                <textarea name="address" id="" cols="30" rows="6" class="form-control">{{ $dataProfile->address }}</textarea>
            </div>
            @error('address')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="">Biodata</label>
                <textarea name="bio" id="" cols="30" rows="6" class="form-control">{{ $dataProfile->bio }}</textarea>
            </div>
            @error('bio')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <a href="{{ route('category.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    @else
        <p>Profil tidak ditemukan. Silakan buat profil terlebih dahulu.</p>
    @endif
@endsection
