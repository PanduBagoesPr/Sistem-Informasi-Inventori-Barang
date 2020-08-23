<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_id' => 'required',
            'vendor_id' => 'required',
            'product_name' => 'required|string|unique:products',
            'price' => 'required|numeric',
            'status' => 'required',
            // 'image' => 'mimes:jpeg,jpg,png,gif'
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'Kategori wajib diisi.',
            'vendor_id.required' => 'Vendor wajib diisi.',
            'product_name.required' => 'Produk wajib diisi.',
            'product_name.string' => 'Produk hanya boleh huruf dan angka.',
            'product_name.unique' => 'Produk sudah tersedia di database.',
            'price.required' => 'Harga wajib diisi.',
            'price.numeric' => 'Harga hanya boleh diisi dengan angka.',
            'status.required' => 'Status wajib diisi.',
            'description.required' => 'Deskripsi wajib diisi.',
            // 'image.mimes' => 'Gambar hanya boleh berformat jpg, jpeg, png atau gif'
        ];
    }
}
