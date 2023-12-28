<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Penyewa;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminSewa extends Controller
{
  public function index()
    {
        $data =[
            'title' => 'Manajemen Pesan',
            'sewa' => Penyewa::latest()->get(),
            'content' => 'operator/sewa/index'
        ];
        return view ('operator.sewa.index', $data );
    }

    public function show ($id)
    {
    $data = [
        'sewa' => Penyewa::find($id),
        'content'=> 'operator/sewa/show'
    ];
    return view('operator.sewa.show',$data);
    }

        public function destroy($id)
    {
        $sewa = Penyewa::find ($id);


        Alert::success('sukses', 'data berhasil dihapus');
        $sewa->delete();
        return redirect ('/operator/sewa');
        
    }}
