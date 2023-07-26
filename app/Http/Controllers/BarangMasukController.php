<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\BarangMasuk;
use App\Models\Barang;
use App\Models\Supplier;
use Illuminate\Support\Facades\Validator;




class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function search(Request $request)
    {
        $search = $request->search;
        $pageTitle = 'Barang Masuk';
        $barangmasuks =BarangMasuk::where(function($query) use ($search){
            $query->where('id',"like","%$search%")
            ->orWhere('id',"like","%$search%");

            })

            ->get();

            return view('barangmasuk.index',compact('barangmasuks','search','pageTitle'));
    }

    public function index()
    {
        $barang = Barang::all()->pluck('nama_barang', 'id');
        $supplier = Supplier::all()->pluck("nama", 'id');
        $pageTitle = 'Barang Masuk';


        $barangmasuks = BarangMasuk::all();

        return view('barangmasuk.index', [
            'barangmasuks' => $barangmasuks,
            'barang' => $barang,
            'supplier' => $supplier,
            'pageTitle' => $pageTitle
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $suppliers = Supplier::all();
        $barangs = Barang::all();
        $pageTitle = 'Barang Masuk';


        return view('barangmasuk.create', compact( 'suppliers','barangs','pageTitle'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'numeric' => 'Isi :Attribute dengan angka',
        ];

        $validator = Validator::make($request->all(), [
            'stok' => 'required|numeric',

        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();

        }
        BarangMasuk::create($request->all());

        $barangs = Barang::findOrFail($request->barang_id);
        $barangs->stok += $request->stok;
        $barangs->save();
        return redirect()->route('barangmasuk.index');

    }

    /**
     * Display the specified resource.
     *
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        {

            // ELOQUENT
            $barang = Barang::all();
            $supplier = Supplier::all();
            $barangmasuk = BarangMasuk::find($id);

            return view('barangmasuk.edit', [
                'barangmasuk' => $barangmasuk,
                'supplier' => $supplier,
                'barang' => $barang,
            ]);


        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( BarangMasuk $barangmasuk)
    {
        BarangMasuk::destroy($barangmasuk->id);


        return redirect()->route('barangmasuk.index');
    }
}
