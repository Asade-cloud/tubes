<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Supplier;
use App\Models\Merek;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index()
    {
        $barang = Barang::count();
        $kategori = Kategori::count();
        $supplier = Supplier::count();
        $merek = Kategori::count();
        $barangmasuk = BarangMasuk::paginate(5);
        $barangkeluar = BarangKeluar::paginate(5);

        return view('home', [
            'barangs' => $barang,
            'kategoris' => $kategori,
            'suppliers' => $supplier,
            'mereks' => $merek,
            'barangmasuks' => $barangmasuk,
            'barangkeluars' => $barangkeluar

    ]);
    }
}