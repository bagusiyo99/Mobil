<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class HomeProduk extends Controller
{
    public function index(Request $request)
    {
        $kategori = $request->input('kategori');

        $produkQuery = Produk::query();

        if ($kategori && $kategori !== 'all') {
            $produkQuery->where('kategori', $kategori);
        }

        $produk = $produkQuery->get();

        $data = [
            'produk' => $produk,
            'content' => 'home.furnitur.index' // Sesuaikan dengan path view yang benar
        ];

        return view('home.furnitur.index', $data);
    }

    public function produk($id)
    {
        $produk = Produk::find($id);

        $data = [
            'produk' => $produk,
            'content' => 'home.furnitur.info' // Sesuaikan dengan path view yang benar
        ];

        return view('home.furnitur.info', $data);
    }
}
