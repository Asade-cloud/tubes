<?php

namespace App\Http\Controllers;
use App\Models\Merek;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class MerekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function cari(Request $request){

        $cari = $request->cari;

        $mereks =Merek::where(function($query) use ($cari){

            $query->where('nama_merek',"like","%$cari%")
            ->orWhere('id',"like","%$cari%");

            })

            ->get();

            return view('merek.index',compact('mereks','cari',));

    }

    public function index()
    {
        $merek = Merek::all();
        $pageTitle = 'List Merek';


        return view('merek.index', [
            'pageTitle' => $pageTitle,
            'mereks' => $merek,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Merek';

        $mereks = Merek::all();

        return view('merek.create', compact('pageTitle', 'mereks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'unique' => 'Merek tidak boleh sama'
        ];

        $validator = Validator::make($request->all(), [
            'nama_merek' => 'required|unique:mereks,nama_merek',

        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();

        }

               // INSERT QUERY
               $merek = new Merek;
               $merek->nama_merek = $request->input('nama_merek');
               $merek->save();

               return redirect()->route('merek.index');
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
        $pageTitle = 'Edit Merek';

        // ELOQUENT

        $merek = Merek::find($id);

        return view('merek.edit', [
            'pageTitle' => $pageTitle,
            'merek' => $merek
        ]);
        // return view('employee.edit', compact('pageTitle', 'employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $mereks = Merek::find($id);
        $mereks->nama_merek = $request->nama_merek;


        $mereks->save();


        return redirect()->route('merek.index');    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Merek $merek)
    {
                // ELOQUENT
                Merek::destroy($merek->id);

                return redirect()->route('merek.index');
    }
}
