<?php

namespace App\Http\Controllers;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class SupplierController extends Controller
{
    public function search(Request $request){


        $search = $request->search;
        $pageTitle = 'List Supplier';


        $suppliers =Supplier::where(function($query) use ($search){

            $query->where('nama',"like","%$search%");
            })
            ->get();

            return view('supplier.index',compact('suppliers','search','pageTitle'));

    }

    public function index()
    {
        $supplier = Supplier::all();
        $pageTitle = 'List Supplier';


        return view('supplier.index', [
            'pageTitle' => $pageTitle,
            'suppliers' => $supplier,
        ]);

    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Tanbah Supplier';

        $supplier = Supplier::all();

        return view('supplier.create', compact('pageTitle', 'supplier'));
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
            'nama' => 'required',
            'email' => 'required',
            'telepon' => 'required',
            'alamat' => 'required'
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();

        }

               // INSERT QUERY
               $supplier = new Supplier;
               $supplier->nama = $request->input('nama');
               $supplier->alamat = $request->input('alamat');
               $supplier->telepon = $request->input('telepon');
               $supplier->email = $request->input('email');
               $supplier->save();

               return redirect()->route('supplier.index');
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
        $pageTitle = 'Edit Supplier';

        // ELOQUENT

        $supplier = Supplier::find($id);

        return view('supplier.edit', [
            'pageTitle' => $pageTitle,
            'supplier' => $supplier
        ]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'unique' => 'Data tidak boleh sama'
        ];

        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'telepon' => 'required',
            'alamat' => 'required'

        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();

        }
        $supplier = Supplier::find($id);
        $supplier->nama = $request->nama;
        $supplier->telepon = $request->telepon;
        $supplier->email = $request->email;
        $supplier->alamat = $request->alamat;

        $supplier->save();


        return redirect()->route('supplier.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();
        return redirect()->route('supplier.index');

    }
}
