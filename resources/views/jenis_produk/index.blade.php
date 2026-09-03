@extends('layouts.app')

@section('title', 'Jenis Produk')

@section('content')

@include('layouts.navbar')

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h1 class="fw-bold text-primary">
                <i class="bi bi-tags me-2"></i>
                Jenis Produk
            </h1>

            <p class="text-muted mb-0">
                Kelola jenis produk pada aplikasi POS.
            </p>
        </div>

        {{-- Tombol tambah hanya untuk Admin --}}
        @if(auth()->user()->role_id == 1)
            <a href="{{ route('jenis-produk.create') }}"
               class="btn btn-info text-white fw-bold">
                + Tambah Jenis Produk
            </a>
        @endif

    </div>


    {{-- Pesan berhasil --}}
    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif


    {{-- Tabel Jenis Produk --}}
    <div class="card shadow-sm border-0">

        <div class="card-header bg-info text-white">
            <strong>Daftar Jenis Produk</strong>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-striped align-middle mb-0">

                    <thead class="table-primary">

                        <tr>

                            {{-- No --}}
                            <th width="70" class="text-center">
                                No
                            </th>

                            {{-- Admin/User --}}
                            <th width="180" class="text-center">
                                Diinput Oleh
                            </th>

                            {{-- Nama Jenis Produk --}}
                            <th class="text-center">
                                Nama Jenis Produk
                            </th>

                            {{-- Aksi hanya ditampilkan untuk Admin --}}
                            @if(auth()->user()->role_id == 1)
                                <th width="180" class="text-center">
                                    Aksi
                                </th>
                            @endif

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($jenisProduks as $jenis)

                            <tr>

                                {{-- Nomor --}}
                                <td class="text-center">
                                    {{ $loop->iteration }}
                                </td>


                                {{-- Nama user yang menginput --}}
                                <td class="text-center">

                                    @if($jenis->user)

                                        <strong>
                                            {{ $jenis->user->name }}
                                        </strong>

                                    @else

                                        <span class="text-muted">
                                            Data lama
                                        </span>

                                    @endif

                                </td>


                                {{-- Nama jenis produk --}}
                                <td>

                                    <strong>
                                        {{ $jenis->nama_jenis }}
                                    </strong>

                                </td>


                                {{-- Aksi hanya untuk Admin --}}
                                @if(auth()->user()->role_id == 1)

                                    <td class="text-center">

                                        {{-- Tombol Edit --}}
                                        <a href="{{ route('jenis-produk.edit', $jenis->id) }}"
                                           class="btn btn-sm btn-info text-white fw-bold">
                                            Edit
                                        </a>


                                        {{-- Tombol Hapus --}}
                                        <form action="{{ route('jenis-produk.destroy', $jenis->id) }}"
                                              method="POST"
                                              class="d-inline">

                                            @csrf

                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-sm btn-primary fw-bold"
                                                    onclick="return confirm('Yakin ingin menghapus jenis produk ini?')">

                                                Hapus

                                            </button>

                                        </form>

                                    </td>

                                @endif

                            </tr>

                        @empty

                            <tr>

                                <td colspan="{{ auth()->user()->role_id == 1 ? 4 : 3 }}"
                                    class="text-center text-muted py-4">

                                    Belum ada jenis produk.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection