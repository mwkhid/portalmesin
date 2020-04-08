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
        <div class="col-lg-8 mx-auto my-5">	
            @if(session()->get('message'))
            <div class="alert alert-info alert-dismissable row" role="alert">
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
            <form action="{{ route('kp.laporan.update', $data->kp_id) }}" method="POST" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="form-group row">
                    <label>File Presensi Seminar KP</label>
                    <div class="custom-file">
                        <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                        <!-- When multiple files are selected, we use the word 'Files'. You can easily change it to your own language by adding the following to the input, eg for DE: data-lang-files="Dateien" -->
                        <input type="file" class="custom-file-input" id="file_presensi" name="file_presensi" data-toggle="custom-file-input" multiple>
                        <label class="custom-file-label" for="file_presensi">Choose files PDF</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label>File Laporan KP</label>
                    <div class="custom-file">
                        <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                        <!-- When multiple files are selected, we use the word 'Files'. You can easily change it to your own language by adding the following to the input, eg for DE: data-lang-files="Dateien" -->
                        <input type="file" class="custom-file-input" id="file_laporan" name="file_laporan" data-toggle="custom-file-input" multiple>
                        <label class="custom-file-label" for="file_laporan">Choose files PDF</label>
                    </div>
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" name="nim" value="{{ $data->nim }}">
                </div>
                <div class="form-group row">
                    <input type="submit" value="Upload" class="btn btn-primary mr-5 mb-5">
                    @if($data->file_presensi != null)
                    <input id="btnShow" type="button" value="Show Presensi PDF" class="btn btn-warning mr-5 mb-5"/>
                    <div id="dialog" style="display: none"></div>
                    @endif 
                    @if($data->file_laporan != null)
                    <input id="lapShow" type="button" value="Show Laporan PDF" class="btn btn-secondary mr-5 mb-5"/>
                    <div id="lap" style="display: none"></div>
                    @endif 
                </div>
            </form>
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
