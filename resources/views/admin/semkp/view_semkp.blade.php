@extends('layouts.backend')

@section('title','Pendaftaran Seminar KP')
@section('css_after')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
@endsection
@section('content')
<div class="content">
    <!-- Bootstrap Design -->
    <h2 class="content-heading">Pendaftaran Seminar Kerja Praktek</h2>
        <div class="card-header">
            @if(session()->get('message'))
                <div class="alert alert-success alert-dismissable" role="alert">
                 <strong>Success</strong> {{ session()->get('message') }}  
                </div><br />
            @endif
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <!-- Default Elements -->
                <div class="block">
                    <!-- <div class="block-header block-header-default">
                        <h3 class="block-title">Pengajuan Kerja Praktek</h3>
                    </div> -->
                    <div class="block-content block-content-full">
                        <!-- Form Labels on top - Default Style -->
                        <form action="{{ route('admin.seminarkp.update', $data->id) }}" method="post">
                        @method('PATCH')
                        @csrf
                        <h2 class="content-heading border-bottom mb-4 pb-2">Data Diri</h2>
                            <div class="form-group">
                                <label for="Nama">Nama</label>
                                <input type="text" class="form-control" name="nama" value="{{ $data->nama_mhs}}" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label for="Nim">NIM</label>
                                <input type="text" class="form-control" name="nim" value="{{ $data->nim}}" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="id" value="{{ $data->id }}">
                            </div>
                        <h2 class="content-heading border-bottom mb-4 pb-2">Data Akademik</h2>
                            <div class="form-group">
                                <label for="sks">Jumlah SKS Lulus</label>
                                <input type="text" class="form-control" name="sks" value="{{ $data->sks}}" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label for="IPK">IPK</label>
                                <input type="text" class="form-control" name="ipk" value="{{ $data->ipk}}" readonly="readonly">
                            </div>
                        <h2 class="content-heading border-bottom mb-4 pb-2">Seminar Kerja Praktek</h2>
                            <div class="form-group">
                                <label for="nama perusahaan">Nama Perusahaan</label>
                                <input type="text" class="form-control" name="perusahaan_nama" value="{{ $data->perusahaan_nama}}" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label for="nama perusahaan">Judul Seminar Kerja Praktek</label>
                                <input type="text" class="form-control" name="judul_seminar" value="{{ $data->judul_seminar}}" readonly="readonly">
                            </div>
                            <div class="form-group">
                            <label for="Tanggal Mulai">Tanggal Seminar KP</label>
                                <input type="text" class="js-datepicker form-control" id="example-datepicker3" name="tanggal_seminar" value="{{date("d-m-Y",strtotime($data->tanggal_seminar)) }}" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label for="nama perusahaan">Jam Mulai Seminar KP</label>
                                <input type="text" class="form-control" name="jam_mulai" value="{{ $data->jam_mulai}}" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label for="nama perusahaan">Jam Selesai Seminar KP</label>
                                <input type="text" class="form-control" name="jam_selesai" value="{{ $data->jam_selesai}}" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label for="nama perusahaan">Tempat Seminar KP</label>
                                <input type="text" class="form-control" name="ruang" value="{{ $data->nama_ruang}}" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label for="keikutsertaan">Keikutsertaan Seminar KP:</label>
                                <div class="row">
                                    <div class="col-md-6 text-center">
                                        Nama
                                    </div>
                                    <div class="col-md-4 text-center">
                                        NIM
                                    </div>
                                    <div class="col-md-2 text-center">
                                        Action
                                    </div>
                                    @foreach($klaim as $key=>$row)
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="klaim_nama{{$key}}" value="{{$row->klaim_nama}}"><br>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="{{route('admin.seminarkp.presensi', $row->klaim_nim)}}" class="form-control" target="_blank">{{$row->klaim_nim}}</a>
                                        <!-- <input type="text" class="form-control" name="klaim_nim{{$key}}" value="{{$row->klaim_nim}}"><br> -->
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <label class="css-control css-control-success css-switch">
                                                <input type="checkbox" data-id="{{ $row->id }}" id="klaim_status"  name="klaim_status{{$key}}" class="css-control-input" {{ $row->klaim_status == 1 ? 'checked' : '' }}>
                                                <span class="css-control-indicator"></span>
                                        </label>
                                        <!-- <input type="checkbox" data-id="{{ $row->id }}" name="status" class="js-switch" {{ $row->klaim_status == 1 ? 'checked' : '' }}> -->
                                    </div>
                                        <input type="hidden" class="form-control" name="idklaim{{$key}}" value="{{$row->id}}"><br>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="action" value="setuju" class="btn btn-primary mr-5 mb-5">Setuju</button>
                                <button type="submit" name="action" value="tolak" class="btn btn-danger mr-5 mb-5">Tolak</button>
                                <a href="{{route('admin.seminarkp.index')}}" class="btn btn-secondary mr-5 mb-5">Kembali</a>
                            </div>
                        </form>
                        <!-- END Form Labels on top - Default Style -->
                    </div>
                </div>
                <!-- END Default Elements -->
            </div>
        </div>
</div>
<!-- Bootstrap Toasts -->
<div style="position: fixed; top: 3rem; right: 3rem; z-index: 9999999;">
    <!-- Toast Example 1 -->
    <div id="toast-example-1" class="toast fade hide" data-delay="4000" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <i class="si si-bubble text-primary mr-2"></i>
            <strong class="mr-auto">Title</strong>
            <small class="text-muted">just now</small>
            <button type="button" class="ml-2 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            This is a nice notification based on Bootstrap implementation.
        </div>
    </div>
    <!-- END Toast Example 1 -->

    <!-- Toast Example 2 -->
    <div id="toast-example-2" class="toast fade hide" data-delay="4000" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <i class="si si-wrench text-danger mr-2"></i>
            <strong class="mr-auto">System</strong>
            <small class="text-muted">just now</small>
            <button type="button" class="ml-2 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            Klaim status updated successfully.
        </div>
    </div>
    <!-- END Toast Example 2 -->
</div>
@endsection
@section('js_after')
<script>
$(document).ready(function(){
    $('.css-control-input').change(function () {
        let status = $(this).prop('checked') === true ? 1 : 0;
        let klaimId = $(this).data('id');
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '{{ route('admin.update.status') }}',
            data: {'status': status, 'klaim_id': klaimId},
            success: function (data) {
                // console.log(data.message);
                $('#toast-example-2').toast('show');
            }
        });
    });
});
</script>
@endsection

