<?php

namespace App\Http\Controllers;
use App\Models\Kategori;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function search(Request $request){


        $search = $request->search;
        $pageTitle = 'List Kategori';


        $kategoris =Kategori::where(function($query) use ($search){

            $query->where('nama_kategori',"like","%$search%");
            })
            ->get();

            return view('kategori.index',compact('kategoris','search','pageTitle'));

    }

    public function index()
    {
        $pageTitle = 'List Kategori';

        $kategori = Kategori::all();

        return view('kategori.index', [
            'pageTitle' => $pageTitle,
            'kategoris' => $kategori
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Tanbah Kategori';

        $kategori = Kategori::all();

        return view('kategori.create', compact('pageTitle', 'kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'unique'   => ':Tidak boleh sama'

        ];

        $validator = Validator::make($request->all(), [
            'nama_kategori' => 'required|unique:kategoris,nama_kategori',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();

        }
               // INSERT QUERY
               $kategori = new Kategori;
               $kategori->nama_kategori = $request->input('nama_kategori');
               $kategori->save();
               return redirect()->route('kategori.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pageTitle = 'Edit Kategori';

        // ELOQUENT

        $kategori = Kategori::find($id);

        return view('kategori.edit', [
            'pageTitle' => $pageTitle,
            'kategori' => $kategori
        ]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = [
            'numeric' => 'Isi :Attribute dengan angka',
            'unique' => 'Isi : Dengan Kode yang berbeda'
        ];

        $validator = Validator::make($request->all(), [
            'nama_kategori' => 'required|unique:kategoris,nama_kategori,'.$id,
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();

        }

        $kategori = Kategori::find($id);
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->update();

        return redirect()->route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();

        return redirect()->route('kategori.index');
    }
}
