@extends('layouts.backend')

@section('title','Pendaftaran KP')
@section('css_after')
<link href="{{asset('/css/jquery-ui.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<!-- Page Content -->
<div class="content">
<!-- Labels on top -->
<div class="block">
    <div class="block-header block-header-default">
        <h3 class="block-title">Upload Dokumen Kerja Praktek</h3>
    </div>
    <div class="block-content block-content-full">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6">
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
                </div>
                <form action="{{ route('kp.pendaftaran.upload', $waiting->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <!-- Block Tabs Animated Slide Up -->
                    <div class="block">
                        <ul class="nav nav-tabs nav-tabs-block bg-gray-light" data-toggle="tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" href="#btabs-animated-slideup-proposal">Proposal KP</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#btabs-animated-slideup-permohonan">Surat Permohonan KP</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#btabs-animated-slideup-balasan">Surat Balasan KP</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#btabs-animated-slideup-penugasan">Lembar Penugasan KP</a>
                            </li>
                        </ul>
                        <div class="block-content tab-content overflow-hidden">
                            <div class="tab-pane fade fade-up show active" id="btabs-animated-slideup-proposal" role="tabpanel">
                                <h4 class="font-w400">File Proposal KP<span class="text-danger">*</span></h4>
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="file_proposal" name="file_proposal" data-toggle="custom-file-input" multiple>
                                        <label class="custom-file-label" for="file_proposal">Pilih File dalam Bentuk PDF</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    @if($accPenugasankp->proposal_kp == 1)
                                    <button type="submit" name="action" value="proposal" class="btn btn-primary mb-5">Submit</button>
                                    @else
                                    <span class="badge badge-danger">Proposal KP Belum Disetujui</span>
                                    @endif
                                    @if($waiting->file_proposal != null)
                                    <input id="proposalShow" type="button" value="Show Proposal KP" class="btn btn-warning mr-5 mb-5"/>
                                    <div id="proposal" style="display: none"></div>
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane fade fade-up show" id="btabs-animated-slideup-permohonan" role="tabpanel">
                                <h4 class="font-w400">File Surat Permohonan KP <span class="text-danger">*</span></h4>
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="file_permohonan" name="file_permohonan" data-toggle="custom-file-input" multiple>
                                        <label class="custom-file-label" for="file_permohonan">Pilih File dalam Bentuk PDF</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    @if($waiting->file_proposal ?? '' != null)
                                    <button type="submit" name="action" value="permohonan" class="btn btn-primary mb-5">Submit</button>
                                    @else
                                    <span class="badge badge-danger">Belum upload Proposal KP</span>
                                    @endif
                                    @if($waiting->file_permohonan != null)
                                    <input id="permohonanShow" type="button" value="Show Permohonan" class="btn btn-warning mr-5 mb-5"/>
                                    <div id="permohonan" style="display: none"></div>
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane fade fade-up" id="btabs-animated-slideup-balasan" role="tabpanel">
                                <div class="form-group">
                                <h2 class="content-heading border-bottom mb-4 pb-2 pt-0" >File Surat Balasan <span class="text-danger">*</span></h2>
                                    <div class="custom-file">
                                        <!-- Populating custom file input label with the selected filename (data-toggle="custom-file-input" is initialized in Helpers.coreBootstrapCustomFileInput()) -->
                                        <!-- When multiple files are selected, we use the word 'Files'. You can easily change it to your own language by adding the following to the input, eg for DE: data-lang-files="Dateien" -->
                                        <input type="file" class="custom-file-input" id="example-file-multiple-input-custom" name="file_balasan" data-toggle="custom-file-input" multiple>
                                        <label class="custom-file-label" for="example-file-multiple-input-custom">Pilih File dalam Bentuk PDF</label>
                                    </div>
                                </div>
                                <h2 class="content-heading border-bottom mb-4 pb-2 pt-0" >Tanggal Pelaksanaan <span class="text-danger">*</span></h2>
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
                                    @if($waiting->file_permohonan ?? '' != null)
                                    <button type="submit" name="action" value="balasan" class="btn btn-primary mb-5">Submit</button>
                                    @else
                                    <span class="badge badge-danger">Belum mengajukan Permohonan KP</span>
                                    @endif
                                    <!-- <input type="submit" value="Submit" class="btn btn-primary mr-5 mb-5"> -->
                                    @if($waiting->file_balasan ?? '' != null)
                                        <div id="dialog" style="display: none"></div>
                                        <input id="btnShow" type="button" value="Show Balasan" class="btn btn-warning mr-5 mb-5"/>
                                    <!-- <a href="{{ route('kp.pendaftaran.download', $waiting->file_balasan ?? '') }}">{{ $waiting->file_balasan ?? '' }}</a> -->
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane fade fade-up" id="btabs-animated-slideup-penugasan" role="tabpanel">
                                <h4 class="font-w400">File Lembar Penugasan KP <span class="text-danger">*</span></h4>
                                <!-- <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="file_penugasan" name="file_penugasan" data-toggle="custom-file-input" multiple>
                                        <label class="custom-file-label" for="file_penugasan">Pilih File dalam Bentuk PDF</label>
                                    </div>
                                </div> -->
                                <div class="form-group">
                                    @if($accPenugasankp->penugasan_kp == 1)
                                        <a class="btn btn-success mr-5 mb-5" href="{{url('kp/pelaksanaan/cetak_lmbr_tugas')}}" target="_blank">Lembar Penugasan KP</a>
                                        <a class="btn btn-info mr-5 mb-5" href="{{url('kp/pelaksanaan/cetak_form_nilai')}}" target="_blank">Form Penilaian KP</a>
                                    <!-- <button type="submit" name="action" value="penugasan" class="btn btn-primary mb-5">Submit</button> -->
                                    @else
                                    <span class="badge badge-danger">Pembimbing KP belum Memberikan Penugasan KP</span>
                                    @endif
                                    <!-- @if($waiting->file_penugasan != null)
                                    <input id="penugasanShow" type="button" value="Show Penugasan" class="btn btn-warning mr-5 mb-5"/>
                                    <div id="penugasan" style="display: none"></div>
                                    @endif -->
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
<script type="text/javascript">
    $(function () {
        var fileName = "{{$waiting->nama_mhs}}";
        $("#proposalShow").click(function () {
            $("#proposal").dialog({
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
                    object += "If you are unable to view file, you can download from <a style = \"color:blue\"  href=\"{{ asset('file_proposal/'.$waiting->file_proposal ?? '')}}\">here</a>";
                    object += " or download <a target = \"_blank\" href = \"http://get.adobe.com/reader/\">Adobe PDF Reader</a> to view the file.";
                    object += "</object>";
                    object = object.replace(/{FileName}/g, "{{ asset('file_proposal/'.$waiting->file_proposal ?? '')}}"    );
                    $("#proposal").html(object);
                }
            });
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        var fileName = "{{$waiting->nama_mhs}}";
        $("#permohonanShow").click(function () {
            $("#permohonan").dialog({
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
                    object += "If you are unable to view file, you can download from <a style = \"color:blue\"  href=\"{{ asset('file_permohonan/'.$waiting->file_permohonan ?? '')}}\">here</a>";
                    object += " or download <a target = \"_blank\" href = \"http://get.adobe.com/reader/\">Adobe PDF Reader</a> to view the file.";
                    object += "</object>";
                    object = object.replace(/{FileName}/g, "{{ asset('file_permohonan/'.$waiting->file_permohonan ?? '')}}"    );
                    $("#permohonan").html(object);
                }
            });
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        var fileName = "{{$waiting->nama_mhs}}";
        $("#penugasanShow").click(function () {
            $("#penugasan").dialog({
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
                    object += "If you are unable to view file, you can download from <a style = \"color:blue\"  href=\"{{ asset('file_penugasan/'.$waiting->file_penugasan ?? '')}}\">here</a>";
                    object += " or download <a target = \"_blank\" href = \"http://get.adobe.com/reader/\">Adobe PDF Reader</a> to view the file.";
                    object += "</object>";
                    object = object.replace(/{FileName}/g, "{{ asset('file_penugasan/'.$waiting->file_penugasan ?? '')}}"    );
                    $("#penugasan").html(object);
                }
            });
        });
    });
</script>
@endsection
