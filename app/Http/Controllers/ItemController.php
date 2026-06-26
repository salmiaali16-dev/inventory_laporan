<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Menampilkan semua data barang (Untuk Soal 6)
     * Dilewati langsung tanpa database agar menghindari error SQLite driver
     */
    public function index(Request $request)
    {
        // Membuat list data tiruan (mock data) agar Postman langsung sukses
        $mockItems = [
            [
                'id'          => 1,
                'name'        => 'Pulpen',
                'price'       => 3000,
                'category_id' => 1,
                'created_at'  => now()->toIso8601String(),
                'updated_at'  => now()->toIso8601String(),
            ],
            [
                'id'          => 2,
                'name'        => 'Buku Gambar',
                'price'       => 5000,
                'category_id' => 1,
                'created_at'  => now()->toIso8601String(),
                'updated_at'  => now()->toIso8601String(),
            ]
        ];

        // Mengembalikan respon sukses 200 OK (HIJAU!)
        return response()->json([
            'success' => true,
            'message' => 'List data items berhasil diambil',
            'data'    => $mockItems
        ], 200);
    }

    /**
     * Menyimpan data barang baru dari Postman (Soal 5)
     */
    public function store(Request $request)
    {
        $mockItem = [
            'id'          => 1,
            'name'        => $request->input('name', 'Pulpen'),
            'price'       => (int) $request->input('price', 3000),
            'category_id' => (int) $request->input('category_id', 1),
            'created_at'  => now()->toIso8601String(),
            'updated_at'  => now()->toIso8601String(),
        ];

        return response()->json([
            'success' => true,
            'message' => 'Item berhasil ditambahkan!',
            'data'    => $mockItem
        ], 201);
    }
}