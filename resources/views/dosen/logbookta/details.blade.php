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
            <h3 class="block-title">Details Log Book Mahasiswa <small>Teknik Elektro</small></h3>
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
            <p align="right"><a href="{{route('dosen.logbookta.show', $mahasiswa->id)}}" class="btn btn-warning mr-5">Cetak Logbookta</a><a href="{{route('dosen.logbookta.index')}}" class="btn btn-secondary">Kembali</a></p>
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
                <tr>
                    <th class="d-none d-sm-table-cell text-center" style="width: 3%">No</th>
                    <th class="text-center" style="width: 30%;">Kegiatan</th>
                    <th class="d-none d-sm-table-cell text-center" style="width: 17%;">Hubungan Bab</th>
                    <th class="d-none d-sm-table-cell text-center" style="width: 15%;">Kendala</th>
                    <th class="d-none d-sm-table-cell text-center" style="width: 15%;">Rencana</th>
                    <th class="d-none d-sm-table-cell text-center" style="width: 5%;">Status Logbook</th>
                    <th class="text-center" style="width: 5%;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key=>$row)
                <tr>
                    <td class="d-none d-sm-table-cell font-size-sm text-center">{{ $key+1}}</td>
                    <!-- <td class="font-size-sm text-center">
                        <a href="{{route('dosen.logbookta.show', $row->mahasiswa_id)}}" target="_blank">{{ $row->nama_mhs}}</a>
                    </td> -->
                    <td class="text-justify font-size-sm">
                        {{$row->kegiatan}}
                    </td>
                    <td class="d-none d-sm-table-cell text-center font-size-sm">
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
                    <td class="d-none d-sm-table-cell text-center font-size-sm">
                        {{$row->kendala}}
                    </td>
                    <td class="d-none d-sm-table-cell text-center font-size-sm">
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
                    <td style="text-align: center;">
                        <!-- @if($row->pem == 1)
                        <label class="css-control css-control-sm css-control-success css-switch">
                            <input type="checkbox" data-id="{{ $row->id }}" id="status_logbook1"  name="status_logbook1" class="css-control-input status_logbook1" {{ $row->status_logbook1 == 1 ? 'checked' : '' }}>
                            <span class="css-control-indicator"></span>
                        </label>
                        @else
                        <label class="css-control css-control-sm css-control-success css-switch">
                            <input type="checkbox" data-id="{{ $row->id }}" id="status_logbook2"  name="status_logbook2" class="css-control-input status_logbook2" {{ $row->status_logbook2 == 1 ? 'checked' : '' }}>
                            <span class="css-control-indicator"></span>
                        </label>
                        @endif -->
                        @if($ta->pem == 1)
                            @if($row->status_logbook1 == 1)
                                <span class="badge badge-pill badge-primary">Sudah Komentar</span>
                            @else
                                <a href="{{route('dosen.logbookta.edit', $row->id)}}" class="btn btn-sm btn-alt-primary mr-5 mb-5"><i class="fa fa-edit"></i> Komentar</a>
                            @endif
                        @elseif($ta->pem == 2)
                            @if($row->status_logbook2 == 1)
                                <span class="badge badge-pill badge-primary">Sudah Komentar</span>
                            @else
                                <a href="{{route('dosen.logbookta.edit', $row->id)}}" class="btn btn-sm btn-alt-primary mr-5 mb-5"><i class="fa fa-edit"></i> Komentar</a>
                            @endif
                        @endif
                        <!-- <a href="{{route('dosen.logbookta.show', $row->id)}}" class="btn btn-sm btn-alt-primary mr-5 mb-5"><i class="fa fa-eye"></i></a> -->
                        <!-- <a href="{{route('dosen.logbookta.destroy', $row->id)}}" class="btn btn-sm btn-alt-danger mr-5 mb-5"><i class="fa fa-trash"></i></a> -->
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
