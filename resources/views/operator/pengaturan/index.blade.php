@extends('layouts.app_sneat')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="/operator/pengaturan/update" method="POST" enctype="multipart/form-data">
                        @method('PUT')

                        @csrf
                        <div class="alert alert-danger mb-5" role="alert">
                            Gambar Hanya max 5mb
                        </div>

                        <div class="form-group">
                            <label for="">Nama Insitusi</label>
                            <input type="text" name="judul"
                                class="form-control                             
                        @error('judul')
                            is-invalid
                            @enderror"
                                placeholder="Judul" value="{{ isset($pengaturan) ? $pengaturan->judul : old('judul') }}">
                            @error('judul')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="">Alamat Insitusi</label>
                            <textarea name="alamat"class="form-control" cols="30" rows="5">{{ isset($pengaturan) ? $pengaturan->alamat : old('alamat') }} </textarea>
                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="">Nomor Telpon insitusi</label>
                            <input type="text" name="hp"
                                class="form-control                             
                        @error('hp')
                            is-invalid
                            @enderror"
                                placeholder="hp" value="{{ isset($pengaturan) ? $pengaturan->hp : old('hp') }}">
                            @error('hp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">

                            <label for="">Logo insitusi</label>

                            <input type="file" name="logo"
                                class="form-control 
                            @error('logo')
                            is-invalid
                            @enderror"
                                placeholder="logo">
                            @error('logo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                            @if (isset($pengaturan))
                                <img src="/{{ $pengaturan->logo }}" width="20%" class="mt-4" alt="">
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary mt-5">Update</button>

                </div>
            </div>
        </div>
    </div>


    <div class="row justify-content-center mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <div class="form-group mt-3">
                        <label for="">Misi Insitusi</label>
                        <textarea id="textya" name="misi"class="form-control" cols="30" rows="10">{{ isset($pengaturan) ? $pengaturan->misi : old('misi') }} </textarea>
                        @error('misi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="">Visi Insitusi</label>
                        <textarea id="tiny" name="visi"class="form-control" cols="30" rows="10">{{ isset($pengaturan) ? $pengaturan->visi : old('visi') }} </textarea>
                        @error('visi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mt-5">Update</button>

                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <div class="alert alert-danger mb-5" role="alert">
                        Gambar Hanya max 5mb
                    </div>

                    <div class="form-group mt-3">
                        <label for="">Kepala Sekolah</label>
                        <input type="file" name="gambar"
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

                        @if (isset($pengaturan))
                            <img src="/{{ $pengaturan->gambar }}" width="20%" class="mt-4" alt="">
                        @endif
                    </div>

                    <div class="form-group mt-3">
                        <label for="">Sambutan Kepala Sekolah</label>
                        <textarea id="tiny" name="deskripsi"class="form-control" cols="30" rows="10">{{ isset($pengaturan) ? $pengaturan->deskripsi : old('deskripsi') }} </textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="">Vidio</label>
                        <input type="file" name="vidio"
                            class="form-control 
                            @error('vidio')
                            is-invalid
                            @enderror"
                            placeholder="vidio">
                        @error('vidio')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        @if (isset($pengaturan))
                            <video width="320" height="240" controls>
                                <source src="/{{ $pengaturan->vidio }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary mt-5">Update</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
