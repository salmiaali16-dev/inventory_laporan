### 1. Get All Items with Filter

Mengembalikan daftar semua item. Mendukung penyaringan (filter) berdasarkan ID kategori.

- **URL:** `/api/v1/items`
- **Method:** `GET`
- **Query Parameters:**
  - `category_id` (Optional): ID dari kategori yang ingin difilter (Contoh: `?category_id=1`).

- **Response Sukses (Data Ada - 200 OK):**
  ```json
  {
      "success": true,
      "message": "List data items",
      "data": [
          {
              "id": 1,
              "name": "Nama Item",
              "category_id": 1
          }
      ]
  }