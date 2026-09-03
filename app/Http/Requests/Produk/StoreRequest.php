<?php

namespace App\Http\Requests\Produk;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'jenis_produk_id' => 'required|exists:jenis_produks,id',
            'purchase_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'stock' => 'required|integer',
            'foto' => 'nullable|image',
        ];
    }

    public function messages(): array
    {
        return [
            'foto.image' => 'File yang diupload harus berupa gambar.',
            'foto.mimes' => 'Extensi gambar harus JPG, JPEG, PNG.',
            'foto.max' => 'Maxsimal ukuran gambar 2MB.',

            'name.required' => 'Nama wajib diisi.',

            'jenis_produk_id.required' => 'Jenis produk wajib dipilih.',
            'jenis_produk_id.exists' => 'Jenis produk yang dipilih tidak valid.',

            'purchase_price.required' => 'Purchase price wajib diisi.',
            'purchase_price.integer' => 'Purchase price harus diisi bilangan bulat.',

            'selling_price.required' => 'Selling price wajib diisi.',
            'selling_price.integer' => 'Selling price harus diisi bilangan bulat.',

            'stock.required' => 'Stock wajib diisi.',
            'stock.integer' => 'Stock harus diisi angka.',
        ];
    }
}