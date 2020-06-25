@extends('layouts.backend')

@section('title','Seminar KP')

@section('content')
<!-- Page Content -->
<div class="content">
    <!-- Labels on top -->
    @if(session()->get('message'))
        <div class="alert alert-info alert-dismissable mt-20" role="alert">
            <strong>Success</strong> {{ session()->get('message') }}  
        </div><br />
    @endif
    <div class="block">
        <div class="block-header block-header-default">
            <h1 class="block-title" style="text-align: center; color: orange;">Menunggu Persetujuan Koordinator Kerja Praktek</h1>
        </div>
        <div class="block-content block-content-full">
        <p align="right"><a href="{{url('kp/seminar/cetak_pengajuansemkp')}}" class="btn btn-alt-primary" target="_blank">Formulir Pendaftaran Seminar KP</a></p>
            <table class="table">
                <tr>
                    <td width="30%">Nama</td>
                    <td width="3%">:</td>
                    <td width="67%"><strong>{{ $pending->nama_mhs}}</strong></td>
                </tr>
                <tr>
                    <td>NIM</td>
                    <td>:</td>
                    <td><strong>{{ $pending->nim}}</strong></td>
                </tr>
                <tr>
                    <td>Jumlah SKS Lulus</td>
                    <td>:</td>
                    <td><strong>{{ $pending->sks}}</strong></td>
                </tr>
                <tr>
                    <td>Indeks Prestasi Mahasiswa (IPK)</td>
                    <td>:</td>
                    <td><strong>{{ $pending->ipk}}</strong></td>
                </tr>
                <tr>
                    <td>Nama Perusahaan</td>
                    <td>:</td>
                    <td><strong>{{ $pending->perusahaan_nama}}</strong></td>
                </tr>
                <tr>
                    <td>Judul Seminar</td>
                    <td>:</td>
                    <td><strong>{{ $pending->judul_seminar}}</strong></td>
                </tr>
                <tr>
                    <td>Tanggal Seminar</td>
                    <td>:</td>
                    <td><strong>{{date("d-m-Y", strtotime($pending->tanggal_seminar)) }}</strong></td>
                </tr>
                <tr>
                    <td>Jam Mulai Seminar</td>
                    <td>:</td>
                    <td><strong>{{$pending->jam_mulai}}</strong></td>
                </tr>
                <tr>
                    <td>Jam Selesai Seminar</td>
                    <td>:</td>
                    <td><strong>{{$pending->jam_selesai}}</strong></td>
                </tr>
                <tr>
                    <td>Ruang Seminar</td>
                    <td>:</td>
                    <td><strong>{{$pending->nama_ruang}}</strong></td>
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
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <a href="{{route('kp.seminar.edit', $pending->id)}}" class="btn btn-warning">Edit</a>
                    <!-- <button type="submit" class="btn btn-primary">Edit</button> -->
                </div>
            </div>
        </div>
    </div>    <!-- END Labels on top -->
</div>

@endsection
