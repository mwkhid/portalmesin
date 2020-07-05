@extends('layouts.backend')

@section('title','Perubahan Pembimbing TA')

@section('content')
<div class="content">
    <!-- Bootstrap Design -->
    <h2 class="content-heading">Perubahan Pembimbing Tugas Akhir</h2>
    @if(session()->get('message'))
        <div class="alert alert-info alert-dismissable mt-20" role="alert">
            <strong>Success</strong> {{ session()->get('message') }}  
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Daftar Perubahan Pembimbing TA <small>Teknik Elektro</small></h3>
                </div>
                <div class="block-content block-content-full">
                    <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                        <tr>
                            <th class="d-none d-sm-table-cell text-center" style="width: 3%">No</th>
                            <th class="d-none d-sm-table-cell text-center" style="width: 7%">NIM</th>
                            <th class="text-center" style="width: 30%;">Nama</th>
                            <th class="d-none d-sm-table-cell text-center" style="width: 30%;">Judul</th>
                            <th class="text-center" style="width: 10%;">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1?>
                        @foreach ($listpembimbing as $row)
                        <tr>
                            <td class="d-none d-sm-table-cell font-size-sm text-center">{{ $no++}}</td>
                            <td class="d-none d-sm-table-cell font-size-sm text-center">{{ $row->nim}}</td>
                            <td class="font-w600 font-size-sm text-center">
                                <a href="#">{{ $row->nama_mhs}}</a>
                            </td>
                            <td class="d-none d-sm-table-cell font-size-sm text-center">
                                {{ $row->judul}}
                            </td>
                            <td class="font-size-sm text-center">
                                <?php $status = $row->status_pembimbing ?>
                                @if($status == 1)
                                    <span class="badge badge-success">SETUJU</span>
                                @elseif($status == 0)
                                    <span class="badge badge-danger">TOLAK</span>
                                @else
                                    <span class="badge badge-warning">PENDING</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <form action="{{route('ta.pembimbing.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Mahasiswa</h3>
                </div>
                <div class="block-content">
                    <div class="form-group row">
                        <label class="col-12" for="nim">NIM</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="nim" value="{{$data->nim}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="nama">Nama</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="nama" value="{{$data->nama_mhs}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="sks">Total SKS</label>
                        <div class="col-md-12">
                            <input type="text" step="1" min="0" class="form-control" name="sks" value="{{$data->sks}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12" for="ipk">Indeks Prestasi Kumulatif</label>
                        <div class="col-md-12">
                            <input type="text" step="0.01" min="0" max="4" class="form-control" name="ipk" value="{{$data->ipk}}" readonly>
                        </div>
                    </div>
                    <input type="text" class="form-control" name="ta_id" value="{{$data->id}}" hidden>                        
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        
    <div class="col-md-12">
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Tugas Akhir</h3>
                </div>
                <div class="block-content">
                    <div class="form-group row">
                        <label class="col-12" for="judullama">Judul</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="judul_lama" value="{{$data->judul}}" readonly>
                        </div>
                    </div>
                    @foreach($pembimbing as $key=>$pembimbings)
                    <div class="form-group">
                        <input type="text" class="form-control" name="idpem_lama{{$key+1}}" value="{{$pembimbings->pembimbing}}" hidden>
                        <label for="sks">Pembimbing {{$key+1}} Tugas Akhir</label>
                        <input type="text" class="form-control "  name="pembimbing_lama{{$key+1}}" Value="{{$pembimbings->nama_dosen}}" readonly>
                    </div>
                    @endforeach
                    <?php for ($i = 1; $i <= 2; $i++) { ?>
                    <div class="form-group">
                        <label for="sks">Pembimbing Baru {{$i}} Tugas Akhir <span class="text-danger">*</span></label>
                        <select required class="form-control js-select2" name="pembimbing_baru{{$i}}" id="pembimbing_baru{{$i}}">
                            <option value="">Pilih Pembimbing</option>
                            @foreach ($dosen as $dosens)
                                <option name="dosen" value="{{ $dosens->id }}">{{ $dosens->nama_dosen}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('pembimbing_baru'.$i))
                            <div class="text-danger">
                                {{ $errors->first('pembimbing_baru'.$i)}}
                            </div>
                        @endif
                    </div>
                    <?php } ?>
                    <div class="form-group row">
                        <label class="col-12" for="alasan">Alasan <span class="text-danger">*</span></label>
                        <div class="col-md-12">
                            <textarea required type="text" class="form-control" id="alasan" name="pembimbing_alasan" rows="6" placeholder="Alasan perubahan pembimbing">{{old('pembimbing_alasan')}}</textarea>
                            <span class="text-danger">{{ $errors->first('pembimbing_alasan') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12"> 
                            <button type="submit" class="btn btn-primary mb-5">Submit</button>
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
