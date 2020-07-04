
@extends('layouts.backend')

@section('title','Seminar KP')

@section('content')
<div class="content">
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Seminar Kerja Praktek</h3>
        </div>
        <div class="block-content">
            <div class="row justify-content-center py-20">
                <div class="col-md-8">
                    <form action="{{route('kp.seminar.store')}}" method="post" id="dynamic_form">
                        @csrf
                        <span id="result"></span>
                        <h2 class="content-heading border-bottom mb-4 pb-2">Data Diri</h2>
                            <div class="form-group">
                                <label for="Nama">Nama</label>
                                <input type="text" class="form-control" name="nama" value="{{$data->nama_mhs}}" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label for="Nim">NIM</label>
                                <input type="text" class="form-control" name="nim" value="{{$data->nim}}" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="kp_id" value="{{$data->id}}">
                                <input type="hidden" class="form-control" name="tgl_selesai_kp" value="{{$data->tgl_selesai_kp}}">
                                @if($errors->has('kp_id'))
                                    <div class="text-danger">
                                        {{ $errors->first('kp_id')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="status_seminarkp" value="PENDING">
                            </div>
                        <h2 class="content-heading border-bottom mb-4 pb-2">Data Akademik</h2>
                            <div class="form-group">
                                <label for="sks">Jumlah SKS Lulus</label>
                                <input type="text" step="1" min="0" class="form-control" name="sks" value="{{$data->sks}}" readonly>
                                <div class="text-danger">{{ $errors->first('sks')}}</div>
                            </div>
                            <div class="form-group">
                                <label for="IPK">IPK</label>
                                <input type="text" step="0.01" min="0" max="4" class="form-control" name="ipk" value="{{$data->ipk}}" readonly>
                            </div>
                        <h2 class="content-heading border-bottom mb-4 pb-2">Seminar Kerja Praktek</h2>
                            <div class="form-group">
                                <label for="judul seminar">Judul Laporan KP <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="judul_seminar" value="{{old('judul_seminar')}}" placeholder="Masukkan Laporan KP">
                                @if($errors->has('judul_seminar'))
                                    <div class="text-danger">
                                        {{ $errors->first('judul_seminar')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="tanggal seminar">Tanggal Seminar KP <span class="text-danger">*</span></label>
                                <input type="text" class="js-flatpickr form-control bg-white" id="tanggal_seminar" value="{{old('tanggal_seminar')}}" name="tanggal_seminar" placeholder="Y-m-d">
                                @if($errors->has('tanggal_seminar'))
                                    <div class="text-danger">
                                        {{ $errors->first('tanggal_seminar')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="jam mulai">Jam Mulai Seminar <span class="text-danger">*</span></label>
                                <input type="text" class="js-flatpickr form-control bg-white" id="jam_mulai" name="jam_mulai" value="{{old('jam_mulai')}}" placeholder="Masukkan Jam Seminar Dimulai" data-enable-time="true" data-no-calendar="true" data-date-format="H:i" data-time_24hr="true">
                                @if($errors->has('jam_mulai'))
                                    <div class="text-danger">
                                        {{ $errors->first('jam_mulai')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="jam selesai">Jam Selesai Seminar <span class="text-danger">*</span></label>
                                <input type="text" class="js-flatpickr form-control bg-white" id="jam_selesai" name="jam_selesai" value="{{old('jam_selesai')}}" placeholder="Masukkan Jam Seminar Selesai" data-enable-time="true" data-no-calendar="true" data-date-format="H:i" data-time_24hr="true">
                                @if($errors->has('jam_selesai'))
                                    <div class="text-danger">
                                        {{ $errors->first('jam_selesai')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="acceptor">Ruang <span class="text-danger">*</span></label>
                                <select class="form-control js-select2" name="ruang_id" id="ruang_id">
                                <option value="">Pilih Ruang</option>
                                @foreach($ruang as $ruangs)
                                    <option name="ruang_id" value="{{ $ruangs->id }}">{{$ruangs->nama_ruang}}</option>
                                @endforeach
                                </select>
                                @if($errors->has('ruang_id'))
                                    <div class="text-danger">
                                        {{ $errors->first('ruang_id')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="keikutsertaan">Keikutsertaan Seminar KP <span class="text-danger">*</span></label>
                                
                                <table class="table table-bordered table-striped" id="user_table">
                                    <thead>
                                        <tr>
                                            <th width="55%">Nama</th>
                                            <th width="25%">NIM</th>
                                            <th width="20%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                    <!-- <tfoot>
                                        <tr>
                                                        <td colspan="2" align="right">&nbsp;</td>
                                                        <td>
                                        @csrf
                                        <input type="submit" name="save" id="save" class="btn btn-primary" value="Save" />
                                        </td>
                                        </tr>
                                    </tfoot> -->
                                </table>
                            </div>
                        <div class="form-group row">
                            @if($accSeminarkp->seminar_kp == 1)
                            <div class="col-12">
                                <button type="submit" name="save" id="save" class="btn btn-primary">Daftar Seminar KP</button>
                            </div>
                            @else
                            <div class="col-12">
                                <span class="badge badge-danger">Seminar KP Belum Disetujui</span>
                            </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js_after')
<script>jQuery(function(){ Codebase.helpers(['select2','flatpickr']); });</script>
<script>
$(document).ready(function(){

 var count = 1;

 dynamic_field(count);

 function dynamic_field(number)
 {
  html = '<tr>';
        html += '<td><input type="text" name="klaim_nama[]" class="form-control" /></td>';
        html += '<td><input type="text" name="klaim_nim[]" class="form-control" /></td>';
        if(number > 1)
        {
            html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
            $('tbody').append(html);
        }
        else
        {   
            html += '<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td></tr>';
            $('tbody').html(html);
        }
 }
 html = '<tr>';
        html += '<td><input type="text" name="klaim_nama[]" class="form-control" /></td>';
        html += '<td><input type="text" name="klaim_nim[]" class="form-control" /></td>';
        html += '<td></td></tr>';
        $('tbody').append(html);
 html = '<tr>';
        html += '<td><input type="text" name="klaim_nama[]" class="form-control" /></td>';
        html += '<td><input type="text" name="klaim_nim[]" class="form-control" /></td>';
        html += '<td></td></tr>';
        $('tbody').append(html);
 html = '<tr>';
        html += '<td><input type="text" name="klaim_nama[]" class="form-control" /></td>';
        html += '<td><input type="text" name="klaim_nim[]" class="form-control" /></td>';
        html += '<td></td></tr>';
        $('tbody').append(html);
 html = '<tr>';
        html += '<td><input type="text" name="klaim_nama[]" class="form-control" /></td>';
        html += '<td><input type="text" name="klaim_nim[]" class="form-control" /></td>';
        html += '<td></td></tr>';
        $('tbody').append(html);

 $(document).on('click', '#add', function(){
  count++;
  dynamic_field(count);
 });

 $(document).on('click', '.remove', function(){
  count--;
  $(this).closest("tr").remove();
 });

 $('#dynamic_form').on('submit', function(event){
        event.preventDefault();
        $.ajax({
            url:'{{ route("kp.seminar.store") }}',
            method:'post',
            data:$(this).serialize(),
            dataType:'json',
            beforeSend:function(){
                $('#save').attr('disabled','disabled');
            },
            success:function(data)
            {
                if(data.error)
                {
                    var error_html = '';
                    for(var count = 0; count < data.error.length; count++)
                    {
                        error_html += '<p>'+data.error[count]+'</p>';
                    }
                    $('#result').html('<div class="alert alert-danger">'+error_html+'</div>');
                }
                else
                {
                    // dynamic_field(1);
                    window.location.href = "seminar";
                    // $('#result').html('<div class="alert alert-success">'+data.success+'</div>');
                }
                $('#save').attr('disabled', false);
            }
        })
 });

});
</script>
@endsection