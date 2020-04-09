@extends('layouts.backend')

@section('title','List Countdown Seminar KP')

@section('content')
<div class="content">
<!-- Dynamic Table with Export Buttons -->
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">List Countdown Seminar Kerja Praktek <small>Teknik Elektro</small></h3>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
                <tr>
                    <th class="d-none d-sm-table-cell text-center" style="width: 7%;">No</th>
                    <th class="d-none d-sm-table-cell text-center" style="width: 3%;">NIM</th>
                    <th class="text-center" style="width: 30%;">Nama</th>
                    <th class="text-center" style="width: 30%;">Judul Seminar</th>
                    <th class="text-center" style="width: 30%;">Countdown Seminar Kp</th>
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
                    <td class="font-size-sm text-center">
                        {{ $row->perusahaan_nama}}
                    </td>
                    <td class="font-size-sm text-center">
                        @if($row->file_selesaikp != null)
                            <div class="badge badge-primary text-white" data-countdown="{{$row->selesai_kp()}}"></div>
                        @else
                            <div class="badge badge-info">Kp Belum Selesai</div>
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
            $this.html(event.strftime('Batas Seminar KP HABIS'));
        });
    });
</script>
@endsection
