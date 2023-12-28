@extends('layouts.app_home')

@section('content')
    <div>
        <img src="/{{ settings()->get('foto') }}" width="100%" class="img-fluid" alt="...">
    </div>
    <div class="container-xxl py-5 mt-5">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <!-- Left Section -->
                <div class="col-lg-6">
                    <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                        <h1 class="display-5 mb-3">Produk Diskon</h1>
                        <p>Jelajahi dunia furnitur yang penuh inspirasi! Kunjungi perusahaan kami dan temukan koleksi
                            lengkap yang akan membawa kehangatan dan keindahan ke setiap ruangan di rumah Anda.</p>
                    </div>
                </div>
                <!-- Right Section -->
                <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                    <form action="{{ route('sale.index') }}" method="GET">
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
                                            Material</option>
                                        <option value="Dekorasi" {{ request('kategori') === 'Dekorasi' ? 'selected' : '' }}>
                                            Dekorasi</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary mt-2">Cari</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <div class="container">
                <div class="row">
                    @forelse ($diskon as $item)
                        @if ($item->diskon > 0)
                            <div class="col-md-4">
                                <div class="car-wrap rounded ftco-animate">
                                    <div class="img rounded d-flex align-items-end"
                                        style="background-image: url(images/car-1.jpg);">
                                        <!-- Ensure correct image URL or use dynamic image data -->
                                    </div>
                                    <div class="text">
                                        <h2 class="mb-1"><a
                                                href="{{ route('sale.detail', $item->id) }}">{{ $item->nama }}</a></h2>
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <div>
                                                <span class="cat">{{ $item->kategori }}</span>
                                            </div>
                                            <div class="price">
                                                <p class="mb-0">
                                                    <del>{{ formatRupiah($item->harga_barang) }}</del><br>
                                                    {{ formatRupiah($item->harga_barang - ($item->harga_barang * $item->diskon) / 100) }}
                                                    <span>/day</span>
                                                </p>
                                            </div>
                                        </div>
                                        <p class="d-flex mb-0 d-block">
                                            <a href="#" class="btn btn-primary py-2 mr-1">Book now</a>
                                            <a href="{{ route('sale.detail', $item->id) }}"
                                                class="btn btn-secondary py-2 ml-1">Details</a>
                                        </p>
                                    </div>

                                </div>
                            </div>
                        @endif
                    @empty
                        <!-- Display message if no discounted products are found -->
                        <div class="col-12 text-center mt-5">
                            <div class="alert alert-danger d-flex align-items-center" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                                    aria-label="Danger:">
                                    <use xlink:href="#exclamation-triangle-fill" />
                                </svg>
                                <div>
                                    Tidak ada produk dengan diskon yang ditemukan.
                                </div>
                            </div>
                        </div>
                    @endforelse

                    @if ($diskon->isEmpty())
                        <!-- Display message if no products are found -->
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
                    @endif
                </div>
                <!-- Pagination -->
                <div class="row mt-5">
                    <div class="col text-center">
                        <div class="block-27">
                            <ul>
                                <!-- Pagination links -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
