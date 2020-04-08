@extends('layouts.backend')

@section('title','Log Book Tugas Akhir')

@section('content')
<div class="content">
    <!-- Bootstrap Design -->
    <h2 class="content-heading">Log Book Tugas Akhir</h2>
    <form action="{{ route('ta.logbook.update', $data->id) }}" method="post">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Log Book Tugas Akhir</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option">
                            <i class="si si-wrench"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">Kegiatan</label>
                        <div class="col-md-12">
                            <textarea type="text" class="form-control" rows="6" name="kegiatan"
                            placeholder="Tuliskan kegiatan TA yang dilakukan secara detail (Minimal 30 kata).Contoh: Mengerjakan hardware, konsultasi, membaca literatur, mengambil data dsb. Jabarkan lagi secara detail, berbentuk narasi juga diperbolehkan"
                            >{{$data->kegiatan}}</textarea>
                            <span class="text-danger">{{ $errors->first('kegiatan') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="bab">Kegiatan berhubungan dengan BAB</label>
                        <div class="col-md-12">
                            <select class="form-control js-select2" name="bab">
                                <option value="">PIlih Bab</option>
                                <option value="1" {{$data->bab == 1 ? 'selected' : '' }}>BAB 1 PENDAHULUAN</option>
                                <option value="2" {{$data->bab == 2 ? 'selected' : '' }}>BAB 2 TINJAUAN PUSTAKA</option>
                                <option value="3" {{$data->bab == 3 ? 'selected' : '' }}>BAB 3 METODOLOGI (JALANNYA PENELITIAN)</option>
                                <option value="4" {{$data->bab == 4 ? 'selected' : '' }}>BAB 4 HASIL DAN PEMBAHASAN</option>
                                <option value="5" {{$data->bab == 5 ? 'selected' : '' }}>BAB 5 KESIMPULAN</option>
                            </select>
                            <span class="text-danger">{{ $errors->first('bab') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">Kendala</label>
                        <div class="col-md-12">
                            <textarea type="text" class="form-control" id="kendala" name="kendala" rows="4" placeholder="Tuliskan kendala dalam pengerjaan TA yang sedang dihadapi. Kendala ini akan menjadi perhatian pembimbing dalam membantu mahasiswa..Tulis 'tidak ada' apabila belum menemui kendala."
                            >{{$data->kendala}}</textarea>
                            <span class="text-danger">{{ $errors->first('kendala') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">Rencana</label>
                        <div class="col-md-12">
                            <textarea type="text" class="form-control" id="rencana" name="rencana" rows="6" placeholder="Tuliskan rencana Anda untuk kegiatan tugas akhir selanjutnya."
                            >{{$data->rencana}}</textarea>
                            <span class="text-danger">{{ $errors->first('rencana') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-12 ml-auto">
                            <button type="submit" class="btn btn-alt-primary mb-5">Submit</button>
                            <a href="{{route('ta.logbook.index')}}" class="btn btn-alt-secondary mb-5">Kembali</a>
                        </div>
                    </div>                      
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
@endsection
@section('js_after')
<script>jQuery(function(){ Codebase.helpers(['select2','flatpickr']); });</script>
@endsection
