<?php

namespace App\Http\Controllers;
use App\Models\Kategori;

use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'List Barang';

        $kategori = Kategori::all();

        return view('kategori.index', [
            'pageTitle' => $pageTitle,
            'kategoris' => $kategori
        ]);
    }


    public function data()
    {
        $kategori = Kategori::orderBy('id', 'desc')->get();

        return datatables()
            ->of($kategori)
            ->addIndexColumn()
            ->addColumn('action', function ($kategori) {
                return '
                <button onclick="editForm(`' . route('kategori.update', $kategori->id) . '`)" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                <button onclick="deleteData(`' . route('kategori.destroy', $kategori->id) . '`)" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kategori = new Kategori;
        $kategori->nama_kategori = $request->name;
        $kategori->save();

        return response()->json('Data Create Successfully!', 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kategori = Kategori::find($id);

        return response()->json($kategori);    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kategori = Kategori::find($id);
        $kategori->nama_kategori = $request->name;
        $kategori->update();

        return response()->json('Data Create Successfully!', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();

        return response(null, 204);
    }
}
