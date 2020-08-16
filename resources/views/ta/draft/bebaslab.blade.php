<!DOCTYPE html>
<html>
<head>
  <title>Surat Bebas LAB</title>
  <!-- <link rel="stylesheet" id="css-main" href="{{ asset('/css/bootstrap.min.css') }}"> -->
  <style type="text/css">
        .table * {
            /* height: 30px; */
            border: none;
        }

        .table1 td {
            vertical-align: text-top;
            text-align: left;
            height: 25px;
            /* padding: 2px; */
        }
        .ttd{
            border-collapse: collapse;
        }
        .ttd tr td{
            border: 1px;
            border-style: solid;
        }
        .ttd td {
            /* vertical-align: text-top; */
            text-align: left;
            height: 90px;
        }

        body{
            font-size: 14px;
            line-height: 1.3;
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
                <hr style="border: 1px solid; color: #4FA9BA; margin:0; padding:0">
            </td>
        </tr>               
    </table>
</htmlpageheader>
<htmlpagefooter name="page-footer">
  <span style="background-color: #000000; color: white;">
      TE-KP-006
  </span>
</htmlpagefooter>
<div class="container" style="margin-left: 25px;">
    <div class="row">
       <div class="col">
            <p style="text-align: center; font-size: 18px;"><strong><u>SURAT KETERANGAN BEBAS LABORATORIUM</u></strong></p>
            <p style="text-align:justify;font-size:14;">Menerangkan bahwa mahasiswa di bawah ini :</p>
            <table class="table1" style="width: 100%">    
                <tr>
                    <td style="width: 23%;">Nama</td>
                    <td style="width: 3%;">:</td>
                    <td style="width: 74%;">{{$data->nama_mhs}}</td>
                </tr>
                <tr>
                    <td>NIM</td>
                    <td>:</td>
                    <td>{{$data->nim}}</td>
                </tr>
                <tr>
                    <td>Program Studi</td>
                    <td>:</td>
                    <td>S1 Teknik Elektro</td>
                </tr>
                <tr>
                    <td>Fakultas Teknik</td>
                    <td>:</td>
                    <td>Teknik</td>
                </tr>
            </table>
            <p style="text-align:justify;font-size:14px;margin-top:0;padding-top:0;">Telah Menyelesaikan administrasi laboratorium sebagaimana yang telah disyaratkan oleh Fakultas Teknik Universitas Sebelas Maret :</p>
            <table class="ttd" width="100%">
                <tr>
                    <td width="5%" style="height: 25px;" align="center">No</td>
                    <td width="15%" style="height: 25px;" align="center">Nama Laboratorium</td>
                    <td width="25%" style="height: 25px;" align="center">Laboran</td>
                    <td width="40%" style="height: 25px;" align="center">Tanda Tangan Ketua Laboratorium</td>
                    <td width="15%" style="height: 25px;" align="center">Tanggal</td>
                </tr>
                <tr>
                    <td style="vertical-align: text-top;">1</td>
                    <td style="vertical-align: text-top;">Konversi Energi dan Sistem Tenaga Listrik</td>
                    <td></td>
                    <td style="vertical-align:bottom">
                        @if(($bebaslab->kalab_sel ?? '') == 1)
                            <img src="{{ asset('file_ttd/'.$kalabsel->signature_dosen) }}" width="90" height="40" style="postion: relative; z-index: 1;padding-left:10%;"/><br>
                        @else
                        @endif
                        {{$kalabsel->nama_dosen}}<br>{{$kalabsel->nip}}</td>
                    <td align="center">@if($bebaslab->tgl_kalab_sel ?? ''){{date("d-m-Y",strtotime($bebaslab->tgl_kalab_sel ?? ''))}}@endif</td>
                </tr>
                <tr>
                    <td style="vertical-align: text-top;">2</td>
                    <td style="vertical-align: text-top;">Elektronika</td>
                    <td style="vertical-align:bottom">
                        @if(($bebaslab->laboran_elektronika ?? '') == 1)
                            {{date("d-m-Y",strtotime($bebaslab->tgl_laboran_elektronika ?? ''))}}<br>
                            <img src="{{ asset('file_ttd/'.$laboranele->signature_dosen) }}" width="90" height="40" style="postion: relative; z-index: 1;padding-left:5%;"/><br>
                        @else
                        @endif
                        {{$laboranele->nama_dosen}}<br>{{$laboranele->nip}}</td>
                    <td style="vertical-align:bottom">
                        @if(($bebaslab->kalab_elektronika ?? '') == 1)
                            <img src="{{ asset('file_ttd/'.$kalabele->signature_dosen) }}" width="90" height="40" style="postion: relative; z-index: 1;padding-left:10%;"/><br>
                        @else
                        @endif
                        {{$kalabele->nama_dosen}}<br>{{$kalabele->nip}}</td>
                    <td align="center">@if($bebaslab->tgl_kalab_elektronika ?? ''){{date("d-m-Y",strtotime($bebaslab->tgl_kalab_elektronika ?? ''))}}@endif</td>
                </tr>
                <tr>
                    <td style="vertical-align: text-top;">3</td>
                    <td style="vertical-align: text-top;">Telekomunikasi dan Pengolahan SInyal</td>
                    <td></td>
                    <td style="vertical-align:bottom">
                        @if(($bebaslab->kalab_tele ?? '') == 1)
                            <img src="{{ asset('file_ttd/'.$kalabtele->signature_dosen) }}" width="90" height="40" style="postion: relative; z-index: 1;padding-left:10%;"/><br>
                        @else
                        @endif
                        {{$kalabtele->nama_dosen}}<br>{{$kalabtele->nip}}</td>
                    <td align="center">@if($bebaslab->tgl_kalab_tele ?? ''){{date("d-m-Y",strtotime($bebaslab->tgl_kalab_tele ?? ''))}}@endif</td>
                </tr>
                <tr>
                    <td style="vertical-align: text-top;">4</td>
                    <td style="vertical-align: text-top;">Instrumentasi Kendali</td>
                    <td></td>
                    <td style="vertical-align:bottom">
                        @if(($bebaslab->kalab_ik ?? '') == 1)
                            <img src="{{ asset('file_ttd/'.$kalabik->signature_dosen) }}" width="90" height="40" style="postion: relative; z-index: 1;padding-left:10%;"/><br>
                        @else
                        @endif
                        {{$kalabik->nama_dosen}}<br>{{$kalabik->nip}}</td>
                    <td align="center">@if($bebaslab->tgl_kalab_ik ?? ''){{date("d-m-Y",strtotime($bebaslab->tgl_kalab_ik ?? ''))}}@endif</td>
                </tr>
                <tr>
                    <td style="vertical-align: text-top;">5</td>
                    <td style="vertical-align: text-top;">Komputer dan Jaringan</td>
                    <td></td>
                    <td style="vertical-align:bottom">
                        @if(($bebaslab->kalab_komputer ?? '') == 1)
                            <img src="{{ asset('file_ttd/'.$kalabkj->signature_dosen) }}" width="90" height="40" style="postion: relative; z-index: 1;padding-left:10%;"/><br>
                        @else
                        @endif
                        {{$kalabkj->nama_dosen}}<br>{{$kalabkj->nip}}</td>
                    <td align="center">@if($bebaslab->tgl_kalab_komputer ?? ''){{date("d-m-Y",strtotime($bebaslab->tgl_kalab_komputer ?? ''))}}@endif</td>
                </tr>
            </table>
            <br><br>
            <table style="width: 100%">
                <tr>
                    <td style="width: 50%"></td>
                    <td style="width: 50%">Surakarta, @if($bebaslab->tgl_pembimbing_akademik ?? ''){{date("d ",strtotime($bebaslab->tgl_pembimbing_akademik ?? ''))}}
                    {{$monthList[date("M",strtotime(($bebaslab->tgl_pembimbing_akademik ?? '')))]}}
                    {{date(" Y",strtotime($bebaslab->tgl_pembimbing_akademik ?? ''))}} @endif
                    <br>Pembimbing Akademik<br>
                    @if(($bebaslab->pembimbing_akademik ?? '') == 1)
                        @if($pembimbing->signature_dosen)
                        <img src="{{ asset('file_ttd/'.$pembimbing->signature_dosen) }}" width="100" height="80" style="postion: relative; z-index: 1; top:10%;"/>
                        @else
                        <br><br><br><br>
                        @endif
                    @else
                    <br><br><br><br>
                    @endif
                    <br>{{$pembimbing->nama_dosen}}<br>NIP. {{$pembimbing->nip}}</td>
                </tr>
            </table>
         </div>     
      </div>
  </div>
</body>
</html>