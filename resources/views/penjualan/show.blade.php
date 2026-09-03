@extends('layouts.app')

@section('title', 'Detail Penjualan')

@section('content')

@include('layouts.navbar')

<h1>Detail Penjualan</h1>

<div class="card">
    <div class="card-body">

        <table class="table">

            <tr>
                <th>Tanggal Transaksi</th>
                <td>
                    {{ $penjualan->created_at->translatedFormat('d F Y H:i:s') }}
                </td>
            </tr>

            <tr>
                <th>Kasir</th>
                <td>
                    {{ $penjualan->user->name }}
                </td>
            </tr>

            <tr>
                <th>Total Pembayaran</th>
                <td>
                    Rp {{ number_format($penjualan->total_pembayaran) }}
                </td>
            </tr>

            <tr>
                <th>Metode Pembayaran</th>
                <td>
                    {{ $penjualan->metode_pembayaran }}
                </td>
            </tr>

            <tr>
                <th>Status</th>
                <td>
                    {{ $penjualan->status }}
                </td>
            </tr>

        </table>


        <h4>Daftar Produk</h4>

        <table class="table table-bordered">

            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Subtotal</th>
                </tr>
            </thead>


            <tbody>

            @foreach($penjualan->itemPenjualan as $item)

                <tr>

                    <td>
                        {{ $item->produk->nama }}
                    </td>

                    <td>
                        {{ $item->kuantitas }}
                    </td>

                    <td>
                        Rp {{ number_format($item->harga) }}
                    </td>

                    <td>
                        Rp {{ number_format($item->subtotal) }}
                    </td>

                </tr>

            @endforeach

            </tbody>

        </table>


        <a href="{{ route('penjualan.index') }}" 
           class="btn btn-secondary">
            Kembali
        </a>

    </div>
</div>

@endsection