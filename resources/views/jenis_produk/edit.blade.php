@extends('layouts.app')

@section('title', 'Edit Jenis Produk')

@section('content')

@include('layouts.navbar')

<div class="container mt-4">

    <div class="mb-4">
        <h1 class="fw-bold text-primary">
            Edit Jenis Produk
        </h1>

        <p class="text-muted">
            Perbarui informasi jenis produk.
        </p>
    </div>

    <div class="card shadow-sm border-0">

        <div class="card-header bg-info text-white">
            <strong>Form Edit Jenis Produk</strong>
        </div>

        <div class="card-body">

            <form action="{{ route('jenis-produk.update', $jenisProduk->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nama_jenis" class="form-label fw-bold">
                        Nama Jenis Produk
                    </label>

                    <input
                        type="text"
                        id="nama_jenis"
                        name="nama_jenis"
                        class="form-control @error('nama_jenis') is-invalid @enderror"
                        value="{{ old('nama_jenis', $jenisProduk->nama_jenis) }}"
                        required
                    >

                    @error('nama_jenis')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- <div class="mb-4">
                    <label for="keterangan" class="form-label fw-bold">
                        Keterangan
                    </label>

                    <textarea
                        id="keterangan"
                        name="keterangan"
                        class="form-control"
                        rows="4"
                    >{{ old('keterangan', $jenisProduk->keterangan) }}</textarea>
                </div> --}}

                <a href="{{ route('jenis-produk.index') }}"
                   class="btn btn-secondary">
                    Kembali
                </a>

                <button type="submit"
                        class="btn btn-primary">
                    Update
                </button>

            </form>

        </div>
    </div>

</div>

@endsection
