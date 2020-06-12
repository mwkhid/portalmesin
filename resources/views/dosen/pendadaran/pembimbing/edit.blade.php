@extends('layouts.backend')

@section('title','Pendadaran Tugas Akhir')

@section('content')
<div class="content">
    <h2 class="content-heading">Penilaian Pendadaran Tugas Akhir</h2>
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
                    <h3 class="block-title">Nilai Bimbingan</h3>
                </div>
                <div class="block-content">
                <form action="{{route('dosen.pembimbing_pendadaran.update', $nilai->id)}}" method="post">
                    @method('PATCH')
                    @csrf
                    <input type="hidden" name="id_nilaibimbingan" value="{{$bimbingan->id}}">
                    <div class="form-group row">
                        <h5 class="col-md-4 text-center" >Aspek Yang Dinilai</h5>
                        <h5 class="col-md-2 text-center">Bobot (%)</h5>
                        <h5 class="col-md-6 text-center">Nilai Skala 0 - 100</h5>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4" for="1">1. Ketepatan waktu masa bimbingan</label>
                        <label class="col-md-2 text-center" for="bobot1">10</label>
                        <div class="col-md-6">
                            <input type="number"step="1" min="0" max="100" class="form-control" name="n1" value="{{$bimbingan->n1}}">
                            <span class="text-danger">{{ $errors->first('n1') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4" for="2">2. Kemajuan penelitian mingguan</label>
                        <label class="col-md-2 text-center" for="bobot2">15</label>
                        <div class="col-md-6">
                            <input type="number"step="1" min="0" max="100" class="form-control" name="n2" value="{{$bimbingan->n2}}">
                            <span class="text-danger">{{ $errors->first('n2') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4" for="3">3. Sikap mahasiswa selama masa bimbingan </label>
                        <label class="col-md-2 text-center" for="bobot3">20</label>
                        <div class="col-md-6">
                            <input type="number"step="1" min="0" max="100" class="form-control" name="n3" value="{{$bimbingan->n3}}">
                            <span class="text-danger">{{ $errors->first('n3') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4" for="4">4. Sumber dan data pada penelitian dapat dipertanggungjawabkan</label>
                        <label class="col-md-2 text-center" for="bobot4">20</label>
                        <div class="col-md-6">
                            <input type="number"step="1" min="0" max="100" class="form-control" name="n4" value="{{$bimbingan->n4}}">
                            <span class="text-danger">{{ $errors->first('n4') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4" for="5">5. Kemampuan menggunakan metode penelitian</label>
                        <label class="col-md-2 text-center" for="bobot5">20</label>
                        <div class="col-md-6">
                            <input type="number"step="1" min="0" max="100" class="form-control" name="n5" value="{{$bimbingan->n5}}">
                            <span class="text-danger">{{ $errors->first('n5') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4" for="6">6. Kemampuan analisis dan menarik kesimpulan</label>
                        <label class="col-md-2 text-center" for="bobot4">15</label>
                        <div class="col-md-6">
                            <input type="number"step="1" min="0" max="100" class="form-control" name="n6" value="{{$bimbingan->n6}}">
                            <span class="text-danger">{{ $errors->first('n6') }}</span>
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
                    <h3 class="block-title">Nilai Pendadaran</h3>
                </div>
                <div class="block-content">
                    <h5>Presentasi (30%)</h5>
                    <div class="form-group row">
                        <label class="col-md-4" for="a1">1. Keruntutan materi dan sistematika isi presentasi</label>
                        <div class="col-md-8">
                            <input type="number"step="1" min="0" max="100" class="form-control" name="a1" value="{{$nilai->a1}}">
                            <span class="text-danger">{{ $errors->first('a1') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4" for="a2">2. Cara penyampaian materi</label>
                        <div class="col-md-8">
                            <input type="number"step="1" min="0" max="100" class="form-control" name="a2" value="{{$nilai->a2}}">
                            <span class="text-danger">{{ $errors->first('a2') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4" for="a3">3. Kualitas grafis file presentasi</label>
                        <div class="col-md-8">
                            <input type="number"step="1" min="0" max="100" class="form-control" name="a3" value="{{$nilai->a3}}">
                            <span class="text-danger">{{ $errors->first('a3') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4" for="a4">4. Waktu presentasi</label>
                        <div class="col-md-8">
                            <input type="number"step="1" min="0" max="100" class="form-control" name="a4" value="{{$nilai->a4}}">
                            <span class="text-danger">{{ $errors->first('a4') }}</span>
                        </div>
                    </div>
                    <h5>Makalah Skripsi (40%)</h5>
                    <div class="form-group row">
                        <label class="col-md-4" for="b1">1. Format dan kelengkapan naskah</label>
                        <div class="col-md-8">
                            <input type="number"step="1" min="0" max="100" class="form-control" name="b1" value="{{$nilai->b1}}">
                            <span class="text-danger">{{ $errors->first('b1') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4" for="b2">2. Kedalaman landasan teori</label>
                        <div class="col-md-8">
                            <input type="number"step="1" min="0" max="100" class="form-control" name="b2" value="{{$nilai->b2}}">
                            <span class="text-danger">{{ $errors->first('b2') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4" for="b3">3. Ketepatan menggunakan metode penelitian</label>
                        <div class="col-md-8">
                            <input type="number"step="1" min="0" max="100" class="form-control" name="b3" value="{{$nilai->b3}}">
                            <span class="text-danger">{{ $errors->first('b3') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4" for="b4">4. Ketajaman analisis dan pembahasan</label>
                        <div class="col-md-8">
                            <input type="number"step="1" min="0" max="100" class="form-control" name="b4" value="{{$nilai->b4}}">
                            <span class="text-danger">{{ $errors->first('b4') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4" for="b5">5. Ketepatan penarikan kesimpulan dan saran</label>
                        <div class="col-md-8">
                            <input type="number"step="1" min="0" max="100" class="form-control" name="b5" value="{{$nilai->b5}}">
                            <span class="text-danger">{{ $errors->first('b5') }}</span>
                        </div>
                    </div>
                    <h5>Penguasaan Materi (30%)</h5>
                    <div class="form-group row">
                        <label class="col-md-4" for="c1">1. Kemampuan dan pemahaman materi</label>
                        <div class="col-md-8">
                            <input type="number"step="1" min="0" max="100" class="form-control" name="c1" value="{{$nilai->c1}}">
                            <span class="text-danger">{{ $errors->first('c1') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4" for="c2">2. Ketepatan memberikan jawaban</label>
                        <div class="col-md-8">
                            <input type="number"step="1" min="0" max="100" class="form-control" name="c2" value="{{$nilai->c2}}">
                            <span class="text-danger">{{ $errors->first('c2') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4" for="c3">3. Kualitas jawaban</label>
                        <div class="col-md-8">
                            <input type="number"step="1" min="0" max="100" class="form-control" name="c3" value="{{$nilai->c3}}">
                            <span class="text-danger">{{ $errors->first('c3') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4" for="revisi">Revisi</label>
                        <div class="col-md-8">
                            <textarea type="text" class="form-control" id="revisi" name="revisi" rows="4">{{$nilai->revisi}}</textarea>
                            <span class="text-danger">{{ $errors->first('revisi') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-8">
                            <button class="btn btn-primary mr-5 mb-5">Simpan</button>
                            <a href="{{route('dosen.pendadaran.index')}}" class="btn btn-secondary mr-5 mb-5">Kembali</a>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection