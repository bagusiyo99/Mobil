@extends('layouts.app_sneat')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <a href="/operator/jasa/create" class="btn btn-primary mb-5"><i class="fas fa-plus"></i> Tambah</a>

                    <table class="table table-bordered text-center mt-4" id="data">

                        <thead>
                            <tr class="btn-secondary">
                                <td> No </td>
                                <td class="text-center"> Gambar </td>
                                <td> Judul</td>
                                {{-- <td width="50px"> Deskripsi </td> --}}
                                <td> Action </td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($jasa as $item)
                                <tr>
                                    <td> {{ $loop->iteration }} </td>
                                    <td><img src="/{{ $item->gambar }}" width="100px" alt=""> </td>
                                    <td> {{ $item->judul }} </td>
                                    {{-- <td> {{ $item->desc }} </td> --}}

                                    <td>
                                        <div class="text-center mb-1">
                                            <a href="/operator/jasa/{{ $item->id }}/edit "
                                                class="btn btn-success  mb-2">Edit</a>

                                            <form action="/operator/jasa/{{ $item->id }}" method="POST">
                                                @method ('delete')
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
