@extends('layouts.backend')

@section('title','Pendaftaran TA')

@section('content')
<div class="content">
    <!-- Validation Wizards -->
    <h2 class="content-heading">Pengajuan Tugas Akhir</h2>
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
                        <a class="nav-link" href="#wizard-validation-classic-step2" data-toggle="tab">2. Tugas Akhir</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#wizard-validation-classic-step3" data-toggle="tab">3. Mata Kuliah Pendukung</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#wizard-validation-classic-step4" data-toggle="tab">4. Dosen Pembimbing</a>
                    </li>
                </ul>
                <!-- END Step Tabs -->

                <!-- Form -->
                <form class="js-wizard-validation-classic-form" action="{{ route('ta.pendaftaran.store') }}" method="post">
                @csrf
                    <!-- Steps Content -->
                    <div class="block-content block-content-full tab-content" style="min-height: 265px;">
                        <!-- Step 1 -->
                        <div class="tab-pane active" id="wizard-validation-classic-step1" role="tabpanel">
                            <div class="form-group row">
                                <label class="col-12" for="example-text-input">NIM</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="nim" value="{{ $data->nim }}" placeholder="masukkan nim" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12" for="example-text-input">Nama</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="nama" value="{{ $data->nama_mhs }}" placeholder="masukkan nama" disabled="">
                                </div>
                            </div>
                            <input type="hidden" class="form-control" value="PENDING" name="status_ta">
                            <input type="hidden" class="form-control" value="0" name="cetak_ta">
                            <div class="form-group row">
                                <label class="col-12" for="example-text-input">Total SKS</label>
                                <div class="col-md-12">
                                    <input type="text" step="1" min="0" class="form-control" name="sks" value="{{ $data->sks }}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-12" for="example-text-input">Indeks Prestasi Kumulatif</label>
                                <div class="col-md-12">
                                    <input type="text" step="0.01" min="0" max="4" class="form-control" name="ipk" value="{{ $data->ipk }}" readonly>
                                </div>
                            </div>
                            <input type="text" class="form-control" name="mahasiswa_id" value="{{$data->id}}" hidden>
                            @if($errors->has('mahasiswa_id'))
                                <div class="text-danger">
                                    {{ $errors->first('mahasiswa_id')}}
                                </div>
                            @endif 
                        </div>
                        <!-- END Step 1 -->

                        <!-- Step 2 -->
                        <div class="tab-pane" id="wizard-validation-classic-step2" role="tabpanel">
                            <div class="form-group">
                                <label for="sks">Peminatan <span class="text-danger">*</span></label>
                                <select required class="form-control js-select2" style="width: 100%" name="peminatan_id" id="peminatan_id" data-live-search="true">
                                    <option value="">Pilih Peminatan</option>
                                    @foreach ($peminatan as $peminatans)
                                        <option name="peminatan" value="{{ $peminatans->id }}" {{old('peminatan_id') == $peminatans->id ? 'selected' : ''}}>{{ $peminatans->nama_peminatan}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('peminatan_id') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="example-text-input">Judul <span class="text-danger">*</span></label>
                                <textarea required type="text" class="form-control" id="judul" name="judul" rows="4" placeholder="Masukkan judul">{{old('judul')}}</textarea>
                                @if($errors->has('judul'))
                                    <span class="text-danger">
                                        {{ $errors->first('judul')}}
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="example-text-input">Abstrak <span class="text-danger">*</span></label>
                                <textarea required type="text" class="form-control" id="abstrak" name="abstrak" rows="6" placeholder="Deskripsi singkat">{{old('abstrak')}}</textarea>
                                <span class="text-danger">{{ $errors->first('abstrak') }}</span>
                            </div>
                        </div>
                        <!-- END Step 2 -->

                        <!-- Step 3 -->
                        <div class="tab-pane" id="wizard-validation-classic-step3" role="tabpanel">
                            <div class="form-group">
                                <div class="row">
                                    <!-- <div class="col-md-3">
                                        Kode MK
                                    </div> -->
                                    <div class="col-md-6">
                                        Nama MK <span class="text-danger">*</span>
                                    </div>
                                    <div class="col-md-3">
                                        Nilai <span class="text-danger">*</span>
                                    </div>
                                    <div class="col-md-3">
                                        Huruf <span class="text-danger">*</span>
                                    </div>

                                    <?php for ($i = 1; $i <= 3; $i++){ ?>
                                    <!-- <div class="col-md-3">
                                        <input type="text" class="form-control" name="kode_mk{{$i}}" id="kode_mk{{$i}}" placeholder="Kode Mata Kuliah {{$i}}"><br>
                                    </div> -->
                                    <div class="col-md-6">
                                        <select required class="form-control js-select2" style="width: 100%" name="mk{{$i}}" id="mk{{$i}}" >
                                            <option value="">Pilih Mata Kuliah</option>
                                            @foreach ($matakuliah as $mks)
                                                <option name="mata_kuliah" value="{{ $mks->nama }}" {{old('mk'.($i)) == $mks->nama ? 'selected' : ''}}>{{ $mks->nama}}</option>
                                            @endforeach
                                        </select><br>
                                        @if($errors->has('mk'.$i))
                                            <div class="text-danger">
                                                {{ $errors->first('mk'.$i)}}
                                            </div>
                                        @endif
                                        <br>
                                    </div>
                                    <div class="col-md-3">
                                        <input required type="float" class="form-control" name="nilai_mk{{$i}}" value="{{old('nilai_mk'.($i))}}" placeholder="Nilai (0-4)"><br>
                                    </div>
                                    <div class="col-md-3">
                                        <input required type="text" class="form-control" name="huruf_mk{{$i}}" value="{{old('huruf_mk'.($i))}}" placeholder="Huruf (E-A)"><br>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <!-- END Step 3 -->

                        <!-- Step 4 -->
                        <div class="tab-pane" id="wizard-validation-classic-step4" role="tabpanel">
                            <?php for ($i = 1; $i <= 2; $i++) { ?>
                            <div class="form-group">
                                <label for="sks">Pembimbing {{$i}} Tugas Akhir <span class="text-danger">*</span></label>
                                <select required class="form-control js-select2" style="width: 100%" name="pembimbing{{$i}}" id="pembimbing{{$i}}">
                                    <option value="">Pilih Pembimbing</option>
                                    @foreach ($dosen as $dosens)
                                        <option name="dosen" value="{{ $dosens->id }}" {{old('pembimbing'.($i)) == $dosens->id ? 'selected' : ''}}>{{ $dosens->nama_dosen}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('pembimbing'.$i))
                                    <div class="text-danger">
                                        {{ $errors->first('pembimbing'.$i)}}
                                    </div>
                                @endif
                            </div>
                            <?php } ?>
                        </div>
                        <!-- END Step 4 -->
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
                                <button type="submit" class="btn btn-alt-primary d-none" data-wizard="finish">
                                    <i class="fa fa-check mr-5"></i> Daftar Tugas Akhir
                                </button>
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
<script>jQuery(function(){ Codebase.helpers(['select2','flatpickr']); });</script>
<script src="{{asset('js/plugins/bootstrap-wizard/jquery.bootstrap.wizard.js')}}"></script>
<script src="{{asset('js/pages/be_forms_wizard.min.js')}}"></script>
<script src="{{asset('js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<!-- <script src="{{asset('js/plugins/jquery-validation/additional-methods.js')}}"></script> -->
@endsection