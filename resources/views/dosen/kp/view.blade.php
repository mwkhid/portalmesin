@extends('layouts.backend')

@section('title','Bimbingan Kerja Praktek')

@section('content')
<div class="content">
    <h2 class="content-heading">Bimbingan Kerja Praktek</h2>
    <div class="row">
        <div class="col-md-12">
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Mahasiswa</h3>
                </div>
                <div class="block-content">
                    <div class="form-group row">
                        <label class="col-12" for="nim">NIM</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" id="nim" name="nim" value="{{$data->nim }}" placeholder="masukkan nim" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="nama">Nama</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" id="nama" name="nama" value="{{$data->nama_mhs }}" placeholder="masukkan nama" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-9 text-center">Persetujuan TEMPAT KP</label>
                        @if(($accPembimbing->tempat_kp ?? '') != null)
                            <div class="col-md-2 text-center">
                                <span class="badge badge-primary">DISETUJUI</span>
                            </div>
                        @else
                            <div class="col-md-2 text-center">
                                <input type="button" data-id="{{ $data->id }}" id="tempat_kp"  name="tempat_kp" class="btn btn-alt-success" value="SETUJUI" onclick="msg(this)">
                            </div>
                        @endif
                        <div class="col-md-1"></div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-9 text-center">Persetujuan PROPOSAL KP</label>
                        @if(($accPembimbing->proposal_kp ?? '') != null)
                            <div class="col-md-2 text-center">
                                <span class="badge badge-primary">DISETUJUI</span>
                            </div>
                        @else
                        <div class="col-md-2 text-center">
                            <input type="button" data-id="{{ $data->id }}" id="proposal_kp" name="proposal_kp" class="btn btn-alt-success" value="SETUJUI" onclick="proposal(this)">
                        </div>
                        @endif
                        <div class="col-md-1"></div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-9 text-center">Persetujuan PENUGASAN KP</label>
                        @if(($accPembimbing->penugasan_kp ?? '') != null)
                            <div class="col-md-2 text-center">
                                <span class="badge badge-primary">DISETUJUI</span>
                            </div>
                        @else
                        <div class="col-md-2 text-center">
                            <input type="button" data-id="{{ $data->id }}" id="proposal_kp" name="proposal_kp" class="btn btn-alt-success" value="SETUJUI" onclick="penugasan(this)">
                        </div>
                        @endif
                        <div class="col-md-1"></div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-9 text-center">Persetujuan SEMINAR KP</label>
                        @if(($accPembimbing->seminar_kp ?? '') != null)
                            <div class="col-md-2 text-center">
                                <span class="badge badge-primary">DISETUJUI</span>
                            </div>
                        @else
                        <div class="col-md-2 text-center">
                            <input type="button" data-id="{{ $data->id }}" id="proposal_kp" name="proposal_kp" class="btn btn-alt-success" value="SETUJUI" onclick="seminar(this)">
                        </div>
                        @endif
                        <div class="col-md-1"></div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-9 text-center">Persetujuan LAPORAN KP</label>
                        @if(($accPembimbing->laporan_kp ?? '') != null)
                            <div class="col-md-2 text-center">
                                <span class="badge badge-primary">DISETUJUI</span>
                            </div>
                        @else
                        <div class="col-md-2 text-center">
                            <input type="button" data-id="{{ $data->id }}" id="proposal_kp" name="proposal_kp" class="btn btn-alt-success" value="SETUJUI" onclick="laporan(this)">
                        </div>
                        @endif
                        <div class="col-md-1"></div>
                    </div>
                    <!-- <div class="form-group row">
                        <label class="col-12" for="sks">Total SKS</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" id="sks" name="sks" value="{{$data->sks }}" placeholder="Total SKS yang dicapai" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="ipk">Indeks Prestasi Kumulatif</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" id="ipk" name="ipk" value="{{$data->ipk }}" placeholder="IPK terakhir" readonly>
                        </div>
                    </div>-->
                    <div class="form-group">
                        <p align="right"><a href="{{route('dosen.kp.index')}}" class="btn btn-alt-secondary mb-5">Kembali</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js_after')
<script>
function msg(dataid) {
    let status = 1;
    let mhsId = $(dataid).data('id');
    $.ajax({
        type: "GET",
        dataType: "json",
        url: '{{ route('dosen.tempatkp.update') }}',
        data: {'status': status, 'mhs_id': mhsId},
        success: function (data) {
            console.log(data.message);
            location.reload();
            // $('#toast-example-2').toast('show');
        }
    });
}
</script>
<script>
function proposal(dataid) {
    let status = 1;
    let mhsId = $(dataid).data('id');
    $.ajax({
        type: "GET",
        dataType: "json",
        url: '{{ route('dosen.proposalkp.update') }}',
        data: {'status': status, 'mhs_id': mhsId},
        success: function (data) {
            console.log(data.message);
            location.reload();
            // $('#toast-example-2').toast('show');
        }
    });
}
</script>
<script>
function penugasan(dataid) {
    let status = 1;
    let mhsId = $(dataid).data('id');
    $.ajax({
        type: "GET",
        dataType: "json",
        url: '{{ route('dosen.penugasankp.update') }}',
        data: {'status': status, 'mhs_id': mhsId},
        success: function (data) {
            console.log(data.message);
            location.reload();
            // $('#toast-example-2').toast('show');
        }
    });
}
</script>
<script>
function seminar(dataid) {
    let status = 1;
    let mhsId = $(dataid).data('id');
    $.ajax({
        type: "GET",
        dataType: "json",
        url: '{{ route('dosen.seminarkp.update') }}',
        data: {'status': status, 'mhs_id': mhsId},
        success: function (data) {
            console.log(data.message);
            location.reload();
            // $('#toast-example-2').toast('show');
        }
    });
}
</script>
<script>
function laporan(dataid) {
    let status = 1;
    let mhsId = $(dataid).data('id');
    $.ajax({
        type: "GET",
        dataType: "json",
        url: '{{ route('dosen.laporankp.update') }}',
        data: {'status': status, 'mhs_id': mhsId},
        success: function (data) {
            console.log(data.message);
            location.reload();
            // $('#toast-example-2').toast('show');
        }
    });
}
</script>
@endsection