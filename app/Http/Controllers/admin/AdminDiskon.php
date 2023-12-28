<?php
/// dua komponen jika di buat folder
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use App\Models\Diskon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class AdminDiskon extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Manajemen Barang',
            'diskon' => Diskon::get(),
            'content' => 'operator.diskon.index',
        ];

        return view('operator.diskon.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Diskon',
            'content' => 'operator.diskon.add',
        ];

        return view('operator.diskon.add', $data);
    }


   public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'diskon' => 'required_if:status,aktif|numeric|min:0|max:100',
            'harga_barang' => 'required|numeric|min:0',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:15048',
            'kategori' => 'required',
            'deskripsi' => 'required',
            'kode_barang' => 'required',
        ], [
            'nama.required' => 'Nama diskon wajib diisi.',
            'diskon.required' => 'Diskon wajib diisi.',
            'kategori.required' => 'Kategori wajib diisi.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'diskon.numeric' => 'Diskon harus berupa angka.',
            'diskon.min' => 'Diskon minimal :min.',
            'diskon.max' => 'Diskon maksimal :max.',
            'harga_barang.required' => 'Harga diskon wajib diisi.',
            'harga_barang.numeric' => 'Harga diskon harus berupa angka.',
            'harga_barang.min' => 'Harga diskon minimal :min.',
            'gambar.required' => 'Gambar wajib diunggah.',
            'gambar.image' => 'File harus berupa gambar.',
            'gambar.mimes' => 'File harus memiliki format jpeg, png, jpg, atau gif.',
            'gambar.max' => 'Ukuran gambar maksimal :max kilobytes.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Data wajib diisi');
        }

        $data = $request->all();
        $kode_barang = $data['kode_barang'];

        $harga_barang = $data['harga_barang'];
        $kategori = $data['kategori'];
        $deskripsi = $data['deskripsi'];

        // Pemeriksaan untuk memastikan 'diskon' ada dalam array $data
        $diskon = $request->has('diskon') ? $data['diskon'] : 0;

        $status = $request->has('status') ? 'aktif' : 'tidak aktif';


        $harga_setelah_diskon = $status === 'aktif' ? $harga_barang - ($harga_barang * $diskon) / 100 : $harga_barang;

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $file_name = time() . '-' . $gambar->getClientOriginalName();

            $storage = 'uploads/diskon/';
            $gambar->move($storage, $file_name);
            $data['gambar'] = $storage . $file_name;
        }

        Diskon::create([
            'nama' => $data['nama'],
            'kategori' => $kategori,
            'kode_barang' => $kode_barang,
            'deskripsi' => $deskripsi,
            'status' => $status,
            'diskon' => $diskon,

            'harga_barang' => $harga_barang,
            'gambar' => $data['gambar'],
        ]);

        Alert::success('Sukses', 'Data berhasil ditambahkan');

        return redirect('/operator/diskon');
    }


    public function edit($id)
    {
        $data = [
            'title' => 'Edit Diskon',
            'diskon' => Diskon::find($id),
            'content' => 'operator.diskon.add',
        ];

        return view('operator.diskon.add', $data);
    }

    public function update(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'nama' => 'required',
        'diskon' => 'required_if:status,aktif|numeric|min:0|max:100',
        'harga_barang' => 'required|numeric|min:0',
        'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:15048',
        'kategori' => 'required',
        'deskripsi' => 'required ',
        'kode_barang' => 'required',
    ], [
        'nama.required' => 'Nama diskon wajib diisi.',
        'kategori.required' => 'kategori wajib diisi.',
        'deskripsi.required' => 'deskripsi wajib diisi.',
        'diskon.required' => 'Diskon wajib diisi.',
        'diskon.numeric' => 'Diskon harus berupa angka.',
        'diskon.min' => 'Diskon minimal :min.',
        'diskon.max' => 'Diskon maksimal :max.',
        'harga_barang.required' => 'Harga diskon wajib diisi.',
        'harga_barang.numeric' => 'Harga diskon harus berupa angka.',
        'harga_barang.min' => 'Harga diskon minimal :min.',
        'gambar.image' => 'File harus berupa gambar.',
        'gambar.mimes' => 'File harus memiliki format jpeg, png, jpg, atau gif.',
        'gambar.max' => 'Ukuran gambar maksimal :max kilobytes.',
    ]);


   if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput()
            ->with('error', 'Data wajib diisi');
    }

    $diskon = Diskon::find($id);

        $data = $request->all();
        $kode_barang = $data['kode_barang'];
        $harga_barang = $data['harga_barang'];
        $kategori = $data['kategori'];
        $deskripsi = $data['deskripsi'];

    $status = $request->has('status') ? 'aktif' : 'tidak aktif';
    $diskonValue = $status === 'aktif' ? $request->input('diskon') : 0; // Set diskon menjadi 0 jika status tidak aktif


        $harga_setelah_diskon = $status === 'aktif' ? $harga_barang - ($harga_barang * $diskonValue) / 100 : $harga_barang;

    if ($request->hasFile('gambar')) {
        if ($diskon->gambar != null) {
            unlink($diskon->gambar);
        }

        $gambar = $request->file('gambar');
        $file_name = time() . '-' . $gambar->getClientOriginalName();

        $storage = 'uploads/diskon/';
        $gambar->move($storage, $file_name);
        $data['gambar'] = $storage . $file_name;
    } else {
        $data['gambar'] = $diskon->gambar;
    }

    $diskon->update([
        'nama' => $data['nama'],
        'kode_barang' => $kode_barang,
        'diskon' => $diskonValue, // Menggunakan variable yang sudah direname
        'kategori' => $kategori,
        'deskripsi' => $deskripsi,
        'harga_barang' => $harga_barang,
        'gambar' => $data['gambar'],
        'status' => $status,
        

    ]);

    Alert::success('Sukses', 'Data berhasil diupdate');

    return redirect('/operator/diskon');
}




    public function destroy($id)
    {
        $diskon = Diskon::find($id);

        if ($diskon->gambar != null) {
            unlink($diskon->gambar);
        }

        Alert::success('Sukses', 'Data berhasil dihapus');
        $diskon->delete();

        return redirect('/operator/diskon');
    }
}
