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
                <div class="col-md-2" align="center" style="padding: 6px 0;">
                    <!-- <div class="form-group">
                        <a href="" class="btn btn-primary btn-noborder btn-rounded">DOWNLOAD DRAFT TA</a>
                    </div> -->
                    <form action="{{route('kaprodi.halpengesahan.update', $pengesahan->mahasiswa_id)}}" method="post">
                    @method('PATCH')
                    @csrf
                        <div class="form-group">
                            <button type="submit" name="action" value="pembimbing" class="btn btn-primary btn-noborder btn-rounded">SETUJUI</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-2" align="center">
                    <div class="form-group">
                    <label for="">Pembimbing 1</label>
                        @if(($pengesahan->PB1 ?? '') == 1)
                            <span class="badge badge-success">SUDAH DISETUJUI</span>
                        @else
                            <span class="badge badge-warning">BELUM DISETUJUI</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-2" align="center">
                    <div class="form-group">
                    <label for="">Pembimbing 2</label>
                        @if(($pengesahan->PB2 ?? '') == 1)
                            <span class="badge badge-success">SUDAH DISETUJUI</span>
                        @else
                            <span class="badge badge-warning">BELUM DISETUJUI</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-2" align="center">
                    <div class="form-group">
                    <label for="">Penguji 1</label>
                        @if(($pengesahan->PJ1 ?? '') == 1)
                            <span class="badge badge-success">SUDAH DISETUJUI</span>
                        @else
                            <span class="badge badge-warning">BELUM DISETUJUI</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-2" align="center">
                    <div class="form-group">
                    <label for="">Penguji 2</label>
                        @if(($pengesahan->PJ2 ?? '') == 1)
                            <span class="badge badge-success">SUDAH DISETUJUI</span>
                        @else
                            <span class="badge badge-warning">BELUM DISETUJUI</span>
                        @endif
                    </div>
                </div>
                <div class="col-md-2" align="center">
                    <div class="form-group">
                        <label for="">Koordinator TA</label>
                        @if(($pengesahan->koor_ta ?? '') == 1)
                            <span class="badge badge-success">SUDAH DISETUJUI</span>
                        @else
                            <span class="badge badge-warning">BELUM DISETUJUI</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('kaprodi.halpengesahan.index')}}" class="btn btn-secondary btn-noborder btn-rounded float-right">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Page Content -->
@endsection