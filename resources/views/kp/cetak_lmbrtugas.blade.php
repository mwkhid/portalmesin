<!DOCTYPE html>
<html>
<head>
  <title>Lembar Tugas KP</title>
  <!-- <link rel="stylesheet" id="css-main" href="{{ asset('/css/bootstrap.min.css') }}"> -->
  <style type="text/css">
      .table * {
          border: none;
      }

      .table td {
          height: 25px;
      }

      .table1 td {
          vertical-align: text-top;
          text-align: left;
          padding: 2px;
      }

      table.table2 {
        border-collapse: collapse;
        width: 100%;
      }

      .table2 th {
        border: 1px solid black;
      }

      .table3 td {
          text-align: left;
      }

      body{
        font-size: 14px;
        line-height: 1.2;
        font-family: "Times New Roman", Times, serif;
      }

      @page {
        header: page-header;
        footer: page-footer; 
      }
  </style>
</head>
<body>
<htmlpageheader name="page-header">
    <table width="100%">
        <tr>
            <td style="width: 20%; text-align: center;">
                <img src="{{ asset('media/logo-uns-biru.png') }}" style="height: 100px;"/>
            </td>
            <td style="width: 80%; color: #4FA9BA;" align="center">
                <p style="font-size: 16px; margin:0; padding:0;"> KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN<br />
                UNIVERSITAS SEBELAS MARET<br />
                FAKULTAS TEKNIK<br />
                <strong>PROGRAM STUDI TEKNIK ELEKTRO</strong></p>
                <p style="font-style: italic; margin:0; padding:0;">Jalan. Ir. Sutami nomor 36 A Kentingan Surakarta 57126
                <br /> Telepon. 0271 647069 psw 438, faksimili: 0271 662118</p>
            </td>
        </tr>               
    </table>
</htmlpageheader>
<htmlpagefooter name="page-footer">
    <span style="background-color: #000000; color: white;">
        TE-KP-005
    </span>
</htmlpagefooter>
<div class="container">
    <div class="row">
       <div class="col">
        <hr style="border: 1px solid; color: #4FA9BA; margin:0; padding:0">
              <p style="text-align: center; font-size: 18px;"><strong>LEMBAR TUGAS KERJA PRAKTEK</strong></p>
              <table class="table1" style="width: 100%">    
                  <tr>
                      <td style="width: 40%;">Nama Mahasiswa</td>
                      <td style="width: 3%;">:</td>
                      <td style="width: 57%;"><strong>{{$data->nama_mhs}}</strong></td>
                  </tr>
                  <tr>
                      <td>NIM</td>
                      <td>:</td>
                      <td><strong>{{$data->nim}}</strong></td>
                  </tr>
                  <tr>
                      <td>Dosen Pembimbing</td>
                      <td>:</td>
                      <td><strong>{{$data->nama_dosen}}</strong></td>
                  </tr>
                  <tr>
                      <td>NIP</td>
                      <td>:</td>
                      <td><strong>{{$data->nip}}</strong></td>
                  </tr>
                  <tr>
                      <td>Tempat Kerja Praktek (KP)</td>
                      <td>:</td>
                      <td><strong>{{$data->perusahaan_nama}}</strong></td>
                  </tr>
                  <tr>
                      <td>Alamat Tempat KP</td>
                      <td>:</td>
                      <td><strong>{{$data->perusahaan_almt}}</strong></td>
                  </tr>
                  <tr>
                      <td>Tanggal Kerja Praktek (KP)</td>
                      <td>:</td>
                      <td><strong>{{$data->tgl_mulai_kp}} sd. {{$data->tgl_selesai_kp}} </strong></td>
                  </tr>
              </table>
              <br>
              <p><strong>Deskripsi Tugas Mahasiswa</strong></p>
                  @if($data->penugasan_kp)
                    <textarea style="background-color:white;" cols="100" rows="18">{{$data->penugasan_kp}}</textarea>
                  @else
                    <table class="table2">
                        <tr>
                        <th style="width: 100%;">
                        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                        </th>
                        </tr>
                    </table>
                  @endif
              <br><br>
              <table style="width: 100%" class="table3">
                <tr>
                    <td style="width: 50%;"></td>
                    <td style="width: 50%;">Surakarta, {{date('d', strtotime($data->tgl_penugasan_kp))}} {{$monthList[date('M',strtotime($data->tgl_penugasan_kp))]}} {{date('Y',strtotime($data->tgl_penugasan_kp))}}<br>Dosen Pembimbing Kerja Praktek<br>
                    @if($data->signature_dosen)
                    <img src="{{ asset('file_ttd/'.$data->signature_dosen) }}" width="150" height="100" style="z-index: 1; top:10%; margin-left:15px;"/>
                    @else
                    <br><br><br><br>
                    @endif
                    <br><b>{{$data->nama_dosen}}</b><br>NIP. <b>{{$data->nip}}</b></td>
                </tr>
              </table>      
         </div>     
      </div>
  </div>
</body>
</html>