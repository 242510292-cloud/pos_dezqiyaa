@csrf

{{-- Foto Saat Ini --}}
@if (!empty($produk->foto))
    <div class="mb-3">
        <label class="form-label">Foto Saat Ini</label><br>

        <img src="{{ asset('storage/' . $produk->foto) }}"
             width="150"
             height="150"
             class="img-thumbnail"
             style="object-fit: cover"
             alt="Foto {{ $produk->nama }}">
    </div>
@endif

<div class="row">

    {{-- Gambar --}}
    <div class="col-12 mb-3">
        <label class="form-label">Gambar</label>

        <input type="file"
               name="foto"
               onchange="previewImage(this)"
               class="form-control @error('foto') is-invalid @enderror"
               accept="image/*">

        @error('foto')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- Preview Foto Baru --}}
    <div class="col-12 mb-3">
        <label class="form-label">Preview Foto</label><br>

        <img id="preview"
             class="img-thumbnail mt-2"
             style="display: none; width: 150px; height: 150px; object-fit: cover;"
             alt="Preview foto">
    </div>

    {{-- Nama Produk --}}
    <div class="col-12 mb-3">
        <label class="form-label">Nama Produk</label>

        <input type="text"
               name="name"
               class="form-control @error('name') is-invalid @enderror"
               value="{{ old('name', $produk->nama ?? '') }}">

        @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- Jenis Produk --}}
    <div class="col-12 mb-3">
        <label class="form-label">
            Jenis Produk
        </label>

        <select name="jenis_produk_id"
                class="form-select @error('jenis_produk_id') is-invalid @enderror">

            <option value="">
                -- Pilih Jenis --
            </option>

            @foreach ($jenisProduks as $jenis)
                <option value="{{ $jenis->id }}"
                    {{ old('jenis_produk_id', $produk->jenis_produk_id ?? '') == $jenis->id ? 'selected' : '' }}>
                    {{ $jenis->nama_jenis }}
                </option>
            @endforeach

        </select>

        @error('jenis_produk_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- Harga Beli --}}
    <div class="col-12 mb-3">
        <label class="form-label">Harga Beli</label>

        <input type="number"
               name="purchase_price"
               class="form-control @error('purchase_price') is-invalid @enderror"
               value="{{ old('purchase_price', $produk->harga_beli ?? '') }}">

        @error('purchase_price')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- Harga Jual --}}
    <div class="col-12 mb-3">
        <label class="form-label">Harga Jual</label>

        <input type="number"
               name="selling_price"
               class="form-control @error('selling_price') is-invalid @enderror"
               value="{{ old('selling_price', $produk->harga_jual ?? '') }}">

        @error('selling_price')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- Stok --}}
    <div class="col-12 mb-3">
        <label class="form-label">Stok</label>

        <input type="number"
               name="stock"
               class="form-control @error('stock') is-invalid @enderror"
               value="{{ old('stock', $produk->stok ?? '') }}">

        @error('stock')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

</div>

{{-- Tombol --}}
<button class="btn btn-success mt-2" type="submit">
    Simpan
</button>

<a href="{{ route('produk.index') }}"
   class="btn btn-secondary mt-2">
    Kembali
</a>


{{-- Preview JavaScript --}}
<script>
    function previewImage(input) {

        const preview = document.getElementById('preview');
        const file = input.files[0];

        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';
        } else {
            preview.src = '';
            preview.style.display = 'none';
        }
    }
</script>