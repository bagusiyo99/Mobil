@extends('layouts.app_sneat')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <a href="/operator/produk/create" class="btn btn-primary mb-5"><i class="fas fa-plus"></i> Tambah</a>

                    <table class="table table-bordered text-center mt-4" id="data">
                        <thead>
                            <tr class="btn-secondary">
                                <td>No</td>
                                <td>Nama Barang</td>
                                <td>Kategori</td>

                                <td>Harga Barang</td>
                                <td>Gambar</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produk as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_produk }}</td>
                                    <td>{{ $item->kategori }}</td>

                                    <td>{{ formatRupiah($item->harga_produk) }}</td> <!-- Memanggil fungsi formatRupiah -->
                                    </td> <!-- Menampilkan harga setelah diskon -->
                                    </td>

                                    <td>
                                        @if ($item->gambar)
                                            <img src="/{{ $item->gambar }}" alt="Gambar Barang" width="100">
                                        @endif
                                    </td>
                                    <td>
                                        <div class="text-center mb-1">
                                            <a href="/operator/produk/{{ $item->id }}/edit"
                                                class="btn btn-success  mb-2">Edit</a>
                                            <form action="/operator/produk/{{ $item->id }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger mx-2">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
