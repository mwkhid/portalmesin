@extends('layouts.backend')

@section('title','Log Book Tugas Akhir')

@section('content')
<div class="content">
<!-- Dynamic Table with Export Buttons -->
    @if(session()->get('message'))
        <div class="alert alert-info alert-dismissable mt-20" role="alert">
            <strong> {{ session()->get('message') }}  </strong> 
        </div>
    @endif
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Daftar Log Book Tugas Akhir Mahasiswa <small>Teknik Elektro</small></h3>
        </div>
        <div class="block-content block-content-full">
            <div class="row mb-30">
                <div class="col-md-2">Nama</div>
                <div class="col-md-10 mb-10">
                    <input type="text" class="form-control" value="{{$mahasiswa->nama_mhs}}" readonly>
                </div>
                <div class="col-md-2">NIM</div>
                <div class="col-md-10">
                    <input type="text" class="form-control" value="{{$mahasiswa->nim}}" readonly>
                </div>
            </div>
            <p align="right"><a href="{{route('admin.logbookta.show', $mahasiswa->id)}}" class="btn btn-warning mr-5">Cetak Logbookta</a><a href="{{route('admin.logbookta.index')}}" class="btn btn-secondary">Kembali</a></p>
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
                <tr>
                    <th class="d-none d-sm-table-cell text-center" style="width: 3%">No</th>
                    <th class="text-center" style="width: 30%;">Kegiatan</th>
                    <th class="d-none d-sm-table-cell text-center" style="width: 17%;">Hubungan Bab</th>
                    <th class="d-none d-sm-table-cell text-center" style="width: 10%;">Kendala</th>
                    <th class="d-none d-sm-table-cell text-center" style="width: 15%;">Rencana</th>
                    <th class="d-none d-sm-table-cell text-center" style="width: 10%;">Status Logbook</th>
                    <!-- <th class="text-center" style="width: 15%;">Action</th> -->
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key=>$row)
                <tr>
                    <td class="d-none d-sm-table-cell font-size-sm text-center">{{ $key+1}}</td>
                    <td class="text-justify font-size-sm">
                        {{$row->kegiatan}}
                    </td>
                    <td class="d-none d-sm-table-cell text-center">
                        @if($row->bab == 1)
                            BAB 1 PENDAHULUAN
                        @elseif($row->bab == 2)
                            BAB 2 TINJAUAN PUSTAKA
                        @elseif($row->bab == 3)
                            BAB 3 METODOLOGI (JALANNYA PENELITIAN)
                        @elseif($row->bab == 4)
                            BAB 4 HASIL DAN PEMBAHASAN
                        @elseif($row->bab == 5)
                            BAB 5 KESIMPULAN
                        @endif
                    </td>
                    <td class="d-none d-sm-table-cell text-center">
                        {{$row->kendala}}
                    </td>
                    <td class="d-none d-sm-table-cell text-center">
                        {{$row->rencana}}
                    </td>
                    <td class="d-none d-sm-table-cell text-center font-size-sm">
                        @if($row->status_logbook1 == 1)
                            <span class="badge badge-success">Accepted</span>
                        @elseif($row->status_logbook1 == 2)
                            <span class="badge badge-warning">Submitted</span>
                        @elseif($row->status_logbook1 == 0)
                            <span class="badge badge-danger">Draf</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
<!-- END Dynamic Table with Export Buttons -->
</div>
@endsection
