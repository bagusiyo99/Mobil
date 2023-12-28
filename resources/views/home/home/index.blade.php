<style>
    /* Styling untuk dropdown */
    select.form-control {
        color: black;
        /* Warna teks hitam */
    }
</style>
@extends('layouts.app_home')

@section('content')
    <div class="hero-wrap ftco-degree-bg" style="background-image: url('images/bg_1.jpg');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
                <div class="col-lg-8 ftco-animate">
                    <div class="text w-100 text-center mb-md-5 pb-md-5">
                        <h1 class="mb-4">Fast &amp; Easy Way To Rent A Car</h1>
                        <p style="font-size: 18px;">A small river named Duden flows by their place and supplies it with
                            the necessary regelialia. It is a paradisematic country, in which roasted parts</p>
                        <a href="https://vimeo.com/45830194"
                            class="icon-wrap popup-vimeo d-flex align-items-center mt-4 justify-content-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="ion-ios-play"></span>
                            </div>
                            <div class="heading-title ml-5">
                                <span>Easy steps for renting a car</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section ftco-no-pt bg-light">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-12	featured-top">
                    <div class="row no-gutters">
                        <div class="col-md-4 d-flex align-items-center">

                            <form action="/home/send" method="POST" class="request-form ftco-animate bg-primary">
                                @csrf

                                <h2>Sewa Mobil Sekarang </h2>
                                <div class="form-group">
                                    <label for="" class="label">Nama lengkap</label>
                                    <input type="text" name="name"
                                        class="form-control                             
                                                    @error('name')
                                                        is-invalid
                                                    @enderror"
                                        placeholder="Masukkan name lengkap"
                                        value="{{ isset($penyewa) ? $penyewa->name : old('name') }}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="" class="label">Alamat Tempat Tinggal</label>
                                    <input type="text" name="alamat"
                                        class="form-control                             
                                                    @error('alamat')
                                                        is-invalid
                                                    @enderror"
                                        placeholder="Masukkan alamat tempat tinggal"
                                        value="{{ isset($penyewa) ? $penyewa->alamat : old('alamat') }}">
                                    @error('alamat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="" class="label">alamat tujuan</label>
                                    <input type="text" name="tujuan"
                                        class="form-control                             
                                                    @error('tujuan')
                                                        is-invalid
                                                    @enderror"
                                        placeholder="Masukkan alamat tujuan"
                                        value="{{ isset($penyewa) ? $penyewa->tujuan : old('tujuan') }}">
                                    @error('tujuan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>




                                <div class="d-flex">
                                    <div class="form-group mr-2">
                                        <label for="" class="label">tanggal awal sewa</label>
                                        <input type="text"id="tgl-boking" name="tgl_boking"
                                            class="form-control                             
                                                    @error('tgl_boking')
                                                        is-invalid
                                                    @enderror"
                                            placeholder="Masukkan tanggal awal sewa"
                                            value="{{ isset($penyewa) ? $penyewa->tgl - boking : old('tgl_boking') }}">
                                        @error('tgl_boking')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group ml-2">
                                        <label for="" class="label"> tanggal selesai sewa </label>
                                        <input type="text" id="tgl-boking" name="tgl_selesai"
                                            class="form-control                             
                                                    @error('tgl_selesai')
                                                        is-invalid
                                                    @enderror"
                                            placeholder="Masukkan tanggal selesai sewa"
                                            value="{{ isset($penyewa) ? $penyewa->tgl - selesai : old('tgl_selesai') }}">
                                        @error('tgl_selesai')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>




                                <div class="form-group">
                                    <label for="" class="label">Whatsapp</label>
                                    <input type="text" name="hp"
                                        class="form-control                             
                                                    @error('hp')
                                                        is-invalid
                                                    @enderror"
                                        placeholder="Masukkan nomor whatsapp"
                                        value="{{ isset($penyewa) ? $penyewa->hp : old('hp') }}">
                                    @error('hp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="" class="label">Pilih Mobil </label>
                                    <select name="nama_id"
                                        class="form-control custom-select @error('nama_id') is-invalid @enderror">
                                        <option value="">Pilih Mobil</option>
                                        @foreach ($diskon as $diskons)
                                            <option value="{{ $diskons->id }}">{{ $diskons->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('nama_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>



                                <div class="form-group">
                                    <label for="" class="label">Jam Pemberangkatan</label>
                                    <select name="jam"
                                        class="form-control custom-select @error('jam') is-invalid @enderror"
                                        placeholder="Pilih jam">
                                        <option value="">Pilih Jam</option>
                                        <?php
                                        for ($i = 0; $i <= 23; $i++) {
                                            $hour = str_pad($i, 2, '0', STR_PAD_LEFT);
                                            echo "<option value='$hour'>$hour:00</option>";
                                        }
                                        ?>
                                    </select>
                                    @error('jam')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>



                                <div class="form-group">
                                    <input type="submit" value="Sewa Mobil" class="btn btn-secondary py-3 px-4">
                                </div>
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                            </form>
                        </div>
                        <div class="col-md-8 d-flex align-items-center">
                            <div class="services-wrap rounded-right w-100">
                                <h3 class="heading-section mb-4">Cara Lebih Baik untuk Menyewa Mobil untuk Anda</h3>
                                <div class="row d-flex mb-4">
                                    <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                                        <div class="services w-100 text-center">
                                            <div class="icon d-flex align-items-center justify-content-center"><span
                                                    class="flaticon-route"></span></div>
                                            <div class="text w-100">
                                                <h3 class="heading mb-2">Pilih Lokasi Tujuan</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                                        <div class="services w-100 text-center">
                                            <div class="icon d-flex align-items-center justify-content-center"><span
                                                    class="flaticon-handshake"></span></div>
                                            <div class="text w-100">
                                                <h3 class="heading mb-2">Negoisasi harga</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                                        <div class="services w-100 text-center">
                                            <div class="icon d-flex align-items-center justify-content-center"><span
                                                    class="flaticon-rent"></span></div>
                                            <div class="text w-100">
                                                <h3 class="heading mb-2">Pesan Mobil yang ingin Anda Sewa</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p><a type="submit" class="btn btn-primary py-3 px-4">Lihat Daftar Mobil </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>


    <section class="ftco-section ftco-no-pt bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                    <span class="subheading">What we offer</span>
                    <h2 class="mb-2">Feeatured Vehicles</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="carousel-car owl-carousel">
                        @foreach ($diskon as $item)
                            <div class="item">

                                <div class="car-wrap rounded ftco-animate">
                                    <div class="img rounded d-flex align-items-end"
                                        style="background-image: url('{{ asset($item->gambar) }}');">
                                    </div>
                                    <div class="text">
                                        <h2 class="mb-0"><a href="#">Mercedes Grand Sedan</a></h2>
                                        <div class="d-flex mb-3">
                                            <span class="cat">{{ $item->nama_barang }} </span>
                                            <p class="price ml-auto">{{ formatRupiah($item->harga_barang) }}
                                                <span>/day</span>
                                            </p>
                                        </div>
                                        @php
                                            $pesan = "Hai, saya tertarik dengan produk {$item->nama_barang} dengan ID {$item->kode_barang}.";
                                            if ($item->diskon > 0) {
                                                $pesan .= " Produk ini memiliki diskon sebesar {$item->diskon}%. Saya ingin memesannya. Terima kasih!";
                                            } else {
                                                $pesan .= ' Saya ingin memesannya. Terima kasih!';
                                            }
                                        @endphp
                                        <p class="d-flex mb-0 d-block"><a
                                                href="https://wa.me/095959?text={{ urlencode($pesan) }}"
                                                class="btn btn-primary py-2 mr-1" target="_blank">Whatsapp</a> <a
                                                href="{{ route('sale.detail', ['id' => $item->id]) }}"
                                                class="btn btn-secondary py-2 ml-1">Details</a></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-about">
        <div class="container">
            <div class="row no-gutters">
                @foreach ($pengaturan as $item)
                    <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center"
                        style="background-image: url('{{ asset($item->gambar) }}'); background-size: cover; background-position: center;">
                    </div>
                    <div class="col-md-6 wrap-about ftco-animate">
                        <div class="heading-section heading-section-white pl-md-5">
                            <span class="subheading">About us</span>
                            <h2 class="mb-4">Welcome to Carbook</h2>
                            <p>{!! $item->deskripsi !!}</p>
                            <p><a href="#" class="btn btn-primary py-3 px-4">Search Vehicle</a></p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>



    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <span class="subheading">Services</span>
                    <h2 class="mb-3">Our Latest Services</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="services services-2 w-100 text-center">
                        <div class="icon d-flex align-items-center justify-content-center"><span
                                class="flaticon-wedding-car"></span></div>
                        <div class="text w-100">
                            <h3 class="heading mb-2">Wedding Ceremony</h3>
                            <p>A small river named Duden flows by their place and supplies it with the necessary
                                regelialia.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="services services-2 w-100 text-center">
                        <div class="icon d-flex align-items-center justify-content-center"><span
                                class="flaticon-transportation"></span></div>
                        <div class="text w-100">
                            <h3 class="heading mb-2">City Transfer</h3>
                            <p>A small river named Duden flows by their place and supplies it with the necessary
                                regelialia.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="services services-2 w-100 text-center">
                        <div class="icon d-flex align-items-center justify-content-center"><span
                                class="flaticon-car"></span></div>
                        <div class="text w-100">
                            <h3 class="heading mb-2">Airport Transfer</h3>
                            <p>A small river named Duden flows by their place and supplies it with the necessary
                                regelialia.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="services services-2 w-100 text-center">
                        <div class="icon d-flex align-items-center justify-content-center"><span
                                class="flaticon-transportation"></span></div>
                        <div class="text w-100">
                            <h3 class="heading mb-2">Whole City Tour</h3>
                            <p>A small river named Duden flows by their place and supplies it with the necessary
                                regelialia.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-intro" style="background-image: url(images/bg_3.jpg);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-md-6 heading-section heading-section-white ftco-animate">
                    <h2 class="mb-3">Do You Want To Earn With Us? So Don't Be Late.</h2>
                    <a href="#" class="btn btn-primary btn-lg">Become A Driver</a>
                </div>
            </div>
        </div>
    </section>


    <section class="ftco-section testimony-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <span class="subheading">Testimonial</span>
                    <h2 class="mb-3">Happy Clients</h2>
                </div>
            </div>
            <div class="row ftco-animate">
                <div class="col-md-12">
                    <div class="carousel-testimony owl-carousel ftco-owl">
                        <div class="item">
                            <div class="testimony-wrap rounded text-center py-4 pb-5">
                                <div class="user-img mb-2" style="background-image: url(images/person_1.jpg)">
                                </div>
                                <div class="text pt-4">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                        Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Roger Scott</p>
                                    <span class="position">Marketing Manager</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap rounded text-center py-4 pb-5">
                                <div class="user-img mb-2" style="background-image: url(images/person_2.jpg)">
                                </div>
                                <div class="text pt-4">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                        Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Roger Scott</p>
                                    <span class="position">Interface Designer</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap rounded text-center py-4 pb-5">
                                <div class="user-img mb-2" style="background-image: url(images/person_3.jpg)">
                                </div>
                                <div class="text pt-4">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                        Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Roger Scott</p>
                                    <span class="position">UI Designer</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap rounded text-center py-4 pb-5">
                                <div class="user-img mb-2" style="background-image: url(images/person_1.jpg)">
                                </div>
                                <div class="text pt-4">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                        Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Roger Scott</p>
                                    <span class="position">Web Developer</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap rounded text-center py-4 pb-5">
                                <div class="user-img mb-2" style="background-image: url(images/person_1.jpg)">
                                </div>
                                <div class="text pt-4">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                        Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Roger Scott</p>
                                    <span class="position">System Analyst</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">Blog</span>
                    <h2>Recent Blog</h2>
                </div>
            </div>
            <div class="row d-flex">
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry justify-content-end">
                        <a href="blog-single.html" class="block-20" style="background-image: url('images/image_1.jpg');">
                        </a>
                        <div class="text pt-4">
                            <div class="meta mb-3">
                                <div><a href="#">Oct. 29, 2019</a></div>
                                <div><a href="#">Admin</a></div>
                                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                            </div>
                            <h3 class="heading mt-2"><a href="#">Why Lead Generation is Key for Business
                                    Growth</a></h3>
                            <p><a href="#" class="btn btn-primary">Read more</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry justify-content-end">
                        <a href="blog-single.html" class="block-20" style="background-image: url('images/image_2.jpg');">
                        </a>
                        <div class="text pt-4">
                            <div class="meta mb-3">
                                <div><a href="#">Oct. 29, 2019</a></div>
                                <div><a href="#">Admin</a></div>
                                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                            </div>
                            <h3 class="heading mt-2"><a href="#">Why Lead Generation is Key for Business
                                    Growth</a></h3>
                            <p><a href="#" class="btn btn-primary">Read more</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry">
                        <a href="blog-single.html" class="block-20" style="background-image: url('images/image_3.jpg');">
                        </a>
                        <div class="text pt-4">
                            <div class="meta mb-3">
                                <div><a href="#">Oct. 29, 2019</a></div>
                                <div><a href="#">Admin</a></div>
                                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                            </div>
                            <h3 class="heading mt-2"><a href="#">Why Lead Generation is Key for Business
                                    Growth</a></h3>
                            <p><a href="#" class="btn btn-primary">Read more</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-counter ftco-section img bg-light" id="section-counter">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text text-border d-flex align-items-center">
                            <strong class="number" data-number="60">0</strong>
                            <span>Year <br>Experienced</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text text-border d-flex align-items-center">
                            <strong class="number" data-number="1090">0</strong>
                            <span>Total <br>Cars</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text text-border d-flex align-items-center">
                            <strong class="number" data-number="2590">0</strong>
                            <span>Happy <br>Customers</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text d-flex align-items-center">
                            <strong class="number" data-number="67">0</strong>
                            <span>Total <br>Branches</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
