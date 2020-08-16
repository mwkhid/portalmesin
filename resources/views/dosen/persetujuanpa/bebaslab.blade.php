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
                        <label class="col-3">Kalab Konversi Energi dan Sistem Tenaga Listrik <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <span class="badge py-10 px-15 font-w700  {{$bebaslab->kalab_sel == 1 ? 'badge-success' : 'badge-info'}}">
                            {{$bebaslab->kalab_sel == 1 ? 'SUDAH SETUJU' : 'BELUM SETUJU'}}
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Kalab Elektronika</label>
                        <div class="col-md-9">
                            <span class="badge py-10 px-15 font-w700  {{$bebaslab->kalab_elektronika == 1 ? 'badge-success' : 'badge-info'}}">
                            {{$bebaslab->kalab_elektronika == 1 ? 'SUDAH SETUJU' : 'BELUM SETUJU'}}
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Laboran Elektronika</label>
                        <div class="col-md-9">
                            <span class="badge py-10 px-15 font-w700 {{$bebaslab->laboran_elektronika == 1 ? 'badge-success' : 'badge-info'}}">
                            {{$bebaslab->laboran_elektronika == 1 ? 'SUDAH SETUJU' : 'BELUM SETUJU'}}
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Kalab Telekomunikasi dan Pengolahan Sinyal</label>
                        <div class="col-md-9">
                            <span class="badge py-10 px-15 font-w700  {{$bebaslab->kalab_tele == 1 ? 'badge-success' : 'badge-info'}}">
                            {{$bebaslab->kalab_tele == 1 ? 'SUDAH SETUJU' : 'BELUM SETUJU'}}
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Kalab Instrumentasi Kendali</label>
                        <div class="col-md-9">
                            <span class="badge py-10 px-15 font-w700  {{$bebaslab->kalab_ik == 1 ? 'badge-success' : 'badge-info'}}">
                            {{$bebaslab->kalab_ik == 1 ? 'SUDAH SETUJU' : 'BELUM SETUJU'}}
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Kalab Komputer dan Jaringan</label>
                        <div class="col-md-9">
                            <span class="badge py-10 px-15 font-w700  {{$bebaslab->kalab_komputer == 1 ? 'badge-success' : 'badge-info'}}">
                            {{$bebaslab->kalab_komputer == 1 ? 'SUDAH SETUJU' : 'BELUM SETUJU'}}
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