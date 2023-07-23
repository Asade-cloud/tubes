<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\BarangMasuk;
use App\Models\Barang;
use App\Models\Supplier;



class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = Barang::all()->pluck('nama_barang', 'id');
        $supplier = Supplier::all()->pluck("nama", 'id');


        $barangmasuks = BarangMasuk::all();

        return view('barangmasuk.index', [
            'barangmasuks' => $barangmasuks,
            'barang' => $barang,
            'supplier' => $supplier

        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $suppliers = Supplier::all();
        $barangs = Barang::all();


        return view('barangmasuk.create', compact( 'suppliers','barangs'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

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
        // ELOQUENT
        $barangmasuk = BarangMasuk::findOrFail($id);
        $barangmasuk->update($request->all());

        $barang = Barang::findOrFail($request->barang_id);
        $barang->stok += $request->stok;

        $barang->update();


        return redirect()->route('barangmasuk.index');
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
