@extends('layouts.backend')

@section('title','Manual Book Portal Elektro')
@section('css_after')
<link href="{{asset('/css/jquery-ui.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<!-- Page Content -->
<div class="content">
<!-- Labels on top -->
<div class="block">
    <div class="block-header block-header-default">
        <h3 class="block-title">Upload Manual Book</h3>
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
                <form action="{{route('usermanual.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <!-- Block Tabs Animated Slide Up -->
                        <div class="block">
                            <!-- <div class="block-header block-header-default">
                                <h3 class="block-title">Import User <small>Teknik Elektro</small></h3>
                            </div> -->
                            <div class="block-content block-content-full">
                                <h4 class="font-w400">File Manual Book <span class="text-danger">*</span></h4>
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="file_manual_book" data-toggle="custom-file-input" multiple>
                                        <label class="custom-file-label">Pilih File dalam Bentuk PDF</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="action" value="manual" class="btn btn-alt-primary mb-5">Submit</button>
                                    <input id="btnShow" type="button" value="Show Manual Book" class="btn btn-secondary mr-5 mb-5"/>
                                    <div id="dialog" style="display: none"></div>
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
        var fileName = "Manual Book Portal Elektro";
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
                    object += "If you are unable to view file, you can download from <a style = \"color:blue\"  href=\"{{ asset('file_manual_book/Manual_Book_PE.pdf')}}\">here</a>";
                    object += " or download <a target = \"_blank\" href = \"http://get.adobe.com/reader/\">Adobe PDF Reader</a> to view the file.";
                    object += "</object>";
                    object = object.replace(/{FileName}/g, "{{ asset('file_manual_book/Manual_Book_PE.pdf')}}"    );
                    $("#dialog").html(object);
                }
            });
        });
    });
</script>
@endsection
