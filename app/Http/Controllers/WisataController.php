<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Wisata;
use Illuminate\Http\Request;

class WisataController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();
        return view('page.wisata.index', ['type_menu' => 'Wisata', 'kategoris' => $kategoris]);
    }

    public function getData()
    {
        return response()->json(Wisata::with('kategori')->latest()->get());
    }

    public function store(Request $request)
    {
        Wisata::create($request->all());

        return response()->json(['message' => 'Add Wisata successfully!']);
    }

    public function show(Wisata $wisata)
    {
        return response()->json($wisata);
    }

    public function update(Request $request, Wisata $wisata)
    {
        $wisata->update($request->all());

        return response()->json(['message' => 'Update Wisata successfully!']);
    }

    public function delete(Wisata $wisata)
    {
        $wisata->delete();

        return response()->json(['message' => 'Delete Wisata successfully!']);
    }

    public function detail(Wisata $wisata)
    {
        return view('page.wisata.detail', ['wisata' => $wisata, 'type_menu' => 'Wisata']);
    }
}
