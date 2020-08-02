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
    @if(count($errors) > 0)
    <div class="alert alert-danger alert-dismissable row">
        @foreach ($errors->all() as $error)
        {{ $error }} <br/>
        @endforeach
    </div>
    @endif
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Kelengkapan Wisuda</h3>
        </div>
        <div class="block-content block-content-full">
            <div class="row">
                <div class="col-md-6" align="center">
                    <div class="form-group">
                        <a href="{{route('dosen.biodata.show', $data->id)}}" class="btn btn-primary btn-noborder btn-rounded">LIHAT BIODATA</a>
                    </div>
                    <div class="form-group">
                        <a href="{{route('dosen.bebaslab.show', $data->id)}}" class="btn btn-primary btn-noborder btn-rounded">LIHAT PERSETUJUAN KALAB</a>
                    </div>
                </div>
                <div class="col-md-4" align="center">
                    <form action="{{route('dosen.persetujuanpa.update', $data->id)}}" method="post">
                    @method('PATCH')
                    @csrf
                        <div class="form-group">
                            @if($bio)
                            <button type="submit" name="action" value="biodata" class="btn btn-primary btn-noborder btn-rounded">SETUJUI BIODATA</button>
                            @else
                                <span class="badge badge-info badge-pill py-10 px-15 font-w700">Belum Input</span>
                            @endif
                        </div>
                        <div class="form-group">
                            @if((($bebaslab->kalab_sel ?? '') == 1) && (($bebaslab->kalab_ik ?? '') == 1) && (($bebaslab->kalab_tele ?? '') == 1) && (($bebaslab->kalab_elektronika ?? '') == 1) && (($bebaslab->laboran_elektronika ?? '') == 1))
                            <button type="submit" name="action" value="bebaslab" class="btn btn-primary btn-noborder btn-rounded">SETUJUI BEBAS LAB</button>
                            @else
                                <span class="badge badge-info badge-pill py-10 px-15 font-w700">Belum Disetujui Oleh Semua Kalab</span>
                            @endif
                        </div>
                    </form>
                </div>
                <div class="col-md-2" align="center">
                    <div class="form-group" style="padding: 10px 0;">
                        @if(($bio->acc_pembimbing ?? '') == 1)
                        <span class="badge badge-success">SUDAH DISETUJUI</span>
                        @else
                        <span class="badge badge-warning">BELUM DISETUJUI</span>
                        @endif
                    </div>
                    <div class="form-group" style="padding: 1px 0;">
                        @if(($bebaslab->pembimbing_akademik ?? '') == 1)
                        <span class="badge badge-success">SUDAH DISETUJUI</span>
                        @else
                        <span class="badge badge-warning">BELUM DISETUJUI</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('dosen.persetujuanpa.index')}}" class="btn btn-secondary btn-noborder btn-rounded float-right">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Page Content -->
@endsection