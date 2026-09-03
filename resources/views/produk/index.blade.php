@extends('layouts.app')

@section('title', 'Produk')

@section('content')

@include('layouts.navbar')

<h1 class="fw-bold text-primary">
    <i class="bi bi-box-seam me-2"></i>
    Produk
</h1>

@can('create', App\Models\Produk::class)
    <a href="{{ route('produk.create') }}" class="btn btn-primary mb-3">
        Create
    </a>
@endcan

<form action="{{ route('produk.index') }}" method="GET" class="mb-3">
    <div class="input-group">
        <input
            type="text"
            name="search"
            value="{{ request()->search }}"
            class="form-control"
            placeholder="Search nama produk">

        <button class="btn btn-sm btn-info text-white" type="submit">
            Search
        </button>
    </div>
</form>

<table class="table align-middle">

    <thead>
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nama</th>
            <th>Jenis</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>

        @forelse ($products as $product)

            <tr>

                <th>
                    {{ $products->firstItem() + $loop->index }}
                </th>

                <td>
                 @if($product->foto)
    <img
        src="{{ asset('storage/' . $product->foto) }}"
        width="100"
        height="100"
        class="img-thumbnail"
        style="object-fit: cover">
@else
    <span class="text-muted">
        Tidak ada foto
    </span>
@endif
                </td>

                <td>
                    {{ $product->nama }}
                </td>

                <td>
                    {{ $product->jenisProduk?->nama_jenis ?? '-' }}
                </td>

                <td>
                    Rp {{ number_format($product->harga_beli, 0, ',', '.') }}
                </td>

                <td>
                    Rp {{ number_format($product->harga_jual, 0, ',', '.') }}
                </td>

                <td>
                    {{ $product->stok }}
                </td>

                <td>

                    <div class="d-flex gap-1">

                        <a
                            href="{{ route('produk.show', $product) }}"
                            class="btn btn-info text-white">
                            Detail
                        </a>

                        @can('update', $product)

                            <a
                                href="{{ route('produk.edit', $product) }}"
                                class="btn btn-info text-white">
                                Edit
                            </a>

                        @endcan

                        @can('delete', $product)

                            <form
                                action="{{ route('produk.destroy', $product) }}"
                                method="POST"
                                class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn btn-primary fw-bold"
                                    onclick="return confirm('Apakah anda yakin akan menghapus produk ini?')">
                                    Hapus
                                </button>

                            </form>

                        @endcan

                    </div>

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="8" class="text-center">

                    <h4 class="py-3">
                        Data tidak tersedia.
                    </h4>

                </td>

            </tr>

        @endforelse

    </tbody>

</table>



@endsection