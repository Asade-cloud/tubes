<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Merek;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;



use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function search(Request $request){


        $search = $request->search;

        $barangs =Barang::where(function($query) use ($search){

            $query->where('nama_barang',"like","%$search%");
            })
            ->get();
            return view('barang.index',compact('barangs','search',));

    }

    public function index()
    {


            $kategori = Kategori::all()->pluck('nama_kategori', 'id');
            $merek = Merek::all()->pluck("nama_merek", 'id');

            $pageTitle = 'List Barang';

            $barang = Barang::all();

            return view('barang.index', [
                'pageTitle' => $pageTitle,
                'barangs' => $barang,
                'kategori' => $kategori,
                'merek' => $merek,
            ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Create Employee';

        $kategoris = Kategori::all();
        $mereks = Merek::all();

        return view('barang.create', compact('pageTitle', 'kategoris','mereks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'numeric' => 'Isi :Attribute dengan angka',
            'unique' => 'Tidak Boleh Sama'
        ];

        $validator = Validator::make($request->all(), [
            'nama_barang' => 'required|unique:barangs,nama_barang',
            'kategori' => 'required',
            'merek' => 'required',
            'image' => 'image|file|max:4000'
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();

        }

               // INSERT QUERY
               $barang = new Barang;
               $barang->nama_barang = $request->input('nama_barang');
               $barang->merek_id = $request->input('merek');
               $barang->kategori_id = $request->input('kategori');
               if ($request->file('image')){
            $barang->image = $request->file('image')->store('barang-image');
            }

               $barang->save();

               return redirect()->route('barang.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pageTitle = 'Barang Detail';

        // Eloquent
        $barang = Barang::find($id);


        return view('barang.show', compact('pageTitle', 'barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */


    public function edit(string $id)
    {
        $pageTitle = 'Barang Edit';

        // ELOQUENT
        $kategori = Kategori::all();
        $barang = Barang::find($id);
        $merek = Merek::all();

        return view('barang.edit', [
            'pageTitle' => $pageTitle,
            'barang' => $barang,
            'kategori' => $kategori,
            'merek' => $merek,
        ]);


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $messages = [
            'required' => ':Attribute harus diisi.',
            'numeric' => 'Isi :Attribute dengan angka',
            'unique' => 'Isi : Dengan Kode yang berbeda'
        ];

        $validator = Validator::make($request->all(), [
            'nama_barang' => 'required|unique:barangs,nama_barang,'.$id,
            'kategori' => 'required',
            'merek' => 'required',
            'stok' => 'required|numeric',
            'image' => 'image|file|max:4000'
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();

        }
        // ELOQUENT
        $barang = Barang::find($id);
        $barang->nama_barang = $request->nama_barang;
        $barang->kategori_id = $request->kategori;
        $barang->merek_id = $request->merek;

        if ($request->file('image')){
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
        $barang->image = $request->file('image')->store('barang-image');
        }

        $barang->save();


        return redirect()->route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
         // ELOQUENT

        if($barang->image){
            Storage::delete($barang->image);
        }
        Barang::find($barang->id)->delete();

         return redirect()->route('barang.index');



    }
}
