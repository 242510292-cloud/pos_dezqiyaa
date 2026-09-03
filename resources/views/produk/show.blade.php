@extends('layouts.app')

@section('title', 'Detail Produk')

@section('content')

@include('layouts.navbar')

<h2>Detail Produk</h2>

<div class="card">
    <div class="card-body">

        {{-- Foto --}}
        @if($produk->foto)
            <img
                src="{{ asset('storage/' . $produk->foto) }}"
                width="200"
                class="img-thumbnail mb-3"
                alt="{{ $produk->nama }}"
            >
        @else
            <p class="text-muted">
                Tidak ada foto
            </p>
        @endif


        <table class="table table-bordered">

            {{-- ID --}}
            <tr>
                <th width="200">ID</th>
                <td>
                    {{ $produk->id }}
                </td>
            </tr>





            {{-- Nama --}}
            <tr>
                <th>Nama</th>
                <td>
                    {{ $produk->nama }}
                </td>
            </tr>


            {{-- Jenis Produk --}}
            <tr>
                <th>Jenis</th>
                <td>
                    {{ $produk->jenisProduk?->nama_jenis ?? '-' }}
                </td>
            </tr>


            {{-- Harga Beli --}}
            <tr>
                <th>Harga Beli</th>
                <td>
                    Rp {{ number_format($produk->harga_beli, 0, ',', '.') }}
                </td>
            </tr>


            {{-- Harga Jual --}}
            <tr>
                <th>Harga Jual</th>
                <td>
                    Rp {{ number_format($produk->harga_jual, 0, ',', '.') }}
                </td>
            </tr>


            {{-- Stok --}}
            <tr>
                <th>Stok</th>
                <td>
                    {{ $produk->stok }}
                </td>
            </tr>


            {{-- Dibuat --}}
            <tr>
                <th>Dibuat</th>
                <td>
                    {{ $produk->created_at?->format('d-m-Y H:i:s') }}
                </td>
            </tr>


            {{-- Diupdate --}}
            <tr>
                <th>Diupdate</th>
                <td>
                    {{ $produk->updated_at?->format('d-m-Y H:i:s') }}
                </td>
            </tr>

        </table>


        <div class="mt-3">

            @can('update', $produk)

                <a
                    href="{{ route('produk.edit', $produk) }}"
                    class="btn btn-info text-white"
                >
                    Edit
                </a>

            @endcan

            <a
                href="{{ route('produk.index') }}"
                class="btn btn-secondary"
            >
                Kembali
            </a>

        </div>

    </div>
</div>

@endsection