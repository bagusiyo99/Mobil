@extends('layouts.app_home')

@section('content')
    <div>
        <img src="/{{ settings()->get('banner') }}" width="100%" class="img-fluid" alt="...">
    </div>
    <div class="container-xxl py-5 mt-5">
        <div class="row g-0 gx-5 align-items-end">
            <div class="col-lg-6">
                <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <h1 class="display-5 mb-3">Produk Lengkap</h1>
                    <p>Jelajahi dunia furnitur yang penuh inspirasi! Kunjungi perusahaan kami dan
                        temukan koleksi lengkap yang akan membawa kehangatan dan keindahan ke setiap ruangan di rumah Anda.
                    </p>
                </div>
            </div>
            <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                <form action="{{ route('sale.lengkap') }}" method="GET">
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Other Contents -->
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="kategori">Pilih Kategori:</label>
                                <select name="kategori" id="kategori" class="form-control">
                                    <option value="all" {{ request('kategori') === 'all' ? 'selected' : '' }}>Semua
                                    </option>
                                    <option value="Ruangan" {{ request('kategori') === 'Ruangan' ? 'selected' : '' }}>
                                        Ruangan</option>
                                    <option value="Material" {{ request('kategori') === 'Material' ? 'selected' : '' }}>
                                        Material
                                    </option>
                                    <option value="Dekorasi" {{ request('kategori') === 'Dekorasi' ? 'selected' : '' }}>
                                        Dekorasi
                                    </option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Cari</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row g-4 mt-4">
            @forelse ($diskonLengkap as $item)
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="product-item">
                        <div class="position-relative bg-light overflow-hidden">
                            <img class="img-fluid w-100" src="/{{ $item->gambar }}"
                                style="height: 300px; object-fit: cover;" alt="">
                            {{-- <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                Diskon {{ $item->diskon }}%
                            </div> --}}
                        </div>
                        <div class="text-center p-4">
                            <a class="d-block h5 mb-2 text-uppercase" href="">{{ Str::limit($item->nama, 40) }}</a>
                            <span
                                class="text-primary me-1">{{ formatRupiah($item->harga_barang - ($item->harga_barang * $item->diskon) / 100) }}</span>
                            {{-- <span
                                class="text-body text-decoration-line-through">{{ formatRupiah($item->harga_barang) }}</span> --}}
                        </div>
                        <div class="d-flex border-top">
                            <small class="w-50 text-center border-end py-2">
                                <a class="text-body" href="{{ route('sale.detail', ['id' => $item->id]) }}"><i
                                        class="fa fa-eye text-primary me-2"></i>Detail</a>
                            </small>
                            @php
                                $pesan = "Hai, saya tertarik dengan produk {$item->nama} dengan ID {$item->id}.";
                                if ($item->diskon > 0) {
                                    $pesan .= " Produk ini memiliki diskon sebesar {$item->diskon}%. Saya ingin memesannya. Terima kasih!";
                                } else {
                                    $pesan .= ' Saya ingin memesannya. Terima kasih!';
                                }
                            @endphp

                            <small class="w-50 text-center py-2">
                                <a class="text-body" href="https://wa.me/095959?text={{ urlencode($pesan) }}"
                                    target="_blank">
                                    <i class="fab fa-whatsapp text-primary me-2"></i>Whatsapp</a>
                            </small>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center mt-5">
                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                            aria-label="Danger:">
                            <use xlink:href="#exclamation-triangle-fill" />
                        </svg>
                        <div>
                            Tidak ada produk yang ditemukan.
                        </div>
                    </div>
                </div>
            @endforelse

            @if ($diskonLengkap->isEmpty() && !empty(request('kategori')))
                <div class="col-12 text-center mt-5">
                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                            aria-label="Danger:">
                            <use xlink:href="#exclamation-triangle-fill" />
                        </svg>
                        <div>
                            Tidak ada produk yang sesuai dengan kategori yang dicari.
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- Product End -->
@endsection
