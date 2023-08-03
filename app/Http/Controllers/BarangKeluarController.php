<?php
namespace App\Http\Controllers;
use App\Models\BarangKeluar;
use App\Models\Merek;
use Illuminate\Support\Facades\Validator;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Console\View\Components\Alert;
use Termwind\Components\Div;
class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function search(Request $request)
    {
        $search = $request->search;
        $pageTitle = 'Barang Keluar';


        $barangkeluars =BarangKeluar::where(function($query) use ($search){

            $query->where('id',"like","%$search%")
            ->orWhere('id',"like","%$search%");

            })

            ->get();

            return view('barangkeluar.index',compact('barangkeluars','search','pageTitle'));
    }
    public function index()
    {
        $barang = Barang::all()->pluck('nama_barang', 'id');
        $merek = Merek::all()->pluck("nama_merek", 'id');

        $pageTitle = 'Barang Keluar';

        $barangkeluars = BarangKeluar::all();

        return view('barangkeluar.index', [
            'barangkeluars' => $barangkeluars,
            'barang' => $barang,
            'pageTitle' =>$pageTitle,
            'merek' => $merek,
        ]);
    }

    /**
     * Show the form for creating a new resource.

     */
    public function create()
    {
        $barangs = Barang::all();
        $pageTitle = "Barang Keluar";


        return view('barangkeluar.create', compact( 'pageTitle','barangs'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',

        ];

        $validator = Validator::make($request->all(), [
            'stok' => 'required',

        ], $messages);



        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $barangs = Barang::findOrFail($request->barang_id);
        if($request->stok > $barangs->stok){
            return redirect()->back()->with("messages"," Gagal Stok Kurang");
        }
        $barangs->stok -= $request->stok;
        BarangKeluar::create($request->all());
        $barangs->save();

        return redirect()->route('barangkeluar.index');



    }

    /**
     * Display the specified resource.
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barangkeluar = BarangKeluar::find($id);
        $barangkeluar->delete();
        return redirect()->route("barangkeluar.index");
    }



}
