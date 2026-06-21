<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Services\CategoryService;

class CategoryController extends BaseController
{
    protected CategoryService $svc;

    public function __construct(CategoryService $svc)
    {
        $this->svc = $svc;
    }

    public function index()
    {
        return $this->success($this->svc->all(), "Daftar kategori");
    }

    public function store(StoreCategoryRequest $req)
    {
        $cat = $this->svc->create($req->validated());
        return $this->success($cat, "Kategori berhasil dibuat", 201);
    }

    public function show($id)
    {
        $cat = $this->svc->find($id);
        if (!$cat) return $this->error("Kategori tidak ditemukan", 404);

        return $this->success($cat);
    }

    public function update(UpdateCategoryRequest $req, $id)
    {
        $cat = $this->svc->update($id, $req->validated());
        return $this->success($cat, "Kategori diperbarui");
    }

    public function destroy($id)
    {
        $this->svc->delete($id);
        return $this->success(null, "Kategori dihapus", 204);
    }
}