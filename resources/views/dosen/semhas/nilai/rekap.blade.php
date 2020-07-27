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
                            <input type="text" class="form-control" id="nama" name="nama" value="{{$data->nama_mhs }}" placeholder="masukkan nama" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2" for="nim">NIM</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="nim" name="nim" value="{{$data->nim }}" placeholder="masukkan nim" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2" for="sks">Total SKS</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="sks" name="sks" value="{{$data->sks }}" placeholder="Total SKS yang dicapai" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2" for="ipk">Indeks Prestasi Kumulatif</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="ipk" name="ipk" value="{{$data->ipk }}" placeholder="IPK terakhir" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sks" class="col-2">Peminatan</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control"  name="peminatan" Value="{{$data->nama_peminatan}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-2" for="judul">Judul</label>
                        <div class="col-md-10">
                            <textarea type="text" class="form-control" id="judul" name="judul" rows="4" readonly>{{$data->judul}}</textarea>
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
                <form action="{{route('dosen.rekap_semhas.update', $semhas->id)}}" method="post">
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
                        <h6 class="col-md-2 text-center">{{$data->nama_dosen}}</h6>
                        <h6 class="col-md-2 text-center">{{$pembimbing->nama_dosen}}</h6>
                        <h6 class="col-md-2 text-center">{{$uji1->nama_dosen}}</h6>
                        <h6 class="col-md-2 text-center">{{$uji2->nama_dosen}}</h6>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4" for="a1">1. Keruntutan materi dan sistematika isi presentasi</label>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="a1" value="{{$nilai->a1 ?? ''}}" readonly>
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
                            <input type="text" class="form-control" name="a2" value="{{$nilai->a2 ?? ''}}" readonly>
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
                            <input type="text" class="form-control" name="a3" value="{{$nilai->a3 ?? ''}}" readonly>
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
                            <input type="text" class="form-control" name="a4" value="{{$nilai->a4 ?? ''}}" readonly>
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
                            <input type="text" class="form-control" name="b1" value="{{$nilai->b1 ?? ''}}" readonly>
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
                            <input type="text" class="form-control" name="b2" value="{{$nilai->b2 ?? ''}}" readonly>
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
                            <input type="text" class="form-control" name="b3" value="{{$nilai->b3 ?? ''}}" readonly>
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
                            <input type="text" class="form-control" name="b4" value="{{$nilai->b4 ?? ''}}" readonly>
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
                            <input type="text" class="form-control" name="b5" value="{{$nilai->b5 ?? ''}}" readonly>
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
                            <input type="text" class="form-control" name="c1" value="{{$nilai->c1 ?? ''}}" readonly>
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
                            <input type="text" class="form-control" name="c2" value="{{$nilai->c2 ?? ''}}" readonly>
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
                            <input type="text" class="form-control" name="c3" value="{{$nilai->c3 ?? ''}}" readonly>
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
                            <textarea type="text" class="form-control" rows="4" readonly>{{$nilai->revisi ?? ''}}</textarea>
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
                            <input type="text" class="form-control" name="total" value="{{$nilai->total ?? ''}}" readonly>
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
                    <h5>Action</h5>
                    <div class="form-group row">
                        <label class="col-md-4" for="c3"></label>
                        <div class="col-md-2" align="center">
                            @if(($nilai->total ?? '') == null)
                                <span class="badge badge-danger">Belum Submit Nilai</span>
                            @else
                                @if($nilai->status_nilai != 1)
                                    <span class="badge badge-info">Belum Finalisasi</span>
                                @else
                                    <input type="button" data-id="{{ $nilai->id }}" class="btn btn-danger pembimbing" value="Tolak" onclick="msg(this)">
                                @endif
                            @endif
                        </div>
                        <div class="col-md-2" align="center">
                            @if(($pembimbing2->total ?? '') == null)
                                <span class="badge badge-danger">Belum Submit Nilai</span>
                            @else
                                @if($pembimbing2->status_nilai != 1)
                                    <span class="badge badge-info">Belum Finalisasi</span>
                                @else
                                    <input type="button" data-id="{{ $pembimbing2->id }}" class="btn btn-danger pembimbing" value="Tolak" onclick="msg(this)">
                                @endif
                            @endif
                        </div>
                        <div class="col-md-2" align="center">
                            @if(($penguji1->total ?? '') == null)
                                <span class="badge badge-danger">Belum Submit Nilai</span>
                            @else
                                @if($penguji1->status_nilai != 1)
                                    <span class="badge badge-info">Belum Finalisasi</span>
                                @else
                                    <input type="button" data-id="{{ $penguji1->id }}" class="btn btn-danger penguji" value="Tolak" onclick="penguji(this)">
                                @endif
                            @endif
                        </div>
                        <div class="col-md-2" align="center">
                            @if(($penguji2->total ?? '') == null)
                                <span class="badge badge-danger">Belum Submit Nilai</span>
                            @else
                                @if($penguji2->status_nilai != 1)
                                    <span class="badge badge-info">Belum Finalisasi</span>
                                @else
                                    <input type="button" data-id="{{ $penguji2->id }}" class="btn btn-danger penguji" value="Tolak" onclick="penguji(this)">
                                @endif
                            @endif
                        </div>
                    </div>
                    <h5>Berita Acara</h5>
                    <div class="form-group row">
                        <label for="pernyataan" class="col-md-4">Dinyatakan</label>
                        <div class="col-md-8">
                            @if(($nilai && $pembimbing2 && $penguji1 && $penguji2) != null)
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
                    <input type="hidden" class="form-control" id="ta_id" name="ta_id" value="{{$data->ta_id}}" readonly>
                    <div class="form-group row">
                        <div class="col-md-8">
                            @if(($nilai && $pembimbing2 && $penguji1 && $penguji2) != null)
                            <button class="btn btn-primary mr-5 mb-5">Submit</button>
                            @endif
                            <a href="{{route('dosen.semhas.index')}}" class="btn btn-secondary mr-5 mb-5">Kembali</a>
                            @if($semhas->nilai_angka != null)
                                <a href="{{route('dosen.rekap_semhas.show', $data->ta_id)}}" class="btn btn-warning mr-5 mb-5">Cetak Nilai dan Berita Acara</a>
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
<script>
function msg(dataid) {
    let status = 0;
    let pemId = $(dataid).data('id');
    $.ajax({
        type: "GET",
        dataType: "json",
        url: '{{ route('dosen.nilai_semhas.updatestatus') }}',
        data: {'status': status, 'pem_id': pemId},
        success: function (data) {
            console.log(data.message);
            location.reload();
            // $('#toast-example-2').toast('show');
        }
    });
}
</script>
<script>
function penguji(dataid) {
    let status = 0;
    let pemId = $(dataid).data('id');
    $.ajax({
        type: "GET",
        dataType: "json",
        url: '{{ route('dosen.penguji_semhas.updatestatus') }}',
        data: {'status': status, 'pem_id': pemId},
        success: function (data) {
            console.log(data.message);
            location.reload();
            // $('#toast-example-2').toast('show');
        }
    });
}
</script>
@endsection
