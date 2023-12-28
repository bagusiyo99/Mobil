@extends('layouts.app_sneat')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <a href="/operator/diskon/create" class="btn btn-primary mb-5"><i class="fas fa-plus"></i> Tambah</a>

                    <table class="table table-bordered text-center mt-4" id="data">
                        <thead>
                            <tr class="btn-secondary">
                                <td>No</td>
                                <td>Kode Mobil</td>
                                <td>Nama Mobil</td>
                                <td>Harga Mobil</td>
                                <td>Diskon Mobil</td>
                                <td>Harga Diskon</td>
                                <td>Status</td>
                                <td>Gambar</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($diskon as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->kode_barang }}</td>

                                    <td>{{ $item->nama }}</td>
                                    <td>{{ formatRupiah($item->harga_barang) }}</td> <!-- Memanggil fungsi formatRupiah -->
                                    @if ($item->diskon > 0 && $item->status == 'aktif')
                                        <td><span class="badge bg-primary">{{ $item->diskon }} % Diskon</span></td>
                                        <td>{{ formatRupiah($item->harga_barang - ($item->harga_barang * $item->diskon) / 100) }}
                                        </td>
                                    @else
                                        <td><span class="badge bg-success">Tanpa Diskon</span></td>

                                        <td>{{ formatRupiah($item->harga_barang) }}</td>
                                    @endif
                                    <td><span
                                            class="badge  {{ $item->status == 'aktif' ? 'bg-primary' : 'bg-danger' }}">{{ $item->status }}</span>
                                    </td>
                                    <td>
                                        @if ($item->gambar)
                                            <img src="/{{ $item->gambar }}" alt="Gambar Barang" width="100">
                                        @endif
                                    </td>
                                    <td>
                                        <div class="text-center mb-1">
                                            <a href="/operator/diskon/{{ $item->id }}/edit"
                                                class="btn btn-success  mb-2">Edit</a>
                                            <form action="/operator/diskon/{{ $item->id }}" method="POST">
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
