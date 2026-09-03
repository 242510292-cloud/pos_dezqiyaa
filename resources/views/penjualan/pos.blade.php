@extends('layouts.app')

@section('title', 'POS')

@section('content')

@if($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<h4 class="mb-3">Tambah dan Edit</h4>

<div class="row">

    {{-- ================= PRODUK ================= --}}
    <div class="col-md-6">
        <div class="card">
            <div class="card-body" style="max-height:70vh; overflow:auto">

                <form method="GET" action="{{ route('penjualan.create') }}">
                    <input type="text"
                        name="search"
                        value="{{ request('search') }}"
                        class="form-control mb-3"
                        placeholder="Cari produk..."
                        onkeyup="this.form.submit()">
                </form>

                @foreach($products as $product)

                <form method="POST"
                    action="{{ route('itempenjualan.store') }}"
                    class="row mb-2">

                    @csrf

                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <div class="col-7">
                        <div class="btn btn-outline-primary w-100 text-start p-2">
                            <div class="d-flex align-items-center gap-2">

                                <img src="{{ asset('storage/'.$product->foto) }}"
                                    class="rounded-circle"
                                    style="width:45px;height:45px;object-fit:cover;">

                                <div>
                                    <div class="fw-semibold">
                                        {{ $product->nama }}
                                    </div>
                                    <small class="text-muted">
                                        Rp {{ number_format($product->harga_jual) }}
                                    </small>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-3">
                        <input type="number"
                            name="quantity"
                            value="1"
                            min="1"
                            class="form-control">
                    </div>

                    <div class="col-2">
                        <button class="btn btn-primary w-100">+</button>
                    </div>

                </form>

                @endforeach

            </div>
        </div>
    </div>

    {{-- ================= KERANJANG ================= --}}
    <div class="col-md-6">
        <div class="card">

            <table class="table table-bordered mb-0">

                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Qty</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($sale->itemPenjualan as $item)

                <tr>

                    <td>{{ $item->produk->nama }}</td>

                    <td>
                        Rp {{ number_format($item->produk->harga_jual) }}
                    </td>

                    <td>
                        <form method="POST"
                            action="{{ route('itempenjualan.update', $item->id) }}">
                            @csrf
                            @method('PUT')

                            <input type="number"
                                name="quantity"
                                value="{{ $item->kuantitas }}"
                                min="1"
                                class="form-control form-control-sm"
                                onchange="this.form.submit()">
                        </form>
                    </td>

                    <td>
                        Rp {{ number_format($item->subtotal) }}
                    </td>

                    <td>
                        @can('delete', $item)
                        <form method="POST"
                            action="{{ route('itempenjualan.destroy', $item->id) }}">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                        @endcan
                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="5" class="text-center">
                        Keranjang Kosong
                    </td>
                </tr>

                @endforelse

                </tbody>

            </table>

            <div class="card-footer">

                <h5>
                    Total: Rp {{ number_format($sale->total_pembayaran) }}
                </h5>

                <form method="POST"
                    action="{{ route('penjualan.update', $sale->id) }}"
                    onsubmit="return confirm('Yakin ingin checkout?')">

                    @csrf
                    @method('PUT')

                    <select name="payment_method" class="form-select mb-2" required>
                        <option value="">Pilih Pembayaran</option>
                        <option value="CASH">Cash</option>
                        <option value="QRIS">QRIS</option>
                    </select>

                    <button class="btn btn-success w-100">
                        Checkout
                    </button>

                </form>
                @can('delete', $sale)
                <form method="POST"
                    action="{{ route('penjualan.destroy', $sale->id) }}"
                    onsubmit="return confirm('Yakin ingin membatalkan transaksi?')">

                    @csrf
                    @method('DELETE')

                    <button class="btn btn-outline-danger w-100 mt-2">
                        Batal Transaksi
                    </button>
{{-- TOMBOL KEMBALI --}}

    <div class="mt-4">

        <a href="{{ url('/penjualan') }}"
           class="btn btn-primary fw-bold">

            ← Kembali

        </a>

    </div>


</div>

                </form>
                @endcan
            </div>

        </div>
    </div>

</div>

@endsection