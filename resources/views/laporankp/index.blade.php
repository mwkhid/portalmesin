@extends('layouts.backend')

@section('title','Laporan KP')
@section('css_after')
<link href="{{asset('/css/jquery-ui.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<!-- Page Content -->
<div class="content">
<!-- Labels on top -->
<div class="block">
    <div class="block-header block-header-default">
        <h3 class="block-title">Upload Dokumen Laporan Kerja Praktek</h3>
    </div>
    <div class="block-content block-content-full">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6">
                    @if(session()->get('message'))
                    <div class="alert alert-info alert-dismissable mt-20" role="alert">
                        <strong>Success</strong> {{ session()->get('message') }}  
                    </div>
                    @endif
                    @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        {{ $error }} <br/>
                        @endforeach
                    </div>
                    @endif
                </div>
                
                <form action="{{ route('kp.laporan.update', $data->kp_id) }}" method="POST" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                    <!-- Block Tabs Animated Slide Up -->
                    <div class="block">
                        <ul class="nav nav-tabs nav-tabs-block bg-gray-light" data-toggle="tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" href="#btabs-animated-slideup-home">Presensi Seminar KP</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#btabs-animated-slideup-profile">Laporan KP</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#btabs-animated-slideup-nilaipem">Nilai KP Pembimbing</a>
                            </li>
                        </ul>
                        <div class="block-content tab-content overflow-hidden">
                            <div class="tab-pane fade fade-up show active" id="btabs-animated-slideup-home" role="tabpanel">
                                <h4 class="font-w400">File Presensi Seminar KP <span class="text-danger">*</span></h4>
                                <div class="form-group">
                                    <!-- <label>File Presensi Seminar KP</label> -->
                                    <div class="custom-file">
                                        <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                        <!-- When multiple files are selected, we use the word 'Files'. You can easily change it to your own language by adding the following to the input, eg for DE: data-lang-files="Dateien" -->
                                        <input type="file" class="custom-file-input" id="file_presensi" name="file_presensi" data-toggle="custom-file-input" multiple>
                                        <label class="custom-file-label" for="file_presensi">Pilih berkas PDF</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="nim" value="{{ $data->nim }}">
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="action" value="presensi" class="btn btn-primary mb-5">Submit</button>
                                    @if($data->file_presensi != null)
                                    <input id="btnShow" type="button" value="Show Presensi" class="btn btn-warning mr-5 mb-5"/>
                                    <div id="dialog" style="display: none"></div>
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane fade fade-up" id="btabs-animated-slideup-profile" role="tabpanel">
                                <h4 class="font-w400">Laporan KP <span class="text-danger">*</span></h4>
                                <div class="form-group">
                                    <label>File Laporan KP</label>
                                    <div class="custom-file">
                                        <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                        <!-- When multiple files are selected, we use the word 'Files'. You can easily change it to your own language by adding the following to the input, eg for DE: data-lang-files="Dateien" -->
                                        <input type="file" class="custom-file-input" id="file_laporan" name="file_laporan" data-toggle="custom-file-input" multiple>
                                        <label class="custom-file-label" for="file_laporan">Pilih berkas PDF</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="nim" value="{{ $data->nim }}">
                                </div>
                                <div class="form-group">
                                    @if($accLaporankp->laporan_kp == 1)
                                    <button type="submit" name="action" value="laporan" class="btn btn-info mb-5">Submit</button>
                                    @else
                                    <span class="badge badge-danger">Laporan KP Belum Disetujui</span>
                                    @endif
                                    @if($data->file_laporan != null)
                                    <input id="lapShow" type="button" value="Show Laporan" class="btn btn-warning mr-5 mb-5"/>
                                    <div id="lap" style="display: none"></div>
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane fade fade-up" id="btabs-animated-slideup-nilaipem" role="tabpanel">
                                <h4 class="font-w400">Nilai Seminar KP Pembimbing <span class="text-danger">*</span></h4>
                                <div class="form-group">
                                    <a href="{{route('kp.cetak.nilaipembimbing')}}" class="btn btn-alt-info mb-5" target="_blank">Cetak Nilai Seminar KP</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Block Tabs Animated Slide Up -->
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END Labels on top -->
</div>

@endsection

@section('js_after')
<script>jQuery(function(){ Codebase.helpers(['flatpickr']); });</script>
<script src="{{asset('js/plugins/jquery-ui/jquery-ui.min.js')}}" type="text/javascript"></script>
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
                    object += "If you are unable to view file, you can download from <a style = \"color:blue\"  href=\"{{ asset('file_presensi/'.$data->file_presensi)}}\">here</a>";
                    object += " or download <a target = \"_blank\" href = \"http://get.adobe.com/reader/\">Adobe PDF Reader</a> to view the file.";
                    object += "</object>";
                    object = object.replace(/{FileName}/g, "{{ asset('file_presensi/'.$data->file_presensi)}}"    );
                    $("#dialog").html(object);
                }
            });
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        var fileName = "{{$data->nama_mhs}}";
        $("#lapShow").click(function () {
            $("#lap").dialog({
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
                    object += "If you are unable to view file, you can download from <a style = \"color:blue\"  href=\"{{ asset('file_laporan/'.$data->file_laporan)}}\">here</a>";
                    object += " or download <a target = \"_blank\" href = \"http://get.adobe.com/reader/\">Adobe PDF Reader</a> to view the file.";
                    object += "</object>";
                    object = object.replace(/{FileName}/g, "{{ asset('file_laporan/'.$data->file_laporan)}}"    );
                    $("#lap").html(object);
                }
            });
        });
    });
</script>
@endsection