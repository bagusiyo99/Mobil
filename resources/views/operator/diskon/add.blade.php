@extends('layouts.app_sneat')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if (isset($diskon))
                        <form action="/operator/diskon/{{ $diskon->id }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                        @else
                            <form action="/operator/diskon" method="POST" enctype="multipart/form-data">
                    @endif
                    @csrf

                    <div class="form-group">
                        <label for="kode_barang">Kode Barang</label>
                        <input type="text" name="kode_barang"
                            class="form-control
                            @error('kode_barang')
                                is-invalid
                            @enderror"
                            placeholder="Kode Barang"
                            value="{{ isset($diskon) ? $diskon->kode_barang : old('kode_barang') }}">
                        @error('kode_barang')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="nama">Nama Barang</label>
                        <input type="text" name="nama"
                            class="form-control
                            @error('nama')
                                is-invalid
                            @enderror"
                            placeholder="Nama Barang" value="{{ isset($diskon) ? $diskon->nama : old('nama') }}">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>



                    <div class="form-group mt-3">
                        <label for="harga_barang">Harga Barang</label>
                        <div class="input-group">

                            <input type="text" name="formatted_harga_barang" id="formatted_harga_barang"
                                class="form-control
            @error('formatted_harga_barang')
                is-invalid
            @enderror"
                                placeholder="Harga Barang"
                                value="{{ isset($diskon) ? number_format($diskon->harga_barang, 0, ',', '.') : old('formatted_harga_barang') }}"
                                data-inputmask-alias="numeric" data-inputmask-group-separator="." data-inputmask-digits="0"
                                data-inputmask-prefix="Rp " data-inputmask-remove-mask-on-submit="true">
                            <input type="hidden" name="harga_barang" id="harga_barang"
                                value="{{ isset($diskon) ? $diskon->harga_barang : old('harga_barang') }}">
                        </div>
                        @error('formatted_harga_barang')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="">Deskripsi</label>
                        <textarea id="tiny" name="deskripsi"class="form-control" cols="30" rows="10">{{ isset($diskon) ? $diskon->deskripsi : old('deskripsi') }} </textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="kategori">Kategori</label>
                        <select name="kategori" id="kategori" class="form-control">
                            <option value="Honda" {{ isset($diskon) && $diskon->kategori == 'Honda' ? 'selected' : '' }}>
                                Honda</option>
                            <option value="Suzuki" {{ isset($diskon) && $diskon->kategori == 'Suzuki' ? 'selected' : '' }}>
                                Suzuki
                            </option>
                            <option value="Yamaha" {{ isset($diskon) && $diskon->kategori == 'Yamaha' ? 'selected' : '' }}>
                                Yamaha
                            </option>
                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <label for="status">Status Produk</label>
                        <input type="checkbox" name="status" id="status"
                            {{ isset($diskon) && $diskon->status === 'aktif' ? 'checked' : '' }}>
                        <label for="status">Aktif</label>
                    </div>



                    <div class="form-group mt-3">
                        <label for="diskon">Diskon Barang %</label>
                        <input type="number" name="diskon" class="form-control @error('diskon') is-invalid @enderror"
                            placeholder="Diskon Barang" value="{{ isset($diskon) ? $diskon->diskon : old('diskon') }}"
                            step="0.01" min="0.01">
                        @error('diskon')
                            <div class="invalid-feedback">{{ $message }}</div>
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

                        @if (isset($diskon))
                            <img src="/{{ $diskon->gambar }}" width="10%" class="mt-4" alt="">
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
            const formattedHargaInput = document.getElementById('formatted_harga_barang');
            const hargaInput = document.getElementById('harga_barang');
            const statusCheckbox = document.getElementById('status');
            const diskonInput = document.getElementsByName('diskon')[0];

            formattedHargaInput.addEventListener('input', function() {
                let harga = this.value.replace(/\D/g, ''); // Ambil nilai tanpa karakter non-digit
                hargaInput.value = harga; // Simpan nilai angka saja pada input tersembunyi

                if (harga.length > 3) {
                    harga = harga.replace(/\B(?=(\d{3})+(?!\d))/g, '.'); // Format dengan separator ribuan
                }
                this.value = `Rp ${harga}`; // Tampilkan nilai dengan format Rupiah
            });

            // Saat halaman dimuat, format nilai harga barang pada input
            if (formattedHargaInput.value !== '') {
                let harga = formattedHargaInput.value.replace(/\D/g, ''); // Ambil nilai tanpa karakter non-digit
                if (harga.length > 3) {
                    harga = harga.replace(/\B(?=(\d{3})+(?!\d))/g, '.'); // Format dengan separator ribuan
                }
                formattedHargaInput.value = `Rp ${harga}`; // Tampilkan nilai dengan format Rupiah
            }

            // Atur input diskon berdasarkan status produk saat halaman dimuat
            diskonInput.disabled = !statusCheckbox.checked; // Nonaktifkan input diskon jika tidak aktif
            if (!statusCheckbox.checked) {
                diskonInput.value = 0; // Set nilai diskon menjadi 0 jika tidak aktif
            }

            // Perbarui input diskon saat status produk berubah
            statusCheckbox.addEventListener('change', function() {
                diskonInput.disabled = !this.checked; // Nonaktifkan input diskon jika tidak aktif
                if (!this.checked) {
                    diskonInput.value = 0; // Set nilai diskon menjadi 0 jika tidak aktif
                }
            });
        });
    </script>
@endsection
