@extends('layouts.app')

@section('title', 'Tambah Jenis Produk')

@section('content')

@include('layouts.navbar')

<div class="container mt-4">

    <div class="mb-4">
        <h1 class="fw-bold text-primary">
            Tambah Jenis Produk
        </h1>

        <p class="text-muted">
            Tambahkan jenis produk baru ke dalam sistem POS.
        </p>
    </div>

    <div class="card shadow-sm border-0">

        <div class="card-header bg-info text-white">
            <strong>Form Jenis Produk</strong>
        </div>

        <div class="card-body">

            <form action="{{ route('jenis-produk.store') }}" method="POST">

                @csrf

               
                <div class="mb-3">
                    <label for="nama_jenis" class="form-label fw-bold">
                        Nama Jenis Produk
                    </label>

                    <input
                        type="text"
                        id="nama_jenis"
                        name="nama_jenis"
                        class="form-control @error('nama_jenis') is-invalid @enderror"
                        placeholder="Contoh: Makanan"
                        value="{{ old('nama_jenis') }}"
                        required
                    >

                    @error('nama_jenis')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

               
                
                <a href="{{ route('jenis-produk.index') }}"
                   class="btn btn-secondary">
                    Kembali
                </a>

                <button type="submit"
                        class="btn btn-primary">
                    Simpan
                </button>

            </form>

        </div>
    </div>

</div>

@endsection