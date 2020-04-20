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
    <div class="block-header block-header-default">
        <h3 class="block-title">Upload Surat Balasan Kerja Praktek</h3>
    </div>
    <div class="block-content block-content-full">
        <!-- <h3 class="text-center my-5">Tutorial Laravel #30 : Membuat Upload File Dengan Laravel</h3> -->
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
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
                <div class="form-group">
                <h2 class="content-heading border-bottom mb-4 pb-2 pt-0" >File Surat Balasan</h2>
                    <div class="custom-file">
                        <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                        <!-- When multiple files are selected, we use the word 'Files'. You can easily change it to your own language by adding the following to the input, eg for DE: data-lang-files="Dateien" -->
                        <input type="file" class="custom-file-input" id="example-file-multiple-input-custom" name="file_balasan" data-toggle="custom-file-input" multiple>
                        <label class="custom-file-label" for="example-file-multiple-input-custom">Pilih File dalam Bentuk PDF</label>
                    </div>
                </div>
                <h2 class="content-heading border-bottom mb-4 pb-2 pt-0" >Tanggal Pelaksanaan</h2>
                    <div class="form-group">
                    <label for="Tanggal Mulai">Tanggal Mulai KP</label>
                        <input type="text" class="js-flatpickr form-control bg-white" id="tgl_mulai_kp" name="tgl_mulai_kp" value="{{ $waiting->rencana_mulai_kp}}">
                    </div>
                    <div class="form-group">
                    <label for="Tanggal Mulai">Tanggal Selesai KP</label>
                        <input type="text" class="js-flatpickr form-control bg-white" id="tgl_selesai_kp" name="tgl_selesai_kp" value="{{ $waiting->rencana_selesai_kp}}">
                    </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" name="id" value="{{ $waiting->id }}">
                    <input type="hidden" class="form-control" name="nim" value="{{ $waiting->nim }}">
                </div>
                <div class="form-group">
                    <input type="submit" value="Submit" class="btn btn-primary mr-5 mb-5">
                    @if($waiting->file_balasan ?? '' != null)
                    <p>
                        <div id="dialog" style="display: none"></div>
                        <input id="btnShow" type="button" value="Show PDF" class="btn btn-warning mr-5 mb-5"/>
                        <a class="btn btn-success mr-5 mb-5" href="{{url('kp/pelaksanaan/cetak_lmbr_tugas')}}" target="_blank">Lembar Penugasan KP</a>
                        <a class="btn btn-info mr-5 mb-5" href="{{url('kp/pelaksanaan/cetak_form_nilai')}}" target="_blank">Form Penilaian KP</a>
                    </p>
                    <!-- <a href="{{ route('kp.pendaftaran.download', $waiting->file_balasan ?? '') }}">{{ $waiting->file_balasan ?? '' }}</a> -->
                    @endif
                </div>
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
