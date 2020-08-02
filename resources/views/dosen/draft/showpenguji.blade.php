@extends('layouts.backend')

@section('title','Kelengkapan Wisuda')

@section('content')
<!-- Page Content -->
<div class="content">
    <!-- Labels on top -->
    @if(session()->get('message'))
    <div class="alert alert-info alert-dismissable" role="alert">
        <strong>Success</strong> {{ session()->get('message') }}  
    </div>
    @endif
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Persetujuan Draft</h3>
        </div>
        <div class="block-content block-content-full">
            <div class="row">
                <div class="col-md-6" align="center">
                    <div class="form-group">
                        <a href="{{route('dosen.downloaddraft',$data->ta_id)}}" class="btn btn-primary btn-noborder btn-rounded">DOWNLOAD DRAFT TA</a>
                    </div>
                    <form action="{{route('dosen.draftpenguji.update', $data->mahasiswa_id)}}" method="post">
                    @method('PATCH')
                    @csrf
                        <input type="hidden" name="penguji_ke" value="{{$data->penguji_ke}}">
                        <div class="form-group">
                            <button type="submit" name="action" value="pembimbing" class="btn btn-primary btn-noborder btn-rounded">SETUJUI</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-4" align="center">
                    <div class="form-group" style="padding: 6px 0;">
                    @if($data->penguji_ke == 1)
                        @if(($pengesahan->PJ1 ?? '') == 1)
                            <span class="badge badge-success">SUDAH DISETUJUI</span>
                        @else
                            <span class="badge badge-warning">BELUM DISETUJUI</span>
                        @endif
                    @else
                        @if(($pengesahan->PJ2 ?? '') == 1)
                            <span class="badge badge-success">SUDAH DISETUJUI</span>
                        @else
                            <span class="badge badge-warning">BELUM DISETUJUI</span>
                        @endif
                    @endif
                    </div>
                </div>
                <div class="col-md-2" align="center">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('dosen.persetujuandraft.index')}}" class="btn btn-secondary btn-noborder btn-rounded float-right">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Page Content -->
@endsection