<!DOCTYPE html>
<html>
<head>
  <title>Surat Tugas Akhir</title>
  <style type="text/css">
      table.table * {
          border: none;
          line-height: 1.2;
      }

      .table td {
          height: 25px;
          text-align: center;
      }

      table.table1 * {
          border: none;
      }

      .table1 td {
          font-size: 14px;
          vertical-align: text-top;
          text-align: left;
          padding: 2px;
      }

      body{
        font-size: 15px;
        line-height: 1.2;
        font-family: "Times New Roman", Times, serif;
      }

      @page {
            header: page-header;
            /* footer: page-footer;  */
      }

  </style>
</head>
<body>
<htmlpageheader name="page-header">
    <table style="width: 100%" class="table">
        <tr>
            <td style="width: 20%; text-align: left;">
                <img src="{{ asset('media/logo-uns-biru.png') }}" style="height: 100px;"/>
            </td>
            <td style="width: 80%; color: #4FA9BA;" align="center">
                <p style="font-size: 16px; margin:0; padding:0;"> KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN<br />
                UNIVERSITAS SEBELAS MARET<br />
                FAKULTAS TEKNIK<br />
                <strong>PROGRAM STUDI TEKNIK ELEKTRO</strong></p>
                <p style="font-style: italic; ">Jalan. Ir. Sutami nomor 36 A Kentingan Surakarta 57126
                <br /> Telepon. 0271 647069 psw 438, faksimili: 0271 662118</p>
            </td>
        </tr>               
    </table>
    <hr style="border: 1px solid; color: #4FA9BA; ">
</htmlpageheader>
<div class="container">
    <div class="row">
       <div class="col">
            <p style="text-align: center; font-size: 18px; margin:2px; padding-bottom:2px;"><strong>SURAT TUGAS</strong></p>
            <p style="text-align: center; font-size: 15px;"><strong>Nomor : {{sprintf("%03d", $data->id)}}/TA/TE/{{date("Y")}}</strong></p>
            <p>Kepala Program Studi Teknik Elektro Fakultas Teknik Universitas Sebelas Maret memberikan tugas kepada:</p>
            <table class="table1" style="width: 100%">    
                <tr>
                    <td style="width: 5%;"></td>
                    <td style="width: 40%;">Nama Mahasiswa</td>
                    <td style="width: 3%;">:</td>
                    <td style="width: 52%;"><strong>{{$data->nama_mhs}}</strong></td>
                </tr>
                <tr>
                    <td></td>
                    <td>NIM</td>
                    <td>:</td>
                    <td><strong>{{$data->nim}}</strong></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Bidang peminatan</td>
                    <td>:</td>
                    <td><strong>{{$data->nama_peminatan}}</strong></td>
                </tr>
                @foreach($pembimbing as $index=>$pembimbings)
                <tr>
                        <td></td>
                        <td>@if($index == 0)Pembimbing Utama
                        @else
                        Pembimbing Pendamping
                        @endif
                        </td>
                        <td>:</td>
                        <td><strong>{{$pembimbings->nama_dosen}}</strong></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><strong>NIP. {{$pembimbings->nip}}</strong></td>
                </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td>Mata kuliah pendukung</td>
                    <td>:</td>
                    <td><strong>
                    @foreach ($matkul as $key=>$row)
                        {{ $key+1 }}. {{$row->nama_matkul}}<br>
                    @endforeach
                    </strong></td>
                </tr>
            </table>
            <br>
            <p style="text-align: justify;">untuk mengerjakan dan menyelesaikan Tugas Akhir dengan judul : </p>
            <p style="text-align: center;"><b>{{$data->judul}}</b></p>
            <p style="text-align: justify;">Surat tugas ini dibuat untuk dilaksankan dengan sebaik-baiknya.</p>
            <br>
            <table style="width: 100%; padding-left:20px;">
                <tr>
                    <td style="width: 55%;"></td>
                    <td style="width: 45%;">
                        <div style="position: relative;">
                            <div style="z-index:-1;">Surakarta, {{date("d ", strtotime($data->tgl_setuju))}}
                            {{$monthList[date("M", strtotime($data->tgl_setuju))]}}{{date(" Y", strtotime($data->tgl_setuju))}}
                            <br>{{$kaprodi->nama_jabatan}}</div>
                            @if($kaprodi->signature_dosen)
                            <img src="{{ asset('file_ttd/'.$kaprodi->signature_dosen) }}" width="100" height="100" style="z-index: 1; top:10%;"/>
                            @else
                            <br><br><br>
                            @endif
                            <div>{{$kaprodi->nama_dosen}} <br>NIP. {{$kaprodi->nip}}</div>
                        </div>
                    </td>
                </tr>
            </table>
            <br>
            <br>
            <br>
            <!-- <p style="margin:0; padding:0;">Tembusan:</p> -->
            <p style="margin:0; padding:0;">Tembusan:
              <ol type="1">
                <li>Mahasiswa ybs.</li>
                <li>Dosen Pembimbing TA</li>
                <li>Koordinator TA</li>
                <li>Arsip</li>
              </ol>
            </p>
         </div>     
      </div>
  </div>
</body>
</html>