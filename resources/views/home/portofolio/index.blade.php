@extends('layouts.app_home')
@section('content')
    <div>
        <img src="/img/sd.jpg" width="100%" class="img-fluid" alt="...">
    </div>

    <!-- Blog Start -->
    <div class="container-xxl py-6">
        <div class="container">
            <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-5 mb-3">Latest Blog</h1>
                <p>Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
            </div>
            <div class="row g-4">
                @foreach ($portofolio as $item)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <img class="img-fluid" src="/{{ $item->gambar }}" alt="">
                        <div class="bg-light p-4">
                            <a class="d-block h5 lh-base mb-4"
                                href="/portofolio/{{ $item->id }}">{!! Str::limit($item->deskripsi, 50) !!}</a>
                            <div class="text-muted border-top pt-4">
                                <small class="me-3"><i class="fa fa-user text-primary me-2"></i>Admin</small>
                                <small class="me-3"><i class="fa fa-calendar text-primary me-2"></i>01 Jan, 2045</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                        <a class="btn btn-primary rounded-pill py-3 px-5" href="">Load
                            More</a>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- Blog End -->
@endsection
