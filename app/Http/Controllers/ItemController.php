<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Menampilkan semua data barang (bisa difilter berdasarkan category_id)
     */
    public function index(Request $request)
    {
        // Mengambil query param ?category_id= jika ada di URL Postman
        $categoryId = $request->query('category_id');

        $query = Item::query();

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        // Mengambil data dari database
        $items = $query->get();

        // Mengembalikan respon sukses berupa JSON
        return response()->json([
            'success' => true,
            'message' => 'List data items',
            'data' => $items
        ], 200);
    }
}