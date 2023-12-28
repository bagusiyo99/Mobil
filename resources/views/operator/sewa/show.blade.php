{{-- <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <a href="/operator/pesan" class="btn btn-success mb-5">
                    <i class="fas fa-arrow-alt-circle-left">Kembali</i>
                </a>
                <tr>
                    <p> From : {{ $pesan->nama }} </p>
                </tr>
                <h3> {{ $pesan->email }} </h3>
                <p> {{ $pesan->pesan }} </p>

            </div>
        </div>
    </div>
</div>
</div> --}}
@extends('layouts.app_sneat')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label for="">Nama Lengkap</label>
                        <p class="form-control"> {{ $sewa->name }}</p>
                    </div>

                    <div class="form-group">
                        <label for="">Nama Mobil</label>
                        <p class="form-control"> {{ $sewa->diskon->nama }}</p>
                    </div>

                    <div class="form-group">
                        <label for="">Alamat Asli</label>
                        <p class="form-control"> {{ $sewa->alamat }}</p>
                    </div>

                    <div class="form-group">
                        <label for="">Tujuan Alamat</label>
                        <p class="form-control"> {{ $sewa->tujuan }}</p>
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <p class="form-control"> {{ $sewa->tgl_boking }}</p>
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <p class="form-control"> {{ $sewa->tgl_selesai }}</p>
                    </div>

                    <div class="form-group">
                        <label for="">WhatsApp</label>
                        <p class="form-control"> {{ $sewa->hp }}</p>
                    </div>


                    <div class="form-group">
                        <label for="">Jam Pemberangkatan</label>
                        <p class="form-control"> {{ $sewa->jam }}</p>
                    </div>




                    <a href="/operator/sewa" class="btn btn-primary mb-3">
                        Kembali</a>

                </div>
            </div>
        </div>
    </div>
@endsection
