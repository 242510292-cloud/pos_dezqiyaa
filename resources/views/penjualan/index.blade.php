@extends('layouts.app')

@section('title', 'Penjualan')

@section('content')

@include('layouts.navbar')

@if(session('errors'))
<div class="alert alert-danger">
    {{ session('errors') }}
</div>
@endif

 <h1 class="fw-bold text-primary">
        <i class="bi bi-cart-check me-2"></i>
       Penjualan
    </h1>

<a href="{{ route('penjualan.create') }}" class="btn btn-primary mb-3">
    Create
</a>

<form action="{{ route('penjualan.index') }}" method="GET" class="mb-3">

    <div class="input-group">

        <input
            type="text"
            name="search"
            value="{{ request()->search }}"
            class="form-control"
            placeholder="Search penjualan">

        <button class="btn btn-sm btn-info text-white" type="submit">
            Search
        </button>

    </div>

</form>

<table class="table align-middle">

    <thead>

        <tr>

            <th scope="col">#</th>
            <th scope="col">Tanggal Transaksi</th>
            <th scope="col">Kasir</th>
            <th scope="col">Total Pembayaran</th>
            <th scope="col">Metode Pembayaran</th>
            <th scope="col">Status</th>
            <th scope="col">Aksi</th>

        </tr>

    </thead>

    <tbody>

        @forelse($sales as $sale)

        <tr>

            <th scope="row">

                {{ $loop->iteration }}

            </th>

            <td>

                {{ $sale->created_at->translatedFormat('d F Y H:i:s') }}

            </td>

            <td>

                {{ $sale->user->name }}

            </td>

            <td>

                Rp {{ number_format($sale->total_pembayaran) }}

            </td>

            <td>

                {{ $sale->metode_pembayaran }}

            </td>

            <td>

                {{ $sale->status }}

            </td>

            <td>

                <div class="d-flex gap-2 align-items-center">

                    <a href="{{ route('penjualan.show', $sale) }}"
                        class="btn btn-info text-white">
                        Detail
                    </a>

                    @can('view', $sale)

                    <a href="{{ route('penjualan.edit', $sale) }}"
                        class="btn btn-info text-white">
                        Edit
                    </a>

                    @endcan

                    @can('delete', $sale)

                    <form action="{{ route('penjualan.destroy', $sale) }}"
                        method="POST">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-primary fw-bold"
                            onclick="return confirm('Apakah anda yakin akan menghapus penjualan ini?')">
                            Hapus
                        </button>

                    </form>

                    @endcan

                </div>

            </td>

        </tr>

        @empty

        <tr>

            <td colspan="7">

                Data Tidak Ditemukan

            </td>

        </tr>

        @endforelse

    </tbody>

</table>

@endsection