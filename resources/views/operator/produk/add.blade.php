@extends('layouts.app_sneat')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if (isset($produk))
                        <form action="/operator/produk/{{ $produk->id }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                        @else
                            <form action="/operator/produk" method="POST" enctype="multipart/form-data">
                    @endif
                    @csrf
                    <div class="form-group">
                        <label for="nama_produk">Nama Produk</label>
                        <input type="text" name="nama_produk"
                            class="form-control
                            @error('nama_produk')
                                is-invalid
                            @enderror"
                            placeholder="Nama produk"
                            value="{{ isset($produk) ? $produk->nama_produk : old('nama_produk') }}">
                        @error('nama_produk')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <div class="form-group mt-3">
                        <label for="kategori">Kategori</label>
                        <select name="kategori" id="kategori" class="form-control">
                            <option value="Ruangan"
                                {{ isset($produk) && $produk->kategori == 'Ruangan' ? 'selected' : '' }}>Ruangan</option>
                            <option value="Material"
                                {{ isset($produk) && $produk->kategori == 'Material' ? 'selected' : '' }}>Material
                            </option>
                            <option value="Dekorasi"
                                {{ isset($produk) && $produk->kategori == 'Dekorasi' ? 'selected' : '' }}>Dekorasi
                            </option>
                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <label for="">Deskripsi</label>
                        <textarea id="tiny" name="deskripsi"class="form-control" cols="30" rows="10">{{ isset($produk) ? $produk->deskripsi : old('deskripsi') }} </textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="harga_produk">Harga produk</label>
                        <div class="input-group">

                            <input type="text" name="formatted_harga_produk" id="formatted_harga_produk"
                                class="form-control
            @error('formatted_harga_produk')
                is-invalid
            @enderror"
                                placeholder="Harga produk"
                                value="{{ isset($produk) ? number_format($produk->harga_produk, 0, ',', '.') : old('formatted_harga_produk') }}"
                                data-inputmask-alias="numeric" data-inputmask-group-separator="." data-inputmask-digits="0"
                                data-inputmask-prefix="Rp " data-inputmask-remove-mask-on-submit="true">
                            <input type="hidden" name="harga_produk" id="harga_produk"
                                value="{{ isset($produk) ? $produk->harga_produk : old('harga_produk') }}">
                        </div>
                        @error('formatted_harga_produk')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <div class="form-group mt-3">
                        <label for="gambar">Gambar</label>
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

                        @if (isset($produk))
                            <img src="/{{ $produk->gambar }}" width="10%" class="mt-4" alt="">
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary mt-5">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const formattedHargaInput = document.getElementById('formatted_harga_produk');
            const hargaInput = document.getElementById('harga_produk');

            formattedHargaInput.addEventListener('input', function() {
                let harga = this.value.replace(/\D/g, ''); // Ambil nilai tanpa karakter non-digit
                hargaInput.value = harga; // Simpan nilai angka saja pada input tersembunyi

                if (harga.length > 3) {
                    harga = harga.replace(/\B(?=(\d{3})+(?!\d))/g, '.'); // Format dengan separator ribuan
                }
                this.value = `Rp ${harga}`; // Tampilkan nilai dengan format Rupiah
            });

            // Saat halaman dimuat, format nilai harga produk pada input
            if (formattedHargaInput.value !== '') {
                let harga = formattedHargaInput.value.replace(/\D/g, ''); // Ambil nilai tanpa karakter non-digit
                if (harga.length > 3) {
                    harga = harga.replace(/\B(?=(\d{3})+(?!\d))/g, '.'); // Format dengan separator ribuan
                }
                formattedHargaInput.value = `Rp ${harga}`; // Tampilkan nilai dengan format Rupiah
            }
        });
    </script>
@endsection
