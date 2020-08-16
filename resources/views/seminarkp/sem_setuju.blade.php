@extends('layouts.backend')

@section('title','Seminar KP')

@section('content')
<!-- Page Content -->
<div class="content">
    <!-- Labels on top -->
    <div class="block">
        <div class="block-header block-header-default">
            <h1 class="block-title" style="text-align: center; color: green;"><b>DISETUJUI!</b> Selamat melaksanakan Seminar Kerja Praktek.</h1>
            <!-- <h3 class="block-title">Pengajuan Seminar Kerja Praktek</h3> -->
        </div>
        <div class="block-content block-content-full">
        <p align="right">
            <a href="{{url('/kp/seminar/cetak_daftarhadir')}}" class="btn btn-alt-primary mb-5" target="_blank">Cetak Daftar Hadir Seminar KP</a>
        </p>
            <table class="table">
                <tr>
                    <td width="30%">Nama</td>
                    <td width="3%">:</td>
                    <td width="67%"><strong>{{$setuju->nama_mhs}}</strong></td>
                </tr>
                <tr>
                    <td>NIM</td>
                    <td>:</td>
                    <td><strong>{{$setuju->nim}}</strong></td>
                </tr>
                <tr>
                    <td>Jumlah SKS Lulus</td>
                    <td>:</td>
                    <td><strong>{{$setuju->sks}}</strong></td>
                </tr>
                <tr>
                    <td>Indeks Prestasi Mahasiswa (IPK)</td>
                    <td>:</td>
                    <td><strong>{{$setuju->ipk}}</strong></td>
                </tr>
                <tr>
                    <td>Nama Perusahaan</td>
                    <td>:</td>
                    <td><strong>{{$setuju->perusahaan_nama}}</strong></td>
                </tr>
                <tr>
                    <td>Judul Seminar</td>
                    <td>:</td>
                    <td><strong>{{$setuju->judul_seminar}}</strong></td>
                </tr>
                <tr>
                    <td>Tanggal Seminar</td>
                    <td>:</td>
                    <td><strong>{{date("d-m-Y", strtotime($setuju->tanggal_seminar))}}</strong></td>
                </tr>
                <tr>
                    <td>Jam Mulai Seminar</td>
                    <td>:</td>
                    <td><strong>{{$setuju->jam_mulai}}</strong></td>
                </tr>
                <tr>
                    <td>Jam Selesai Seminar</td>
                    <td>:</td>
                    <td><strong>{{$setuju->jam_selesai}}</strong></td>
                </tr>
                <tr>
                    <td>Ruang Seminar</td>
                    <td>:</td>
                    <td><strong>{{$setuju->nama_ruang}}</strong></td>
                </tr>
                <tr>
                    <td>Keikutsertaan Seminar KP</td>
                    <td>:</td>
                    <td><strong>
                        @foreach($klaim as $row){{$row->klaim_nama}} / {{$row->klaim_nim}} <br>
                        @endforeach
                    </strong></td>
                </tr>
            </table>
        </div>
    </div>    <!-- END Labels on top -->
</div>

@endsection
