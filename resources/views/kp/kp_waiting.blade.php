@extends('layouts.backend')

@section('title','Pengajuan KP')
@section('css_after')
<link href="{{asset('/css/jquery-ui.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<!-- Page Content -->
<div class="content">
<!-- Labels on top -->
<div class="block">
    <div class="block-header">
        <h3 class="block-title">Upload Surat Balasan Kerja Praktek</h3>
    </div>
    <div class="block-content block-content-full">
        <!-- <h3 class="text-center my-5">Tutorial Laravel #30 : Membuat Upload File Dengan Laravel</h3> -->
 
        <div class="col-md-8 mx-auto my-5">	
            @if(session()->get('message'))
            <div class="alert alert-info alert-dismissable" role="alert">
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
            <form action="{{ route('kp.pendaftaran.upload', $waiting->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group row">
                    <label class="col-12">File Upload *PDF</label>
                    <div class="col-8">
                        <div class="custom-file">
                            <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                            <!-- When multiple files are selected, we use the word 'Files'. You can easily change it to your own language by adding the following to the input, eg for DE: data-lang-files="Dateien" -->
                            <input type="file" class="custom-file-input" id="example-file-multiple-input-custom" name="file_balasan" data-toggle="custom-file-input" multiple>
                            <label class="custom-file-label" for="example-file-multiple-input-custom">Pilih File dalam Bentuk PDF</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" name="nim" value="{{ $waiting->nim }}">
                </div>
                <div class="form-group row">
                    <div class="col-12">
                        <input type="submit" value="Upload" class="btn btn-primary mr-5 mb-5">
                        @if($waiting->file_balasan ?? '' != null)
                        <!-- <h4 class="my-5">Data PDF</h4> -->
                            <input id="btnShow" type="button" value="Show PDF" class="btn btn-warning mr-5 mb-5"/>
                            <div id="dialog" style="display: none"></div>
                        <!-- <a href="{{ route('kp.pendaftaran.download', $waiting->file_balasan ?? '') }}">{{ $waiting->file_balasan ?? '' }}</a> -->
                        @endif
                    </div>
                </div>
            </form>
            
            
        </div>

    </div>
</div>
<!-- END Labels on top -->
</div>

@endsection

@section('js_after')

<script src="{{asset('/js/plugins/jquery-ui/jquery-ui.min.js')}}" type="text/javascript"></script>
<script type="text/javascript">
        $(function () {
            var fileName = "{{$waiting->nama_mhs}}";
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
                        object += "If you are unable to view file, you can download from <a style = \"color:blue\"  href=\"{{ asset('file_balasankp/'.$waiting->file_balasan ?? '')}}\">here</a>";
                        object += " or download <a target = \"_blank\" href = \"http://get.adobe.com/reader/\">Adobe PDF Reader</a> to view the file.";
                        object += "</object>";
                        object = object.replace(/{FileName}/g, "{{ asset('file_balasankp/'.$waiting->file_balasan ?? '')}}"    );
                        $("#dialog").html(object);
                    }
                });
            });
        });
    </script>
@endsection
