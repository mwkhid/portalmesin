@extends('layouts.backend')

@section('title','Bimbingan Kerja Praktek')

@section('content')
<div class="content">
    <h2 class="content-heading">Bimbingan Kerja Praktek</h2>
    @if(session()->get('message'))
        <div class="alert alert-info alert-dismissable mt-20" role="alert">
            <strong> {{ session()->get('message') }}  </strong> 
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Mahasiswa</h3>
                </div>
                <div class="block-content">
                    <div class="form-group row">
                        <label class="col-3" for="nim">NIM</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="nim" name="nim" value="{{$data->nim }}" placeholder="masukkan nim" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3" for="nama">Nama</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="nama" name="nama" value="{{$data->nama_mhs }}" placeholder="masukkan nama" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3" for="proposal">Proposal</label>
                        <div class="col-md-9">
                            @if($kp->file_proposal ?? '')
                            <a href="{{route('dosen.lihatproposal', $kp->kp_id)}}" class="btn btn-alt-primary" target="_blank">Lihat Proposal</a>
                            @else
                            <span class="badge badge-warning">Belum Upload Proposal</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3" for="nilai">Nilai KP Perusahaan</label>
                        <div class="col-md-9">
                            @if($kp->file_nilai ?? '')
                            <a href="{{route('dosen.lihatnilai', $kp->kp_id)}}" class="btn btn-alt-primary" target="_blank">Lihat Nilai KP Perusahaan</a>
                            @else
                            <span class="badge badge-warning">Belum Upload Nilai</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3" for="laporan">Laporan</label>
                        <div class="col-md-9">
                            @if($kp->file_laporan ?? '')
                            <a href="{{route('dosen.lihatlaporan', $kp->kp_id)}}" class="btn btn-alt-primary" target="_blank">Lihat Laporan</a>
                            @else
                            <span class="badge badge-warning">Belum Upload Laporan</span>
                            @endif
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
                    @if(($accPembimbing->tempat_kp ?? '') == 1)
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
                    @endif
                    @if(($accPembimbing->proposal_kp ?? '') == 1)
                    <form action="{{route('dosen.penugasankp.update')}}" method="post">
                    @method('PATCH')
                    @csrf
                        <div class="form-group row">
                            <div class="col-md-9 text-center">
                                <label>Persetujuan PENUGASAN KP</label>
                                <textarea required type="text" rows="2" name="penugasan" class="form-control" placeholder="Masukkan Tugas yang harus dilakukan selama Kerja Praktek/Magang">{{$kp->penugasan_kp}}</textarea>
                            </div>
                            @if(($accPembimbing->penugasan_kp ?? '') != null)
                                <div class="col-md-2 text-center">
                                    <span class="badge badge-primary">DISETUJUI</span>
                                </div>
                            @else
                            <div class="col-md-2 text-center">
                                <input type="hidden" name="mhs_id" value="{{$data->id}}">
                                <input type="hidden" name="kp_id" value="{{$kp->kp_id}}">
                                <button type="submit" name="action" value="penugasan" class="btn btn-alt-success">SETUJUI</button>
                            </div>
                            @endif
                            <div class="col-md-1"></div>
                        </div>
                    </form>
                    @endif
                    @if(($accPembimbing->penugasan_kp ?? '') == 1)
                    <div class="form-group row">
                        <label class="col-md-9 text-center">Persetujuan SEMINAR KP</label>
                        @if(($accPembimbing->seminar_kp ?? '') != null)
                            <div class="col-md-2 text-center">
                                <span class="badge badge-primary">DISETUJUI</span>
                            </div>
                        @else
                        <div class="col-md-2 text-center">
                            <input type="button" data-id="{{ $data->id }}" class="btn btn-alt-success" value="SETUJUI" onclick="seminar(this)">
                        </div>
                        @endif
                        <div class="col-md-1"></div>
                    </div>
                        @if(($accPembimbing->seminar_kp ?? '') != null)
                        <form action="{{route('dosen.kp.update', $kp->kp_id)}}" method="post">
                        @method('PATCH')
                        @csrf
                            <div class="form-group row">
                                <div class="col-md-9 text-center">
                                    <h6 class="text-left">Nilai Seminar KP/Dosen (40%)</h6>
                                    <div class="row mb-5">
                                        <div class="col-md-10">
                                            <strong>Kriteria</strong>
                                        </div>
                                        <div class="col-md-2"><strong>Nilai Angka</strong></div>
                                    </div>
                                    <div class="row mb-5">
                                        <div class="col-md-10">
                                            Tata tulis, Penyampaian Makalah, Penguasaan Materi, Kemampuan Menjawab Pertanyaan
                                        </div>
                                        <div class="col-md-2">
                                            <input required type="number" step="0.01" min="0" max="100" name="KP1A" value="{{$nilaikp->KP1A ?? ''}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 text-center">
                                    @if(($accPembimbing->laporan_kp ?? '') != null)
                                        <span class="badge badge-primary" style="position: absolute;bottom: 0;left:0;right:0;margin-left: auto;margin-right: auto;">SUBMITTED</span>
                                    @else
                                        <button type="submit" name="action" value="nilaikp" class="btn btn-alt-info" style="position: absolute;bottom: 0;left:0;right:0;margin-left: auto;margin-right: auto;">Submit</button>
                                    @endif
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                        </form>
                        @endif
                    @endif
                    @if(($accPembimbing->seminar_kp ?? '') == 1)
                    <div class="form-group row">
                        <label class="col-md-9 text-center">Persetujuan LAPORAN KP</label>
                        @if(($accPembimbing->laporan_kp ?? '') != null)
                            <div class="col-md-2 text-center">
                                <span class="badge badge-primary">DISETUJUI</span>
                            </div>
                        @else
                        <div class="col-md-2 text-center">
                            @if(($nilaikp->KP1A ?? '') !=  null)
                                <input type="button" data-id="{{ $data->id }}" class="btn btn-alt-success" value="SETUJUI" onclick="laporan(this)">
                            @else
                                <span class="badge badge-danger">MOHON SUBMIT NILAI SEMINAR KP</span>
                            @endif
                        </div>
                        @endif
                        <div class="col-md-1"></div>
                    </div>
                    @endif
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
                    <div class="form-group row">
                        @if(($accPembimbing->penugasan_kp ?? '') != 1)
                        <div class="col-md-3"><input type="button" data-id="{{ $kp->kp_id ?? '' }}" id="reset_kp" name="reset_kp" class="btn btn-alt-danger" value="Reset Pendaftaran KP" onclick="resetkp(this)"></div>
                        @endif
                        <div class="{{ ($accPembimbing->penugasan_kp ?? '') == 0 ? 'col-md-9' : 'col-md-12'}}"><a href="{{route('dosen.kp.index')}}" class="btn btn-alt-secondary mb-5 float-right">Kembali</a></div>
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
<script>
function resetkp(dataid) {
    let status = 0;
    let kpId = $(dataid).data('id');
    $.ajax({
        type: "GET",
        dataType: "json",
        url: '{{ route('dosen.kpreset.update') }}',
        data: {'status': status, 'kp_id': kpId},
        success: function (data) {
            console.log(data.message);
            location.reload();
            // $('#toast-example-2').toast('show');
        }
    });
}
</script>
@endsection