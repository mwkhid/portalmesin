@extends('layouts.backend')

@section('title','Pendaftaran KP')

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
            <h1 class="block-title text-center text-info">Menunggu Persetujuan Koordinator Kerja Praktek</h1>
        </div>
        <div class="block-content block-content-full">
        <p align="right"><a href="{{url('/kp/pendaftaran/cetak_form')}}" class="btn btn-primary" target="_blank">Form Konsultasi KP</a></p>
            <table class="table">
                <tr>
                    <td width="30%">Nama</td>
                    <td width="3%">:</td>
                    <td width="67%"><strong>{{$pending->nama_mhs}}</strong></td>
                </tr>
                <tr>
                    <td>NIM</td>
                    <td>:</td>
                    <td><strong>{{$pending->nim}}</strong></td>
                </tr>
                <tr>
                    <td>Jumlah SKS Lulus</td>
                    <td>:</td>
                    <td><strong>{{$pending->sks}}</strong></td>
                </tr>
                <tr>
                    <td>Indeks Prestasi Mahasiswa (IPK)</td>
                    <td>:</td>
                    <td><strong>{{$pending->ipk}}</strong></td>
                </tr>
                <tr>
                    <td>Nama Perusahaan</td>
                    <td>:</td>
                    <td><strong>{{$pending->perusahaan_nama}}</strong></td>
                </tr>
                <tr>
                    <td>Alamat Perusahaan</td>
                    <td>:</td>
                    <td><strong>{{$pending->perusahaan_almt}}</strong></td>
                </tr>
                <tr>
                    <td>Jenis Perusahaan</td>
                    <td>:</td>
                    <td><strong>{{$pending->perusahaan_jenis}}</strong></td>
                </tr>
                <tr>
                    <td>PIC</td>
                    <td>:</td>
                    <td><strong>{{$pending->pic}}</strong></td>
                </tr>
                <tr>
                    <td>Tanggal Mulai KP</td>
                    <td>:</td>
                    <td><strong>{{date("d-m-Y", strtotime($pending->rencana_mulai_kp))}}</strong></td>
                </tr>
                <tr>
                    <td>Tanggal Selesai KP</td>
                    <td>:</td>
                    <td><strong>{{date("d-m-Y", strtotime($pending->rencana_selesai_kp))}}</strong></td>
                </tr>
            </table>
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <a href="{{route('kp.pendaftaran.edit', $pending->id)}}" class="btn btn-warning mb-5">Edit</a>
                </div>
            </div>
        </div>
    </div>    <!-- END Labels on top -->
</div>
@endsection
