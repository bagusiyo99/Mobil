@extends('layouts.app_sneat')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if (isset($blog))
                        <form action="/operator/blog/{{ $blog->id }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                        @else
                            <form action="/operator/blog" method="POST" enctype="multipart/form-data">
                    @endif
                    @csrf
                    <div class="form-group">
                        <label for="">Judul</label>
                        <input type="text" name="judul"
                            class="form-control                             
                        @error('judul')
                            is-invalid
                            @enderror"
                            placeholder="Judul" value="{{ isset($blog) ? $blog->judul : old('judul') }}">
                        @error('judul')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <div class="form-group mt-3">
                        <label for="">Deskripsi</label>
                        <textarea id="tiny" name="deskripsi" class="form-control  " cols="30" rows="10">{{ isset($blog) ? $blog->deskripsi : '' }} </textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="">Gambar</label>
                        <input type="file" name="gambar" accept="image/png, image/jpg, image/jpeg"
                            class="form-control 
                            @error('gambar')
                            is-invalid
                            @enderror"
                            placeholder="Gambar">
                        @error('gambar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        @if (isset($blog))
                            <img src="/{{ $blog->gambar }}" width="100%" class="mt-4" alt="">
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
