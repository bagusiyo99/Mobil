@extends('layouts.app_sneat')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table  table-striped table-bordered table-hover table-bordered text-center" id="data">
                        <thead>
                            <tr class="btn-secondary text-center">
                                <td class="align-middle text-center"> No </td>
                                <td class="align-middle text-center"> Nama </td>
                                <td class="align-middle text-center"> tujuan </td>
                                <td class="align-middle text-center"> alamat </td>
                                <td class="align-middle text-center"> Tanggal boking </td>
                                <td class="align-middle text-center"> Tanggal selesai </td>
                                <td class="align-middle text-center"> hp </td>
                                <td class="align-middle text-center"> jam </td>
                                <td class="align-middle text-center"> Nama mobil </td>
                                <td class="align-middle text-center"> Action </td>
                            </tr>
                        </thead>




                        <tbody>
                            @foreach ($sewa as $item)
                                <tr>
                                    <td> {{ $loop->iteration }} </td>
                                    <td> {{ $item->name }} </td>

                                    <td> {{ $item->tujuan }} </td>
                                    <td> {{ $item->alamat }} </td>
                                    <td> {{ \Carbon\Carbon::createFromFormat('Y-m-d', $item->tgl_boking)->translatedFormat('d F Y') }}
                                    </td>
                                    <td> {{ \Carbon\Carbon::createFromFormat('Y-m-d', $item->tgl_selesai)->translatedFormat('d F Y') }}
                                    </td>

                                    <td> {{ $item->hp }} </td>

                                    <td> {{ $item->jam }} </td>
                                    <td> {{ $item->diskon->nama }} </td>

                                    <td>
                                        <div class="text-center mb-1">
                                            <a href="/operator/sewa/{{ $item->id }} "
                                                class="btn btn-primary  mb-2">Detail</a>
                                            {{-- 
                                            <a href="https://api.whatsapp.com/send?phone={{ $item->hp }}&text=Selamat%20pagi/siang/sore,%20{{ $item->name }}.%20Kami%20senang%20Anda%20telah%20melakukan%20pemesanan%20mobil%20dengan%20tujuan%20{{ $item->tujuan }}%20dan%20alamat%20di%20{{ $item->alamat }}.%20Pemesanan%20Anda%20untuk%20periode%20dari%20tanggal%20{{ $item->tgl_boking }}%20hingga%20{{ $item->tgl_selesai }}%20telah%20kami%20terima.%20Apakah%20ada%20informasi%20tambahan%20yang%20perlu%20kami%20sampaikan?%20Jika%20ada%20pertanyaan%20atau%20perlu%20konfirmasi%20lebih%20lanjut,%20jangan%20ragu%20untuk%20menghubungi%20kami%20melalui%20nomor%20{{ $item->hp }}.%20Terima%20kasih%20atas%20kepercayaan%20Anda%20kepada%20layanan%20kami.%20Kami%20tunggu%20kedatangan%20Anda!"
                                                class="btn btn-success mb-2" target="_blank">WhatsApp</a> --}}

                                            <a href="https://api.whatsapp.com/send?phone={{ $item->hp }}&text=Selamat%20pagi/siang/sore,%20{{ $item->name }}.%20Kami%20senang%20Anda%20telah%20melakukan%20pemesanan%20mobil%20dengan%20tujuan%20{{ $item->tujuan }}%20dan%20alamat%20di%20{{ $item->alamat }}%20Pemesanan%20Anda%20untuk%20periode%20dari%20tanggal%20{{ \Carbon\Carbon::parse($item->tgl_boking)->isoFormat('DD MMMM YYYY') }}%20hingga%20{{ \Carbon\Carbon::parse($item->tgl_selesai)->isoFormat('DD MMMM YYYY') }}%20telah%20kami%20terima.%20Apakah%20ada%20informasi%20tambahan%20yang%20perlu%20kami%20sampaikan?%20Jika%20ada%20pertanyaan%20atau%20perlu%20konfirmasi%20lebih%20lanjut,%20jangan%20ragu%20untuk%20menghubungi%20kami%20melalui%20nomor%20{{ $item->hp }}.%20Terima%20kasih%20atas%20kepercayaan%20Anda%20kepada%20layanan%20kami.%20Kami%20tunggu%20kedatangan%20Anda!"
                                                class="btn btn-success mb-2" target="_blank">WhatsApp</a>



                                            <form action="/operator/sewa/{{ $item->id }}" method="POST">
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
