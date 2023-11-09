<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        return view('page.kategori.index', ['type_menu' => 'Kategori']);
    }

    public function getData()
    {
        return response()->json(Kategori::latest()->get());
    }

    public function store(Request $request)
    {
        Kategori::create([
            'kategori' => $request->kategori,
        ]);

        return response()->json(['message' => 'Add Kategori successfully!']);
    }

    public function show(Kategori $kategori)
    {
        return response()->json($kategori);
    }

    public function update(Request $request, Kategori $kategori)
    {
        $kategori->update([
            'kategori' => $request->kategori,
        ]);

        return response()->json(['message' => 'Update Kategori successfully!']);
    }

    public function delete(Kategori $kategori)
    {
        $kategori->delete();

        return response()->json(['message' => 'Delete Kategori successfully!']);
    }
}
