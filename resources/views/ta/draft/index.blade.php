@extends('layouts.backend')

@section('title','Draft Tugas Akhir')
@section('css_after')
<link href="{{asset('/css/jquery-ui.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<!-- Page Content -->
<div class="content">
<!-- Labels on top -->
<div class="block">
    <div class="block-header block-header-default">
        <h3 class="block-title">Upload Dokumen Skripsi Final & Scan Halaman Pengesahan</h3>
    </div>
    <div class="block-content block-content-full">
        <!-- <h3 class="text-center my-5">Tutorial Laravel #30 : Membuat Upload File Dengan Laravel</h3> -->
 
        <div class="col-md-6 mx-auto my-5">
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
            <form action="{{ route('ta.draft.update', $data->ta_id) }}" method="POST" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="form-group row">
                    <label>File Draft TA Final <span class="text-danger">*</span></label>
                    <div class="custom-file">
                        <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                        <!-- When multiple files are selected, we use the word 'Files'. You can easily change it to your own language by adding the following to the input, eg for DE: data-lang-files="Dateien" -->
                        <input type="file" class="custom-file-input" id="example-file-multiple-input-custom" name="file_draftta" data-toggle="custom-file-input" multiple>
                        <label class="custom-file-label" for="example-file-multiple-input-custom">Choose files</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label>File Pengesahan TA <span class="text-danger">*</span></label>
                    <div class="custom-file">
                        <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                        <!-- When multiple files are selected, we use the word 'Files'. You can easily change it to your own language by adding the following to the input, eg for DE: data-lang-files="Dateien" -->
                        <input type="file" class="custom-file-input" id="example-file-multiple-input-custom" name="file_pengesahanta" data-toggle="custom-file-input" multiple>
                        <label class="custom-file-label" for="example-file-multiple-input-custom">Choose files PDF</label>
                    </div>
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" name="nim" value="{{ $data->nim }}">
                </div>
                <div class="form-group row">
                    <input type="submit" value="Upload" class="btn btn-primary mr-5 mb-5">
                    @if($data->doc_ta != null)
                    <input id="btnShow" type="button" value="Show Draft TA" class="btn btn-warning mr-5 mb-5"/>
                    <div id="dialog" style="display: none"></div>
                    <input id="pengesahanShow" type="button" value="Show Pengesahan TA" class="btn btn-success mr-5 mb-5"/>
                    <div id="pengesahan" style="display: none"></div>
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
<script type="text/javascript">
    $(function () {
        var fileName = "{{$data->nama_mhs}}";
        $("#pengesahanShow").click(function () {
            $("#pengesahan").dialog({
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
                    object += "If you are unable to view file, you can download from <a style = \"color:blue\"  href=\"{{ asset('file_pengesahanta/'.$data->pengesahan_ta)}}\">here</a>";
                    object += " or download <a target = \"_blank\" href = \"http://get.adobe.com/reader/\">Adobe PDF Reader</a> to view the file.";
                    object += "</object>";
                    object = object.replace(/{FileName}/g, "{{ asset('file_pengesahanta/'.$data->pengesahan_ta)}}");
                    $("#pengesahan").html(object);
                }
            });
        });
    });
</script>
@endsection
