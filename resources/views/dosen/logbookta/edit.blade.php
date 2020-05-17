@extends('layouts.backend')

@section('title','Log Book Tugas Akhir')

@section('content')
<div class="content">
    <!-- Bootstrap Design -->
    <h2 class="content-heading">Log Book Tugas Akhir</h2>
    <form action="{{ route('dosen.logbookta.update', $data->id) }}" method="post">
    @method('PATCH')
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Log Book Tugas Akhir</h3>
                </div>
                <div class="block-content">
                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">Nama Mahasiswa</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" value="{{$mahasiswa->nama_mhs}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">NIM</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" value="{{$mahasiswa->nim}}" readonly>
                        </div>
                    </div>
                    <input type="hidden" class="form-control" value="{{$ta->pem}}" name="pem">
                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">Kegiatan</label>
                        <div class="col-md-12">
                            <textarea type="text" class="form-control" rows="6" name="kegiatan"
                            placeholder="Tuliskan kegiatan TA yang dilakukan secara detail (Minimal 30 kata).Contoh: Mengerjakan hardware, konsultasi, membaca literatur, mengambil data dsb. Jabarkan lagi secara detail, berbentuk narasi juga diperbolehkan"
                            readonly>{{$data->kegiatan}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="bab">Kegiatan berhubungan dengan BAB</label>
                        <div class="col-md-12">
                            @if($data->bab == 1)
                                <input type="text" class="form-control" value="BAB 1 PENDAHULUAN" readonly>
                            @elseif($data->bab == 2)
                                <input type="text" class="form-control" value="BAB 2 TINJAUAN PUSTAKA" readonly>
                            @elseif($data->bab == 3)
                                <input type="text" class="form-control" value="BAB 3 METODOLOGI (JALANNYA PENELITIAN)" readonly>
                            @elseif($data->bab == 4)
                                <input type="text" class="form-control" value="BAB 4 HASIL DAN PEMBAHASAN" readonly>
                            @elseif($data->bab == 5)
                                <input type="text" class="form-control" value="BAB 5 KESIMPULAN" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">Kendala</label>
                        <div class="col-md-12">
                            <textarea type="text" class="form-control" id="kendala" name="kendala" rows="4" placeholder="Tuliskan kendala dalam pengerjaan TA yang sedang dihadapi. Kendala ini akan menjadi perhatian pembimbing dalam membantu mahasiswa..Tulis 'tidak ada' apabila belum menemui kendala."
                            readonly>{{$data->kendala}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">Rencana</label>
                        <div class="col-md-12">
                            <textarea type="text" class="form-control" id="rencana" name="rencana" rows="6" placeholder="Tuliskan rencana Anda untuk kegiatan tugas akhir selanjutnya."
                            readonly>{{$data->rencana}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="example-text-input">Komentar</label>
                        <div class="col-md-12">
                            <textarea type="text" class="form-control" id="komentar" name="komentar" rows="6" placeholder="Tuliskan komentar untuk aktivitas mahasiswa"
                            ></textarea>
                            <span class="text-danger">{{ $errors->first('komentar') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-12 ml-auto">
                            <button type="submit" class="btn btn-alt-primary mb-5">Submit</button>
                            <a href="{{route('dosen.logbookta.index')}}" class="btn btn-alt-secondary mb-5">Kembali</a>
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
<script>jQuery(function(){ Codebase.helpers(['select2']); });</script>
@endsection