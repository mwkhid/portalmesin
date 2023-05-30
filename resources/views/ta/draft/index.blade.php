@extends('layouts.backend')

@section('title','Kelengkapan Wisuda')
@section('css_after')
<link href="{{asset('/css/jquery-ui.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<!-- Page Content -->
<div class="content">
<!-- Labels on top -->
<div class="block">
    <div class="block-header block-header-default">
        <h3 class="block-title">Kelengkapan Wisuda</h3>
    </div>
    <div class="block-content block-content-full">
        <div class="row">
            <div class="col-md-6">
                @if(session()->get('message'))
                <div class="alert alert-info alert-dismissable mt-20" role="alert">
                    <strong>Success</strong> {{ session()->get('message') }}  
                </div>
                @endif
                @if(count($errors) > 0)
                <div class="alert alert-danger alert-dismissable row">
                    @foreach ($errors->all() as $error)
                    {{ $error }} <br/>
                    @endforeach
                </div>
                @endif
                    <form action="{{ route('ta.wisuda.update', $data->ta_id) }}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label>File Draft TA Final <span class="text-danger">*</span></label>
                        <div class="custom-file">
                            <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                            <!-- When multiple files are selected, we use the word 'Files'. You can easily change it to your own language by adding the following to the input, eg for DE: data-lang-files="Dateien" -->
                            <input type="file" class="custom-file-input" id="example-file-multiple-input-custom" name="file_draftta" data-toggle="custom-file-input" multiple>
                            <label class="custom-file-label" for="example-file-multiple-input-custom">Choose files PDF</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>File Source Code <span class="text-danger">*</span></label>
                        <div class="custom-file">
                            <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                            <!-- When multiple files are selected, we use the word 'Files'. You can easily change it to your own language by adding the following to the input, eg for DE: data-lang-files="Dateien" -->
                            <input type="file" class="custom-file-input" id="example-file-multiple-input-custom" name="file_sourcecode" data-toggle="custom-file-input" multiple>
                            <label class="custom-file-label" for="example-file-multiple-input-custom">Choose files Zip</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="nim" value="{{ $data->nim }}">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Upload" class="btn btn-primary btn-noborder btn-rounded mr-5 mb-5">   
                    </div>
                </form>
            </div>
            <div class="col-md-4">
                <div class="form-group" style="margin-top:25px;" align="center">
                    @if($data->doc_ta != null)
                    <input id="btnShow" type="button" value="Show Draft TA" class="btn btn-warning btn-noborder btn-rounded mr-5 mb-5"/>
                    <div id="dialog" style="display: none"></div>
                    <!-- <input id="pengesahanShow" type="button" value="Show Pengesahan TA" class="btn btn-success mr-5 mb-5"/>
                    <div id="pengesahan" style="display: none"></div> -->
                    @endif
                </div>
            </div>
            <div class="col-md-2" align="center" style="padding: 30px 0;">
                <div class="form-group">
                    @if($data->doc_ta != null)
                        <span class="badge badge-success">SUDAH UPLOAD</span>
                    @else
                        <span class="badge badge-info">BELUM UPLOAD</span>
                    @endif
                </div>
                <br><br>
                <div class="form-group">
                    @if($data->sourcecode_ta != null)
                        <span class="badge badge-success">SUDAH UPLOAD</span>
                    @else
                        <span class="badge badge-info">BELUM UPLOAD</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4" align="center">
                <div class="form-group" style="padding: 32px 0;">
                    @if($data->doc_ta && $data->sourcecode_ta && $bio && $exitsurvey)
                    <a href="{{route('ta.halpengesahan', $data->mahasiswa_id)}}" class="btn btn-primary btn-noborder btn-rounded">Download Hal.Pengesahan</a>
                    @else
                    <span class="badge badge-info badge-pill py-10 px-15 font-w700">Belum Input Draft TA/Source Code/Biodata Alumni/Exit Survey</span>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group" align="center">
                    <span class="badge py-10 px-20 font-w700 mb-5 {{($halpengesahan->PB1 ?? '') == 1 ? 'badge-success' : 'badge-primary'}}">PB1</span>
                    <span class="badge py-10 px-20 font-w700 {{($halpengesahan->PJ1 ?? '') == 1 ? 'badge-success' : 'badge-primary'}}">PJ1</span>
                </div>
                <div class="form-group" align="center">
                    <span class="badge py-10 px-20 font-w700 mb-5 {{($halpengesahan->PB2 ?? '') == 1 ? 'badge-success' : 'badge-primary'}}">PB2</span>
                    <span class="badge py-10 px-20 font-w700 {{($halpengesahan->PJ2 ?? '') == 1 ? 'badge-success' : 'badge-primary'}}">PJ2</span>
                </div>
                <div class="form-group" align="center">
                    <span class="badge py-10 px-20 font-w700 mb-5 {{($halpengesahan->koor_ta ?? '') == 1 ? 'badge-success' : 'badge-primary'}}">KOORDINATOR TA</span>
                    <span class="badge py-10 px-20 font-w700 {{($halpengesahan->kaprodi ?? '') == 1 ? 'badge-success' : 'badge-primary'}}">KAPRODI</span>
                </div>
            </div>
            <div class="col-md-2" align="center">
                <div class="form-group" style="padding: 32px 0;">
                    <span class="badge {{(($halpengesahan->PB1 ?? '') == 1) && (($halpengesahan->PB2 ?? '') == 1) && (($halpengesahan->PJ1 ?? '') == 1) && (($halpengesahan->PJ2 ?? '') == 1) && (($halpengesahan->koor_ta ?? '') == 1) && (($halpengesahan->kaprodi ?? '') == 1) != null ? 'badge-success' : 'badge-info'}}">
                    {{(($halpengesahan->PB1 ?? '') == 1) && (($halpengesahan->PB2 ?? '') == 1) && (($halpengesahan->PJ1 ?? '') == 1) && (($halpengesahan->PJ2 ?? '') == 1) && (($halpengesahan->koor_ta ?? '') == 1) && (($halpengesahan->kaprodi ?? '') == 1) != null ? 'SUDAH LENGKAP' : 'BELUM LENGKAP'}}
                    </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-auto" align="center">
                <div class="form-group" style="padding: 38px 0;">
                    @if($data->doc_ta && $data->sourcecode_ta && $bio && $exitsurvey)
                    <a href="{{route('ta.bebaslab', $data->mahasiswa_id)}}" class="btn btn-primary btn-noborder btn-rounded">Download Surat Bebas Lab</a>
                    @else
                    <span class="badge badge-info badge-pill py-10 px-15 font-w700">Belum Input Draft TA/Source Code/Biodata Alumni/Exit Survey</span>
                    @endif
                </div>
            </div>
            <div class="col-md-auto">
                <div class="form-group" align="center">
                    <span href="" class="badge py-10 px-20 font-w700 {{($bebaslab->kalab_getaran ?? '') == 1 ? 'badge-success' : 'badge-primary'}}">Kalab Getaran dan Perawatan Mesin</span>
                    <span href="" class="badge py-10 px-20 font-w700 {{($bebaslab->kalab_mekanika ?? '') == 1 ? 'badge-success' : 'badge-primary'}}">Kalab Mekanika Fluida</span>
                </div>
                <div class="form-group" align="center">
                    <span href="" class="badge py-10 px-20 font-w700 {{($bebaslab->kalab_perancangan ?? '') == 1 ? 'badge-success' : 'badge-primary'}}"> Kalab Perancangan dan Komputasi</span>
                    <span href="" class="badge py-10 px-20 font-w700 {{($bebaslab->kalab_motor ?? '') == 1 ? 'badge-success' : 'badge-primary'}}">Kalab Motor Bakar & Otomotif</span>
                </div>
                <div class="form-group" align="center">
                    <span href="" class="badge py-10 px-20 font-w700 {{($bebaslab->kalab_panas ?? '') == 1 ? 'badge-success' : 'badge-primary'}}">Kalab Perpindahan Panas & Thermodinamika</span>
                    <span href="" class="badge py-10 px-20 font-w700 {{($bebaslab->kalab_produksi ?? '') == 1 ? 'badge-success' : 'badge-primary'}}">Kalab Proses Produksi</span>
                </div>
                <div class="form-group" align="center">
                    <span href="" class="badge py-10 px-20 font-w700 {{($bebaslab->kalab_otomasi ?? '') == 1 ? 'badge-success' : 'badge-primary'}}">Kalab Otomasi & Robotika</span>
                    <span href="" class="badge py-10 px-20 font-w700 {{($bebaslab->kalab_material ?? '') == 1 ? 'badge-success' : 'badge-primary'}}">Kalab Material Teknik</span>
                </div>
                <div class="form-group" align="center">
                    <span href="" class="badge py-10 px-20 font-w700 {{($bebaslab->kalab_pengecoran ?? '') == 1 ? 'badge-success' : 'badge-primary'}}">Kalab Teknik Pengecoran dan Pengelasan</span>
                    <span href="" class="badge py-10 px-20 font-w700 {{($bebaslab->kalab_nano ?? '') == 1 ? 'badge-success' : 'badge-primary'}}">Kalab Nano Bioenergi</span>
                </div>
                <div class="form-group" align="center">
                    <span href="" class="badge py-10 px-20 font-w700 {{($bebaslab->kalab_energi ?? '') == 1 ? 'badge-success' : 'badge-primary'}}">Kalab Energi Surya </span>
                    <span href="" class="badge py-10 px-20 font-w700 {{($bebaslab->pembimbing_akademik ?? '') == 1 ? 'badge-success' : 'badge-primary'}}">Pembimbing Akademik</span>
                </div>
            </div>
            <div class="col-md-auto" align="center">
                <div class="form-group" style="padding: 38px 0;">
                    <span class="badge {{(($bebaslab->kalab_getaran ?? '') == 1) && (($bebaslab->kalab_perancangan ?? '') == 1) && (($bebaslab->kalab_motor ?? '') == 1) && (($bebaslab->kalab_mekanika ?? '') == 1) && 
                    (($bebaslab->pembimbing_akademik ?? '') == 1) != null ? 'badge-success' : 'badge-info'}}">
                    {{(($bebaslab->kalab_getaran ?? '') == 1) && (($bebaslab->kalab_perancangan ?? '') == 1) && (($bebaslab->kalab_motor ?? '') == 1) && (($bebaslab->kalab_mekanika ?? '') == 1) && 
                    (($bebaslab->kalab_panas ?? '') == 1) && (($bebaslab->kalab_produksi ?? '') == 1) && (($bebaslab->kalab_otomasi ?? '') == 1) && (($bebaslab->kalab_material ?? '') == 1) && (($bebaslab->kalab_penegecoran ?? '') == 1) &&
                    (($bebaslab->kalab_nano ?? '') == 1) && (($bebaslab->kalab_energi ?? '') == 1) && (($bebaslab->pembimbing_akademik ?? '') == 1) != null ? 'SUDAH LENGKAP' : 'BELUM LENGKAP'}}
                    </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6" align="center">
                <div class="form-group">
                    <a href="{{route('ta.alumni.index')}}" class="btn btn-primary btn-noborder btn-rounded">Isi Biodata Alumni</a>
                </div>
            </div> 
            <div class="col-md-4" align="center">
                <div class="form-group">
                    @if(($bio->acc_pembimbing ?? '') == 1)
                    <a href="{{route('ta.alumni.show', $data->mahasiswa_id)}}" class="btn btn-primary">Download Biodata</a>
                    @else
                    <span class="badge badge-info">Belum Input Biodata / Belum Disetujui Pembimbing Akademik</span>
                    @endif
                </div>
            </div>
            <div class="col-md-2" align="center">
                <div class="form-group">
                    @if(($bio->acc_pembimbing ?? '') == 1)
                    <span class="badge badge-success">DISETUJUI</span>
                    @else
                    <span class="badge badge-info">BELUM DISETUJUI</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6" align="center">
                <div class="form-group">
                    <a href="{{route('ta.exitsurvey.index')}}" class="btn btn-primary btn-noborder btn-rounded">Exit Survey Mahasiswa</a>
                </div>
            </div>
            <div class="col-md-4">
            </div>
            <div class="col-md-2" align="center">
                <div class="form-group">
                    @if(($exitsurvey->acc_koorta ?? '') == 1)
                    <span class="badge badge-success">DISETUJUI</span>
                    @else
                    <span class="badge badge-info">BELUM DISETUJUI</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Labels on top -->
</div>

@endsection

@section('js_after')
<script>jQuery(function(){ Codebase.helpers(['flatpickr']); });</script>
<script src="{{asset('/js/plugins/jquery-ui/jquery-ui.min.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    $(function () {
        var fileName = "{{$data->nama_mhs}}";
        $("#btnShow").click(function () {
            $("#dialog").dialog({
                modal: true,
                title: fileName,
                width: 750,
                height: 500,
                buttons: {
                    Close: function () {
                        $(this).dialog('close');
                    }
                },
                open: function () {
                    var object = "<object data=\"{FileName}\" type=\"application/pdf\" width=\"710px\" height=\"350px\">";
                    object += "If you are unable to view file, you can download from <a style = \"color:blue\"  href=\"{{ asset('file_draftta/'.$data->doc_ta)}}\">here</a>";
                    object += " or download <a target = \"_blank\" href = \"http://get.adobe.com/reader/\">Adobe PDF Reader</a> to view the file.";
                    object += "</object>";
                    object = object.replace(/{FileName}/g, "{{ asset('file_draftta/'.$data->doc_ta)}}");
                    $("#dialog").html(object);
                }
            });
        });
    });
</script>
@endsection
