
@extends('layouts.backend')

@section('title','Seminar KP')

@section('content')
<div class="content">
    <!-- Validation Wizards -->
    <h2 class="content-heading">Seminar Kerja Praktek</h2>
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
                        <a class="nav-link" href="#wizard-validation-classic-step2" data-toggle="tab">2. Seminar KP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#wizard-validation-classic-step3" data-toggle="tab">3. Klaim Seminar KP</a>
                    </li>
                </ul>
                <!-- END Step Tabs -->

                <!-- Form -->
                <form class="js-wizard-validation-classic-form" action="{{route('kp.seminar.store')}}" method="post" id="dynamic_form">
                @csrf
                    <span id="result"></span>
                    <!-- Steps Content -->
                    <div class="block-content block-content-full tab-content" style="min-height: 265px;">
                        <!-- Step 1 -->
                        <div class="tab-pane active" id="wizard-validation-classic-step1" role="tabpanel">
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
                            <div class="form-group">
                                <label for="sks">Jumlah SKS Lulus</label>
                                <input type="text" step="1" min="0" class="form-control" name="sks" value="{{$data->sks}}" readonly>
                                <div class="text-danger">{{ $errors->first('sks')}}</div>
                            </div>
                            <div class="form-group">
                                <label for="IPK">IPK</label>
                                <input type="text" step="0.01" min="0" max="4" class="form-control" name="ipk" value="{{$data->ipk}}" readonly>
                            </div>
                        </div>
                        <!-- END Step 1 -->

                        <!-- Step 2 -->
                        <div class="tab-pane" id="wizard-validation-classic-step2" role="tabpanel">
                            <div class="form-group">
                                <label for="judul seminar">Judul Laporan KP <span class="text-danger">*</span></label>
                                <input required type="text" class="form-control" name="judul_seminar" value="{{old('judul_seminar')}}" placeholder="Masukkan Laporan KP">
                                @if($errors->has('judul_seminar'))
                                    <div class="text-danger">
                                        {{ $errors->first('judul_seminar')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="tanggal seminar">Tanggal Seminar KP <span class="text-danger">*</span></label>
                                <input required type="text" class="js-flatpickr form-control bg-white" id="tanggal_seminar" value="{{old('tanggal_seminar')}}" name="tanggal_seminar" placeholder="Y-m-d">
                                @if($errors->has('tanggal_seminar'))
                                    <div class="text-danger">
                                        {{ $errors->first('tanggal_seminar')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="jam mulai">Jam Mulai Seminar <span class="text-danger">*</span></label>
                                <input required type="text" class="js-flatpickr form-control bg-white" id="jam_mulai" name="jam_mulai" value="{{old('jam_mulai')}}" placeholder="Masukkan Jam Seminar Dimulai" data-enable-time="true" data-no-calendar="true" data-date-format="H:i" data-time_24hr="true">
                                @if($errors->has('jam_mulai'))
                                    <div class="text-danger">
                                        {{ $errors->first('jam_mulai')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="jam selesai">Jam Selesai Seminar <span class="text-danger">*</span></label>
                                <input required type="text" class="js-flatpickr form-control bg-white" id="jam_selesai" name="jam_selesai" value="{{old('jam_selesai')}}" placeholder="Masukkan Jam Seminar Selesai" data-enable-time="true" data-no-calendar="true" data-date-format="H:i" data-time_24hr="true">
                                @if($errors->has('jam_selesai'))
                                    <div class="text-danger">
                                        {{ $errors->first('jam_selesai')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="acceptor">Ruang <span class="text-danger">*</span></label>
                                <select required class="form-control js-select2" style="width: 100%" name="ruang_id" id="ruang_id">
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
                        </div>
                        <!-- END Step 2 -->

                        <!-- Step 3 -->
                        <div class="tab-pane" id="wizard-validation-classic-step3" role="tabpanel">
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
                        </div>
                        <!-- END Step 3 -->
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
                                @if($accSeminarkp->seminar_kp == 1)
                                    <button type="submit" name="save" id="save" class="btn btn-alt-primary d-none" data-wizard="finish">
                                    <i class="fa fa-check mr-5"></i> Daftar Seminar KP</button>
                                @else
                                    <span class="badge badge-danger" data-wizard="finish">Seminar KP Belum Disetujui Pembimbing KP</span>
                                @endif
                                <!-- <button type="submit" class="btn btn-alt-primary d-none" data-wizard="finish">
                                    <i class="fa fa-check mr-5"></i> Submit
                                </button> -->
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
<script src="{{asset('js/plugins/jquery-validation/additional-methods.js')}}"></script>
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