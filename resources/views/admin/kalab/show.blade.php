@extends('layouts.backend')

@section('title','Bebas LAB')

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
            <h3 class="block-title">Surat Bebas LAB</h3>
        </div>
        <div class="block-content block-content-full">
            <div class="row">
                <div class="col-md-4" align="center" >
                    <!-- <div class="form-group">
                        <a href="" class="btn btn-primary btn-noborder btn-rounded">DOWNLOAD DRAFT TA</a>
                    </div> -->
                    <form action="{{route('kalab.bebaslab.update', $data->id)}}" method="post">
                    @method('PATCH')
                    @csrf
                        <div class="form-group">
                            <button type="submit" name="action" value="pembimbing" class="btn btn-primary btn-noborder btn-rounded">SETUJUI</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-2" align="center">
                    <div class="form-group" style="padding: 6px 0;">
                    <!-- <label for="">Pembimbing 1</label> -->
                        @can('kalabsel')
                            @if(($bebaslab->kalab_sel ?? '') == 1)
                            <span class="badge badge-success">SUDAH DISETUJUI</span>
                            @else
                            <span class="badge badge-warning">BELUM DISETUJUI</span>
                            @endif
                        @endcan
                        @can('kalabik')
                            @if(($bebaslab->kalab_ik ?? '') == 1)
                            <span class="badge badge-success">SUDAH DISETUJUI</span>
                            @else
                            <span class="badge badge-warning">BELUM DISETUJUI</span>
                            @endif
                        @endcan
                        @can('kalabele')
                            @if(($bebaslab->kalab_elektronika ?? '') == 1)
                            <span class="badge badge-success">SUDAH DISETUJUI</span>
                            @else
                            <span class="badge badge-warning">BELUM DISETUJUI</span>
                            @endif
                        @endcan
                        @can('kalabtele')
                            @if(($bebaslab->kalab_tele ?? '') == 1)
                            <span class="badge badge-success">SUDAH DISETUJUI</span>
                            @else
                            <span class="badge badge-warning">BELUM DISETUJUI</span>
                            @endif
                        @endcan
                        @can('laboranele')
                            @if(($bebaslab->laboran_elektronika ?? '') == 1)
                            <span class="badge badge-success">SUDAH DISETUJUI</span>
                            @else
                            <span class="badge badge-warning">BELUM DISETUJUI</span>
                            @endif
                        @endcan
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('kalab.bebaslab.index')}}" class="btn btn-secondary btn-noborder btn-rounded float-right">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Page Content -->
@endsection