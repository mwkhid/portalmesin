@extends('layouts.backend')

@section('title','List Countdown KP')

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
            <h3 class="block-title">Daftar Countdown Kerja Praktek <small>Teknik Elektro</small></h3>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
                <tr>
                    <th class="d-none d-sm-table-cell text-center" style="width: 20px">No</th>
                    <th class="d-none d-sm-table-cell text-center" style="width: 150px;">NIM</th>
                    <th class="text-center">Nama</th>
                    <th class="d-none d-sm-table-cell text-center" style="width: 20%;">Perusahaan</th>
                    <th class="text-center" style="width: 20%;">Selesai KP</th>
                    <th class="text-center" style="width: 20%;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key=>$row)
                <tr>
                    <td class="d-none d-sm-table-cell text-center font-size-sm text-center">{{ $key+1}}</td>
                    <td class="d-none d-sm-table-cell text-center font-size-sm text-center">{{ $row->nim}}</td>
                    <td class="font-w600 font-size-sm text-center">
                        <a href="#">{{ $row->nama_mhs}}</a>
                    </td>
                    <td class="d-none d-sm-table-cell font-size-sm text-center">
                        {{ $row->perusahaan_nama}}
                    </td>
                    <td class="font-size-sm text-center">
                        <div class="badge badge-primary text-white" data-countdown="{{ $row->tgl_selesai_kp}}"></div>
                    </td>
                    <td width="250" style="text-align: center;">
                        @if($row->file_surattugas != null)
                        <a href="{{ route('admin.selesaikp.surattugas', $row->id)}}" class="btn btn-sm btn-alt-warning mr-5 mb-5" target="_blank"><i class="fa fa-eye"></i> Surat Tugas Kp</a>
                        @endif
                        @if($row->file_selesaikp != null)
                        <a href="{{ route('admin.selesaikp.show', $row->id)}}" class="btn btn-sm btn-alt-secondary mr-5 mb-5" target="_blank"><i class="fa fa-eye"></i> Surat Selesai Kp</a>
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
@section('js_after')
<script src="{{asset('/js/plugins/jquery-countdown/jquery.countdown.min.js')}}"></script>
<script type="text/javascript">
    $('[data-countdown]').each(function() {
        var $this = $(this), finalDate = $(this).data('countdown');
        $this.countdown(finalDate).on('update.countdown',function(event){
            $this.html(event.strftime('%D Hari %H:%M:%S'));
        }).on('finish.countdown',function(event){
            $this.html(event.strftime('KP SELESAI'));
        });
    });
</script>
@endsection