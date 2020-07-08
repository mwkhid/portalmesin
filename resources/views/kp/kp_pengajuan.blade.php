@extends('layouts.backend')

@section('title','Pendaftaran KP')

@section('content')
<div class="content">
    <!-- Validation Wizards -->
    <h2 class="content-heading">Form Pendaftaran Kerja Praktek</h2>
    <div class="row">
        <div class="col-md-12">
            <!-- Validation Wizard Classic -->
            <div class="js-wizard-validation-classic block">
                <!-- Step Tabs -->
                <ul class="nav nav-tabs nav-tabs-block nav-fill" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#wizard-validation-classic-step1" data-toggle="tab">1. Data Diri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#wizard-validation-classic-step2" data-toggle="tab">2. Data Perusahaan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#wizard-validation-classic-step3" data-toggle="tab">3. Tanggal Pelaksanaan</a>
                    </li>
                </ul>
                <!-- END Step Tabs -->

                <!-- Form -->
                <form class="js-wizard-validation-classic-form" action="{{ route('kp.pendaftaran.store') }}" method="post">
                @csrf
                    <!-- Steps Content -->
                    <div class="block-content block-content-full tab-content" style="min-height: 265px;">
                        <!-- Step 1 -->
                        <div class="tab-pane active" id="wizard-validation-classic-step1" role="tabpanel">
                            <div class="form-group">
                                <label for="Nama">Nama</label>
                                <input type="text" class="form-control" name="nama" value="{{$data->nama_mhs}}" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label for="Nim">NIM</label>
                                <input type="text" class="form-control" name="nim" value="{{$data->nim}}" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="status_kp" value="PENDING">
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="mahasiswa_id" value="{{$data->id}}">
                            </div>
                            <div class="form-group">
                                <label for="sks">Jumlah SKS Lulus</label>
                                <input type="text" step="1" min="0" class="form-control" name="sks" value="{{$data->sks}}" placeholder="Total SKS yang dicapai" readonly>
                            </div>
                            <div class="form-group">
                                <label for="IPK">IPK</label>
                                <input type="text" step="0.01" min="0" max="4" class="form-control" name="ipk" value="{{$data->ipk}}" placeholder="Masukkan IPK Anda.." readonly>
                            </div>
                        </div>
                        <!-- END Step 1 -->

                        <!-- Step 2 -->
                        <div class="tab-pane" id="wizard-validation-classic-step2" role="tabpanel">
                            <div class="form-group">
                                <label for="nama perusahaan">Nama Perusahaan <span class="text-danger">*</span></label>
                                <input required type="text" class="form-control" name="perusahaan_nama" value="{{old('perusahaan_nama')}}" placeholder="Masukkan Nama Perusahaan..">
                                @if($errors->has('perusahaan_nama'))
                                    <div class="text-danger">
                                        {{ $errors->first('perusahaan_nama')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="alamat perusahaan">Alamat Perusahaan <span class="text-danger">*</span></label>
                                <input required type="text" class="form-control" name="perusahaan_almt" value="{{old('perusahaan_almt')}}" placeholder="Masukkan Alamat Perusahaan..">
                                @if($errors->has('perusahaan_almt'))
                                    <div class="text-danger">
                                        {{ $errors->first('perusahaan_almt')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="jenis usaha perusahaan">Jenis Usaha Perusahaan <span class="text-danger">*</span></label>
                                <input required type="text" class="form-control" name="perusahaan_jenis" value="{{old('perusahaan_jenis')}}" placeholder="Masukkan Jenis Usaha Perusahaan..">
                                @if($errors->has('perusahaan_jenis'))
                                    <div class="text-danger">
                                        {{ $errors->first('perusahaan_jenis')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="PIC">PIC <span class="text-danger">*</span></label>
                                <input required type="text" class="form-control" name="pic" value="{{old('pic')}}" placeholder="PIC bukan nama orang, Contoh : HRD, HCM, dll">
                                @if($errors->has('pic'))
                                    <div class="text-danger">
                                        {{ $errors->first('pic')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!-- END Step 2 -->

                        <!-- Step 3 -->
                        <div class="tab-pane" id="wizard-validation-classic-step3" role="tabpanel">
                            <div class="form-group">
                                <label for="Tanggal Mulai">Tanggal Mulai KP <span class="text-danger">*</span></label>
                                <input required type="text" class="js-flatpickr form-control bg-white" id="rencana_mulai_kp" value="{{old('rencana_mulai_kp')}}" name="rencana_mulai_kp" placeholder="Y-m-d">
                                <div class="text-danger">{{ $errors->first('rencana_mulai_kp')}}</div>
                            </div>
                            <div class="form-group">
                                <label for="Tanggal Selesai">Tanggal Selesai KP <span class="text-danger">*</span></label>
                                <input required type="text" class="js-flatpickr form-control bg-white" id="rencana_selesai_kp" value="{{old('rencana_selesai_kp')}}" name="rencana_selesai_kp" placeholder="Y-m-d">
                                <div class="text-danger">{{ $errors->first('rencana_selesai_kp')}}</div>
                            </div>
                        </div>
                        <!-- END Step 3 -->
                    </div>
                    <!-- END Steps Content -->

                    <!-- Steps Navigation -->
                    <div class="block-content block-content-sm block-content-full bg-body-light">
                        <div class="row">
                            <div class="col-6">
                                <button type="button" class="btn btn-alt-secondary" data-wizard="prev">
                                    <i class="fa fa-angle-left mr-5"></i> Previous
                                </button>
                            </div>
                            <div class="col-6 text-right">
                                <button type="button" class="btn btn-alt-secondary" data-wizard="next">
                                    Next <i class="fa fa-angle-right ml-5"></i>
                                </button>
                                @if(($accTempatkp->tempat_kp ?? '') != null)
                                    <button type="submit" class="btn btn-alt-primary d-none" data-wizard="finish">
                                    <i class="fa fa-check mr-5"></i> Daftar Kerja Praktek</button>
                                @else
                                    <span class="badge badge-danger" data-wizard="finish">Tempat Kp Belum Disetujui Pembimbing KP</span>
                                @endif
                                <!-- <button type="submit" class="btn btn-alt-primary d-none" data-wizard="finish">
                                    <i class="fa fa-check mr-5"></i> Submit
                                </button> -->
                            </div>
                        </div>
                    </div>
                    <!-- END Steps Navigation -->
                </form>
                <!-- END Form -->
            </div>
            <!-- END Validation Wizard Classic -->
        </div>
    </div>
    <!-- END Validation Wizards -->
</div>
@endsection

@section('js_after')
<script>jQuery(function(){ Codebase.helpers(['flatpickr']); });</script>
<script src="{{asset('js/plugins/bootstrap-wizard/jquery.bootstrap.wizard.js')}}"></script>
<script src="{{asset('js/pages/be_forms_wizard.min.js')}}"></script>
<script src="{{asset('js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('js/plugins/jquery-validation/additional-methods.js')}}"></script>
@endsection