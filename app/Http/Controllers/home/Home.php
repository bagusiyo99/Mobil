<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Diskon;
use App\Models\Pengaturan;
use App\Models\Penyewa;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class Home extends Controller
{
    public function index()
    {
        
        $data = [
            'pengaturan' => Pengaturan::get(),
            'blog' => Blog::paginate(4),
            'banner' => Banner::get(),
            'diskon' => Diskon::where('diskon', '>', 0)->latest()->take(4)->get(),
            'content' => 'home/home/index'
        ];

        return view('home.home.index', $data);
    }

    public function send(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'hp' => 'required|unique:penyewas', // Pastikan hp unik dalam tabel 'penyewas'
            'alamat' => 'required',
            'tujuan' => 'required',
            'tgl_boking' => 'required',
            'tgl_selesai' => 'required',
            'jam' => 'required',
            'nama_id' => 'required', // Pastikan 'nama_id' terdapat di dalam validasi

        ]);

        // Di sini, tambahkan dd($data) untuk debug
        // dd($data);

        Penyewa::create($data);

    return redirect('/')->with('success', 'Data sudah terkirim!');
    }
}
