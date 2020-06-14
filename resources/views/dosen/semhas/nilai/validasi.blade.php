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
                        <label for="peminatan" class="col-2">Peminatan</label>
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
                <form action="{{route('dosen.nilai_semhas.validasi', $nilai->id)}}" method="post">
                    @method('PATCH')
                    @csrf
                    <h5>Presentasi (30%)</h5>
                    <div class="form-group row">
                        <label class="col-md-4" for="a1">1. Keruntutan materi dan sistematika isi presentasi</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="a1" value="{{$nilai->a1}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4" for="a2">2. Cara penyampaian materi</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="a2" value="{{$nilai->a2}}" readonly>
                            <span class="text-danger">{{ $errors->first('a2') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4" for="a3">3. Kualitas grafis file presentasi</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="a3" value="{{$nilai->a3}}" readonly>
                            <span class="text-danger">{{ $errors->first('a3') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4" for="a4">4. Waktu presentasi</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="a4" value="{{$nilai->a4}}" readonly>
                            <span class="text-danger">{{ $errors->first('a4') }}</span>
                        </div>
                    </div>
                    <h5>Makalah Skripsi (40%)</h5>
                    <div class="form-group row">
                        <label class="col-md-4" for="b1">1. Format dan kelengkapan naskah</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="b1" value="{{$nilai->b1}}" readonly>
                            <span class="text-danger">{{ $errors->first('b1') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4" for="b2">2. Kedalaman landasan teori</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="b2" value="{{$nilai->b2}}" readonly>
                            <span class="text-danger">{{ $errors->first('b2') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4" for="b3">3. Ketepatan menggunakan metode penelitian</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="b3" value="{{$nilai->b3}}" readonly>
                            <span class="text-danger">{{ $errors->first('b3') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4" for="b4">4. Ketajaman analisis dan pembahasan</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="b4" value="{{$nilai->b4}}" readonly>
                            <span class="text-danger">{{ $errors->first('b4') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4" for="b5">5. Ketepatan penarikan kesimpulan dan saran</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="b5" value="{{$nilai->b5}}" readonly>
                            <span class="text-danger">{{ $errors->first('b5') }}</span>
                        </div>
                    </div>
                    <h5>Penguasaan Materi (30%)</h5>
                    <div class="form-group row">
                        <label class="col-md-4" for="c1">1. Kemampuan dan pemahaman materi</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="c1" value="{{$nilai->c1}}" readonly>
                            <span class="text-danger">{{ $errors->first('c1') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4" for="c2">2. Ketepatan memberikan jawaban</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="c2" value="{{$nilai->c2}}" readonly>
                            <span class="text-danger">{{ $errors->first('c2') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4" for="c3">3. Kualitas jawaban</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="c3" value="{{$nilai->c3}}" readonly>
                            <span class="text-danger">{{ $errors->first('c3') }}</span>
                        </div>
                    </div>
                    <h5>Total</h5>
                    <div class="form-group row">
                        <label class="col-md-4" for="c3">Nilai Akhir</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="total" value="{{$nilai->total}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4" for="revisi">Revisi</label>
                        <div class="col-md-8">
                            <textarea type="text" class="form-control" id="revisi" name="revisi" rows="4" readonly>{{$nilai->revisi}}</textarea>
                        </div>
                    </div>
                    @if($nilai->status_nilai == 0)
                    <h6 class="text-danger">Note : Nilai yang sudah di Submit tidak bisa di edit kembali!</h6>
                    @endif
                    <div class="form-group row">
                        <div class="col-md-8">
                            @if($nilai->status_nilai == 0)
                            <button class="btn btn-success mr-5 mb-5">Submit</button>
                            <a href="{{route('dosen.nilai_semhas.edit', $data->ta_id)}}" class="btn btn-warning mr-5 mb-5">Edit</a>
                            @endif
                            <a href="{{route('dosen.semhas.index')}}" class="btn btn-secondary mr-5 mb-5">Kembali</a>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection