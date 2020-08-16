@extends('layouts.backend')

@section('title','Selesai KP')
@section('css_after')
<link href="{{asset('/css/jquery-ui.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<!-- Page Content -->
<div class="content">
<!-- Labels on top -->
<div class="block">
    <div class="block-header block-header-default">
        <h3 class="block-title">Upload Dokumen Selesai Kerja Praktek</h3>
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
                    <div class="alert alert-danger alert-dismissable row">
                        @foreach ($errors->all() as $error)
                        {{ $error }} <br/>
                        @endforeach
                    </div>
                    @endif
                </div>
                <form action="{{ route('kp.selesaikp.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                        <!-- Block Tabs Animated Slide Up -->
                        <div class="block">
                            <ul class="nav nav-tabs nav-tabs-block bg-gray-light" data-toggle="tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#btabs-animated-slideup-surattugas">Surat Tugas KP</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#btabs-animated-slideup-selesaikp">Surat Selesai KP</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#btabs-animated-slideup-nilaikp">Nilai KP Perusahaan</a>
                                </li>
                            </ul>
                            <div class="block-content tab-content overflow-hidden">
                                <div class="tab-pane fade fade-up show active" id="btabs-animated-slideup-surattugas" role="tabpanel">
                                    <h4 class="font-w400">File Surat Tugas KP <span class="text-danger">*</span></h4>
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="file_surattugas" name="file_surattugas" data-toggle="custom-file-input" multiple>
                                            <label class="custom-file-label" for="file_surattugas">Pilih File dalam Bentuk PDF</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="action" value="surattugas" class="btn btn-primary mb-5">Submit</button>
                                        @if($data->file_surattugas != null)
                                        <input id="surattugasShow" type="button" value="Show Surat Tugas" class="btn btn-warning mr-5 mb-5"/>
                                        <div id="surattugas" style="display: none"></div>
                                        @endif
                                    </div>
                                </div>
                                <div class="tab-pane fade fade-up" id="btabs-animated-slideup-selesaikp" role="tabpanel">
                                    <div class="form-group">
                                        <h4 class="font-w400">File Surat Selesai KP <span class="text-danger">*</span></h4>
                                        <label>File Upload PDF</label>
                                        <div class="custom-file">
                                            <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                            <!-- When multiple files are selected, we use the word 'Files'. You can easily change it to your own language by adding the following to the input, eg for DE: data-lang-files="Dateien" -->
                                            <input type="file" class="custom-file-input" id="example-file-multiple-input-custom" name="file_selesaikp" data-toggle="custom-file-input" multiple>
                                            <label class="custom-file-label" for="example-file-multiple-input-custom">Choose files</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Tanggal Mulai">Tanggal Mulai KP</label>
                                        <input type="text" class="js-flatpickr form-control bg-white" id="tgl_mulai_kp" value="{{old('tgl_mulai_kp')}}" name="tgl_mulai_kp" placeholder="Y-m-d">
                                        <div class="text-danger">{{ $errors->first('tlg_mulai_kp')}}</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Tanggal Selesai">Tanggal Selesai KP</label>
                                        <input type="text" class="js-flatpickr form-control bg-white" id="tgl_selesai_kp" value="{{old('tgl_selesai_kp')}}" name="tgl_selesai_kp" placeholder="Y-m-d">
                                        <div class="text-danger">{{ $errors->first('tgl_selesai_kp')}}</div>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="nim" value="{{ $data->nim }}">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="action" value="selesaikp" class="btn btn-primary mb-5">Submit</button>
                                        <!-- <input type="submit" value="Upload" class="btn btn-primary mr-5 mb-5"> -->
                                        @if($data->file_selesaikp != null)
                                        <input id="btnShow" type="button" value="Show Surat Selesai KP" class="btn btn-warning mr-5 mb-5"/>
                                        <div id="dialog" style="display: none"></div>
                                        @endif   
                                    </div>
                                </div>
                                <div class="tab-pane fade fade-up" id="btabs-animated-slideup-nilaikp" role="tabpanel">
                                    <h4 class="font-w400">Nilai KP Perusahaan<span class="text-danger">*</span></h4>
                                    <div class="form-group">
                                        <label>File Nilai KP Perusahaan</label>
                                        <div class="custom-file">
                                            <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                            <!-- When multiple files are selected, we use the word 'Files'. You can easily change it to your own language by adding the following to the input, eg for DE: data-lang-files="Dateien" -->
                                            <input type="file" class="custom-file-input" id="file_nilai" name="file_nilai" data-toggle="custom-file-input" multiple>
                                            <label class="custom-file-label" for="file_nilai">Pilih berkas PDF</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="action" value="nilaikp" class="btn btn-info mb-5">Submit</button>
                                        @if($data->file_nilai != null)
                                        <input id="nilaiShow" type="button" value="Show Nilai PDF" class="btn btn-warning mr-5 mb-5"/>
                                        <div id="nilai" style="display: none"></div>
                                        @endif
                                    </div>
                                </div>
                            </div>
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
                    object += "If you are unable to view file, you can download from <a style = \"color:blue\"  href=\"{{ asset('file_selesaikp/'.$data->file_selesaikp)}}\">here</a>";
                    object += " or download <a target = \"_blank\" href = \"http://get.adobe.com/reader/\">Adobe PDF Reader</a> to view the file.";
                    object += "</object>";
                    object = object.replace(/{FileName}/g, "{{ asset('file_selesaikp/'.$data->file_selesaikp)}}"    );
                    $("#dialog").html(object);
                }
            });
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        var fileName = "{{$data->nama_mhs}}";
        $("#surattugasShow").click(function () {
            $("#surattugas").dialog({
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
                    object += "If you are unable to view file, you can download from <a style = \"color:blue\"  href=\"{{ asset('file_surattugaskp/'.$data->file_surattugas)}}\">here</a>";
                    object += " or download <a target = \"_blank\" href = \"http://get.adobe.com/reader/\">Adobe PDF Reader</a> to view the file.";
                    object += "</object>";
                    object = object.replace(/{FileName}/g, "{{ asset('file_surattugaskp/'.$data->file_surattugas)}}"    );
                    $("#surattugas").html(object);
                }
            });
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        var fileName = "{{$data->nama_mhs}}";
        $("#nilaiShow").click(function () {
            $("#nilai").dialog({
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
                    object += "If you are unable to view file, you can download from <a style = \"color:blue\"  href=\"{{ asset('file_nilaikp/'.$data->file_nilai)}}\">here</a>";
                    object += " or download <a target = \"_blank\" href = \"http://get.adobe.com/reader/\">Adobe PDF Reader</a> to view the file.";
                    object += "</object>";
                    object = object.replace(/{FileName}/g, "{{ asset('file_nilaikp/'.$data->file_nilai)}}"    );
                    $("#nilai").html(object);
                }
            });
        });
    });
</script>
@endsection
