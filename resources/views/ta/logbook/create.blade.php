@extends('layouts.backend')

@section('title','Log Book Tugas Akhir')

@section('content')
<div class="content">
    <!-- Bootstrap Design -->
    <h2 class="content-heading">Log Book Tugas Akhir</h2>
    <form action="{{ route('ta.logbook.store') }}" method="post">
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
                        <label class="col-12" for="example-text-input">Nama</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="nama" value="{{$data->nama_mhs}}" readonly>
                        </div>
                    </div>
                    <input type="hidden" class="form-control" name="mahasiswa_id" value="{{$data->id}}" hidden> 
                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">NIM</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="nim" value="{{$data->nim}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">Kegiatan <span class="text-danger">*</span></label>
                        <div class="col-md-12">
                            <textarea required type="text" class="form-control" rows="6" name="kegiatan" minlength="200"
                            placeholder="Tuliskan kegiatan TA yang dilakukan secara detail (Minimal 200 Karakter).Contoh: Mengerjakan hardware, konsultasi, membaca literatur, mengambil data dsb. Jabarkan lagi secara detail, berbentuk narasi juga diperbolehkan"
                            >{{old('kegiatan')}}</textarea>
                            <span class="text-danger">{{ $errors->first('kegiatan') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="bab">Kegiatan berhubungan dengan BAB <span class="text-danger">*</span></label>
                        <div class="col-md-12">
                            <select required class="form-control js-select2" name="bab">
                                <option value="">PIlih Bab</option>
                                <option value="1">BAB 1 PENDAHULUAN</option>
                                <option value="2">BAB 2 TINJAUAN PUSTAKA</option>
                                <option value="3">BAB 3 METODOLOGI (JALANNYA PENELITIAN)</option>
                                <option value="4">BAB 4 HASIL DAN PEMBAHASAN</option>
                                <option value="5">BAB 5 KESIMPULAN</option>
                            </select>
                            <span class="text-danger">{{ $errors->first('bab') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">Kendala <span class="text-danger">*</span></label>
                        <div class="col-md-12">
                            <textarea required type="text" class="form-control" id="kendala" name="kendala" rows="4" placeholder="Tuliskan kendala dalam pengerjaan TA yang sedang dihadapi. Kendala ini akan menjadi perhatian pembimbing dalam membantu mahasiswa..Tulis 'tidak ada' apabila belum menemui kendala."
                            >{{old('kendala')}}</textarea>
                            <span class="text-danger">{{ $errors->first('kendala') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">Rencana <span class="text-danger">*</span></label>
                        <div class="col-md-12">
                            <textarea required type="text" class="form-control" id="rencana" name="rencana" rows="6" placeholder="Tuliskan rencana Anda untuk kegiatan tugas akhir selanjutnya."
                            >{{old('rencana')}}</textarea>
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
<script>
$(document).ready(function(){
  $('form textarea[minlength]').on('keyup', function(){
    e_len = $(this).val().trim().length
    e_min_len = Number($(this).attr('minlength'))
    message = e_min_len <= e_len ? '' : e_min_len + ' karakter minimum'
    this.setCustomValidity(message)
  })
})
</script>
@endsection
