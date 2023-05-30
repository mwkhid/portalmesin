@extends('layouts.backend')

@section('title','Bebas LAB')

@section('content')
<div class="content">
    <!-- Bootstrap Design -->
    <!-- <h2 class="content-heading">Bebas LAB</h2> -->
    <div class="row">
        <div class="col-md-12">
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Daftar Persetujuan Bebas LAB</h3>
                </div>
                <div class="block-content">
                    <div class="form-group row">
                        <label class="col-3">Kalab Getaran dan Perawatan Mesin <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <span class="badge py-10 px-15 font-w700  {{$bebaslab->kalab_getaran == 1 ? 'badge-success' : 'badge-info'}}">
                            {{$bebaslab->kalab_getaran == 1 ? 'SUDAH SETUJU' : 'BELUM SETUJU'}}
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Laboran Getaran dan Perawatan Mesin</label>
                        <div class="col-md-9">
                            <span class="badge py-10 px-15 font-w700 {{$bebaslab->laboran_getaran == 1 ? 'badge-success' : 'badge-info'}}">
                            {{$bebaslab->laboran_getaran == 1 ? 'SUDAH SETUJU' : 'BELUM SETUJU'}}
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Kalab Perancangan dan Komputasi</label>
                        <div class="col-md-9">
                            <span class="badge py-10 px-15 font-w700  {{$bebaslab->kalab_perancangan == 1 ? 'badge-success' : 'badge-info'}}">
                            {{$bebaslab->kalab_perancangan == 1 ? 'SUDAH SETUJU' : 'BELUM SETUJU'}}
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Kalab Mekanika Fluida</label>
                        <div class="col-md-9">
                            <span class="badge py-10 px-15 font-w700  {{$bebaslab->kalab_mekanika == 1 ? 'badge-success' : 'badge-info'}}">
                            {{$bebaslab->kalab_mekanika == 1 ? 'SUDAH SETUJU' : 'BELUM SETUJU'}}
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Laboran Mekanika Fluida</label>
                        <div class="col-md-9">
                            <span class="badge py-10 px-15 font-w700 {{$bebaslab->laboran_mekanika == 1 ? 'badge-success' : 'badge-info'}}">
                            {{$bebaslab->laboran_mekanika == 1 ? 'SUDAH SETUJU' : 'BELUM SETUJU'}}
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Kalab Motor Bakar & Otomotif</label>
                        <div class="col-md-9">
                            <span class="badge py-10 px-15 font-w700  {{$bebaslab->kalab_motor == 1 ? 'badge-success' : 'badge-info'}}">
                            {{$bebaslab->kalab_motor == 1 ? 'SUDAH SETUJU' : 'BELUM SETUJU'}}
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Laboran Motor Bakar & Otomotif</label>
                        <div class="col-md-9">
                            <span class="badge py-10 px-15 font-w700 {{$bebaslab->laboran_motor == 1 ? 'badge-success' : 'badge-info'}}">
                            {{$bebaslab->laboran_motor == 1 ? 'SUDAH SETUJU' : 'BELUM SETUJU'}}
                            </span>
                        </div>
                    </div>           
                    <div class="form-group row">
                        <label class="col-3">Kalab Perpindahan Panas & Thermodinamika</label>
                        <div class="col-md-9">
                            <span class="badge py-10 px-15 font-w700  {{$bebaslab->kalab_panas == 1 ? 'badge-success' : 'badge-info'}}">
                            {{$bebaslab->kalab_panas == 1 ? 'SUDAH SETUJU' : 'BELUM SETUJU'}}
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Laboran Perpindahan Panas & Thermodinamika</label>
                        <div class="col-md-9">
                            <span class="badge py-10 px-15 font-w700 {{$bebaslab->laboran_panas == 1 ? 'badge-success' : 'badge-info'}}">
                            {{$bebaslab->laboran_panas == 1 ? 'SUDAH SETUJU' : 'BELUM SETUJU'}}
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Kalab Proses Produksi</label>
                        <div class="col-md-9">
                            <span class="badge py-10 px-15 font-w700  {{$bebaslab->kalab_produksi == 1 ? 'badge-success' : 'badge-info'}}">
                            {{$bebaslab->kalab_produksi == 1 ? 'SUDAH SETUJU' : 'BELUM SETUJU'}}
                            </span>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-3">Laboran Proses Produksi</label>
                        <div class="col-md-9">
                            <span class="badge py-10 px-15 font-w700 {{$bebaslab->laboran_produksi == 1 ? 'badge-success' : 'badge-info'}}">
                            {{$bebaslab->laboran_produksi == 1 ? 'SUDAH SETUJU' : 'BELUM SETUJU'}}
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Kalab Otomasi & Robotika</label>
                        <div class="col-md-9">
                            <span class="badge py-10 px-15 font-w700  {{$bebaslab->kalab_otomasi == 1 ? 'badge-success' : 'badge-info'}}">
                            {{$bebaslab->kalab_otomasi == 1 ? 'SUDAH SETUJU' : 'BELUM SETUJU'}}
                            </span>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-3">Laboran Otomasi & Robotika</label>
                        <div class="col-md-9">
                            <span class="badge py-10 px-15 font-w700 {{$bebaslab->laboran_otomasi == 1 ? 'badge-success' : 'badge-info'}}">
                            {{$bebaslab->laboran_otomasi == 1 ? 'SUDAH SETUJU' : 'BELUM SETUJU'}}
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Kalab Material Teknik</label>
                        <div class="col-md-9">
                            <span class="badge py-10 px-15 font-w700  {{$bebaslab->kalab_material == 1 ? 'badge-success' : 'badge-info'}}">
                            {{$bebaslab->kalab_material == 1 ? 'SUDAH SETUJU' : 'BELUM SETUJU'}}
                            </span>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-3">Laboran Material Teknik</label>
                        <div class="col-md-9">
                            <span class="badge py-10 px-15 font-w700 {{$bebaslab->laboran_material == 1 ? 'badge-success' : 'badge-info'}}">
                            {{$bebaslab->laboran_material == 1 ? 'SUDAH SETUJU' : 'BELUM SETUJU'}}
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Kalab Teknik Pengecoran dan Pengelasan</label>
                        <div class="col-md-9">
                            <span class="badge py-10 px-15 font-w700  {{$bebaslab->kalab_pengecoran == 1 ? 'badge-success' : 'badge-info'}}">
                            {{$bebaslab->kalab_pengecoran == 1 ? 'SUDAH SETUJU' : 'BELUM SETUJU'}}
                            </span>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-3">Kalab Teknik Nano Bioenergi</label>
                        <div class="col-md-9">
                            <span class="badge py-10 px-15 font-w700  {{$bebaslab->kalab_nano == 1 ? 'badge-success' : 'badge-info'}}">
                            {{$bebaslab->kalab_nano == 1 ? 'SUDAH SETUJU' : 'BELUM SETUJU'}}
                            </span>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-3">Kalab Energi Surya</label>
                        <div class="col-md-9">
                            <span class="badge py-10 px-15 font-w700  {{$bebaslab->kalab_energi == 1 ? 'badge-success' : 'badge-info'}}">
                            {{$bebaslab->kalab_energi == 1 ? 'SUDAH SETUJU' : 'BELUM SETUJU'}}
                            </span>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-3">Laboran Energi Surya</label>
                        <div class="col-md-9">
                            <span class="badge py-10 px-15 font-w700 {{$bebaslab->laboran_energi == 1 ? 'badge-success' : 'badge-info'}}">
                            {{$bebaslab->laboran_energi == 1 ? 'SUDAH SETUJU' : 'BELUM SETUJU'}}
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <a href="{{url()->previous()}}" class="btn btn-secondary ml-5">Kembali</a>
                        </div>
                    </div>                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection