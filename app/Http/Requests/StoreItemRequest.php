<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest {
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'name'        => 'required|string|max:255',
            'quantity'    => 'required|integer|min:0', // <--- Diperbaiki di sini
            'price'       => 'required|numeric|min:0',    // <--- Diperbaiki di sini
            'category_id' => 'required|exists:categories,id',
        ];
    }

    public function messages() {
        return [
            'name.required'       => 'Nama item wajib diisi.',
            'quantity.integer'    => 'Jumlah harus angka bulat.', // <--- Diperbaiki di sini
            'price.numeric'       => 'Harga harus berupa angka.',   // <--- Diperbaiki di sini
            'category_id.exists'  => 'Kategori tidak ditemukan.',
        ];
    }
}