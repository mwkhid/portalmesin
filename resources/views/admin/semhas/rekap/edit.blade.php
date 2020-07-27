@extends('layouts.backend')

@section('title','Seminar Hasil Tugas Akhir')

@section('content')
<div class="content">
    <h2 class="content-heading">Penilaian Seminar Hasil Tugas Akhir</h2>
    @if(session()->get('message'))
        <div class="alert alert-info alert-dismissable mt-20" role="alert">
            <strong> {{ session()->get('message') }}  </strong> 
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Mahasiswa</h3>
                </div>
                <div class="block-content">
                    <div class="form-group row">
                        <label class="col-2" for="nama">Nama</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="{{$ta->nama_mhs}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2" for="nim">NIM</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="nim" name="nim" value="{{$ta->nim}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2" for="sks">Total SKS</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="sks" name="sks" value="{{$ta->sks}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2" for="ipk">Indeks Prestasi Kumulatif</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="ipk" name="ipk" value="{{$ta->ipk}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sks" class="col-2">Peminatan</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control"  name="peminatan" Value="{{$ta->nama_peminatan}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2" for="judul">Judul</label>
                        <div class="col-md-10">
                            <textarea type="text" class="form-control" id="judul" name="judul" rows="4" readonly>{{$ta->judul}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Nilai Seminar Hasil</h3>
                </div>
                <div class="block-content">
                <form action="{{route('admin.rekapsemhas.update', $semhas->id)}}" method="post">
                    @method('PATCH')
                    @csrf
                    <div class="form-group row">
                        <h5 class="col-md-4">Presentasi (30%)</h5>
                        <h5 class="col-md-2 text-center">Pembimbing 1</h5>
                        <h5 class="col-md-2 text-center">Pembimbing 2</h5>
                        <h5 class="col-md-2 text-center">Penguji 1</h5>
                        <h5 class="col-md-2 text-center">Penguji 2</h5>
                    </div>
                    <div class="form-group row">
                        <h5 class="col-md-4"></h5>
                        <h6 class="col-md-2 text-center">{{$pem1->nama_dosen}}</h6>
                        <h6 class="col-md-2 text-center">{{$pem2->nama_dosen}}</h6>
                        <h6 class="col-md-2 text-center">{{$uji1->nama_dosen}}</h6>
                        <h6 class="col-md-2 text-center">{{$uji2->nama_dosen}}</h6>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4" for="a1">1. Keruntutan materi dan sistematika isi presentasi</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="a1" value="{{$pembimbing1->a1 ?? ''}}" readonly>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" value="{{$pembimbing2->a1 ?? ''}}" readonly>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" value="{{$penguji1->a1 ?? ''}}" readonly>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" value="{{$penguji2->a1 ?? ''}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4" for="a2">2. Cara penyampaian materi</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="a2" value="{{$pembimbing1->a2 ?? ''}}" readonly>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" value="{{$pembimbing2->a2 ?? ''}}" readonly>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" value="{{$penguji1->a2 ?? ''}}" readonly>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" value="{{$penguji2->a2 ?? ''}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4" for="a3">3. Kualitas grafis file presentasi</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="a3" value="{{$pembimbing1->a3 ?? ''}}" readonly>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" value="{{$pembimbing2->a3 ?? ''}}" readonly>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" value="{{$penguji1->a3 ?? ''}}" readonly>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" value="{{$penguji2->a3 ?? ''}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4" for="a4">4. Waktu presentasi</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="a4" value="{{$pembimbing1->a4 ?? ''}}" readonly>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" value="{{$pembimbing2->a4 ?? ''}}" readonly>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" value="{{$penguji1->a4 ?? ''}}" readonly>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" value="{{$penguji2->a4 ?? ''}}" readonly>
                        </div>
                    </div>
                    <h5>Makalah Skripsi (40%)</h5>
                    <div class="form-group row">
                        <label class="col-md-4" for="b1">1. Format dan kelengkapan naskah</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="b1" value="{{$pembimbing1->b1 ?? ''}}" readonly>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" value="{{$pembimbing2->b1 ?? ''}}" readonly>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" value="{{$penguji1->b1 ?? ''}}" readonly>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" value="{{$penguji2->b1 ?? ''}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4" for="b2">2. Kedalaman landasan teori</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="b2" value="{{$pembimbing1->b2 ?? ''}}" readonly>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" value="{{$pembimbing2->b2 ?? ''}}" readonly>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" value="{{$penguji1->b2 ?? ''}}" readonly>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" value="{{$penguji2->b2 ?? ''}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4" for="b3">3. Ketepatan menggunakan metode penelitian</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="b3" value="{{$pembimbing1->b3 ?? ''}}" readonly>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" value="{{$pembimbing2->b3 ?? ''}}" readonly>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" value="{{$penguji1->b3 ?? ''}}" readonly>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" value="{{$penguji2->b3 ?? ''}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4" for="b4">4. Ketajaman analisis dan pembahasan</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="b4" value="{{$pembimbing1->b4 ?? ''}}" readonly>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" value="{{$pembimbing2->b4 ?? ''}}" readonly>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" value="{{$penguji1->b4 ?? ''}}" readonly>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" value="{{$penguji2->b4 ?? ''}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4" for="b5">5. Ketepatan penarikan kesimpulan dan saran</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="b5" value="{{$pembimbing1->b5 ?? ''}}" readonly>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" value="{{$pembimbing2->b5 ?? ''}}" readonly>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" value="{{$penguji1->b5 ?? ''}}" readonly>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" value="{{$penguji2->b5 ?? ''}}" readonly>
                        </div>
                    </div>
                    <h5>Penguasaan Materi (30%)</h5>
                    <div class="form-group row">
                        <label class="col-md-4" for="c1">1. Kemampuan dan pemahaman materi</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="c1" value="{{$pembimbing1->c1 ?? ''}}" readonly>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" value="{{$pembimbing2->c1 ?? ''}}" readonly>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" value="{{$penguji1->c1 ?? ''}}" readonly>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" value="{{$penguji2->c1 ?? ''}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4" for="c2">2. Ketepatan memberikan jawaban</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="c2" value="{{$pembimbing1->c2 ?? ''}}" readonly>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" value="{{$pembimbing2->c2 ?? ''}}" readonly>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" value="{{$penguji1->c2 ?? ''}}" readonly>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" value="{{$penguji2->c2 ?? ''}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4" for="c3">3. Kualitas jawaban</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="c3" value="{{$pembimbing1->c3 ?? ''}}" readonly>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" value="{{$pembimbing2->c3 ?? ''}}" readonly>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" value="{{$penguji1->c3 ?? ''}}" readonly>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" value="{{$penguji2->c3 ?? ''}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4" for="c3">Revisi</label>
                        <div class="col-md-2">
                            <textarea type="text" class="form-control" rows="4" readonly>{{$pembimbing1->revisi ?? ''}}</textarea>
                        </div>
                        <div class="col-md-2">
                            <textarea type="text" class="form-control" rows="4" readonly>{{$pembimbing2->revisi ?? ''}}</textarea>
                        </div>
                        <div class="col-md-2">
                            <textarea type="text" class="form-control" rows="4" readonly>{{$penguji1->revisi ?? ''}}</textarea>
                        </div>
                        <div class="col-md-2">
                            <textarea type="text" class="form-control" rows="4" readonly>{{$penguji2->revisi ?? ''}}</textarea>
                        </div>
                    </div>
                    <h5>Total</h5>
                    <div class="form-group row">
                        <label class="col-md-4" for="c3">Nilai Akhir</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="total" value="{{$pembimbing1->total ?? ''}}" readonly>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="total2" value="{{$pembimbing2->total ?? ''}}" readonly>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="total3" value="{{$penguji1->total ?? ''}}" readonly>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="total4" value="{{$penguji2->total ?? ''}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4" for="c3">Nilai Rata - rata</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="rata2" value="{{$rata2 ?? ''}}" readonly>
                        </div>
                    </div>
                    <h5>Berita Acara</h5>
                    <div class="form-group row">
                        <label for="pernyataan" class="col-md-4">Dinyatakan</label>
                        <div class="col-md-8">
                            @if(($pembimbing1 && $pembimbing2 && $penguji1 && $penguji2) != null)
                                <select name="pernyataan" id="" class="form-control js-select2">
                                    <option value="">Pilih Pernyataan</option>
                                    <option value="1" {{$semhas->pernyataan == 1 ? 'selected' : ''}}>Memenuhi syarat</option>
                                    <option value="0" {{$semhas->pernyataan == 0 ? 'selected' : ''}}>Tidak Memenuhi Syarat</option>
                                </select>
                                <span class="text-danger">{{ $errors->first('pernyataan') }}</span>
                            @else
                                <p class="text-danger">Berita Acara dapat diisi apabila semua penguji telah <strong>Submit Nilai</strong>.</p>
                            @endif
                        </div>
                    </div>
                    <input type="hidden" class="form-control" id="ta_id" name="ta_id" value="{{$ta->id}}" readonly>
                    <div class="form-group row">
                        <div class="col-md-8">
                            @if(($pembimbing1 && $pembimbing2 && $penguji1 && $penguji2) != null)
                            <button class="btn btn-primary mr-5 mb-5">Submit</button>
                            @endif
                            <a href="{{route('admin.listsemhas.index')}}" class="btn btn-secondary mr-5 mb-5">Kembali</a>
                            @if($semhas->nilai_angka != null)
                                <a href="{{route('admin.rekapsemhas.show', $semhas->ta_id)}}" class="btn btn-warning mr-5 mb-5">Cetak Nilai dan Berita Acara</a>
                            @endif
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js_after')
<script>jQuery(function(){ Codebase.helpers(['select2']); });</script>
@endsection