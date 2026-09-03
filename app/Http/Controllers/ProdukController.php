<?php

namespace App\Http\Controllers;

use App\Http\Requests\Produk\StoreRequest;
use App\Http\Requests\Produk\UpdateRequest;
use App\Http\Requests\SearchRequest;
use App\Models\JenisProduk;
use App\Models\Produk;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SearchRequest $request)
    {
        $this->authorize('viewAny', Produk::class);

        $keyword = $request->input('search');

        $products = Produk::with(['jenisProduk', 'user'])
            ->when($keyword, function ($query) use ($keyword) {
                $query->where('nama', 'like', '%' . $keyword . '%');
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('produk.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Produk::class);

        $jenisProduks = JenisProduk::orderBy('nama_jenis')->get();

        return view('produk.create', compact('jenisProduks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $this->authorize('create', Produk::class);

        $dataReq = $request->validated();

        $data = [
            'nama'            => $dataReq['name'],
            'jenis_produk_id' => $dataReq['jenis_produk_id'],
            'harga_beli'      => $dataReq['purchase_price'],
            'harga_jual'      => $dataReq['selling_price'],
            'stok'            => $dataReq['stock'],
            'user_id'         => auth()->id(),
        ];

        if ($request->hasFile('foto')) {
            $data['foto'] = $request
                ->file('foto')
                ->store('products', 'public');
        }

        Produk::create($data);

        return redirect()
            ->route('produk.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        $produk->load([
            'user',
            'jenisProduk',
        ]);

        return view('produk.show', compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        $this->authorize('update', $produk);

        $jenisProduks = JenisProduk::orderBy('nama_jenis')->get();

        return view('produk.edit', compact('produk', 'jenisProduks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Produk $produk)
    {
        $this->authorize('update', $produk);

        $dataReq = $request->validated();

        $data = [
            'nama'            => $dataReq['name'],
            'jenis_produk_id' => $dataReq['jenis_produk_id'],
            'harga_beli'      => $dataReq['purchase_price'],
            'harga_jual'      => $dataReq['selling_price'],
            'stok'             => $dataReq['stock'],
        ];

        if ($request->hasFile('foto')) {

            if (
                $produk->foto &&
                Storage::disk('public')->exists($produk->foto)
            ) {
                Storage::disk('public')->delete($produk->foto);
            }

            $data['foto'] = $request
                ->file('foto')
                ->store('products', 'public');
        }

        $produk->update($data);

        return redirect()
            ->route('produk.index')
            ->with('success', 'Produk berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        $this->authorize('delete', $produk);

        if (
            $produk->foto &&
            Storage::disk('public')->exists($produk->foto)
        ) {
            Storage::disk('public')->delete($produk->foto);
        }

        $produk->delete();

        return redirect()
            ->route('produk.index')
            ->with('success', 'Produk berhasil dihapus.');
    }
}