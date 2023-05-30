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
                <strong>PROGRAM STUDI TEKNIK MESIN</strong></p>
                <p style="font-style: italic; margin:0; padding:0;">Jalan. Ir. Sutami nomor 36 A Kentingan Surakarta 57126
                <br /> Telepon. 0271 647069, faksimili: 0271 662118</p>
                <hr style="border: 1px solid; color: #4FA9BA; margin:0; padding:0">
            </td>
        </tr>               
    </table>
</htmlpageheader>
<htmlpagefooter name="page-footer">
  <span style="background-color: #000000; color: white;">
      <!-- TM-KP-006 -->
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
                    <td>S1 Teknik Mesin</td>
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
                    <td style="vertical-align: text-top;">Getaran dan Perawatan Mesin</td>
                    <td style="vertical-align:bottom">
                        @if(($bebaslab->laboran_getaran ?? '') == 1)
                            {{date("d-m-Y",strtotime($bebaslab->tgl_laboran_getaran ?? ''))}}<br>
                            <img src="{{ asset('file_ttd/'.$laborangetaran->signature_dosen) }}" width="90" height="40" style="postion: relative; z-index: 1;padding-left:5%;"/><br>
                        @else
                        @endif
                        {{$laborangetaran->nama_dosen}}<br>{{$laborangetaran->nip}}</td>
                    <td style="vertical-align:bottom">
                        @if(($bebaslab->kalab_getaran ?? '') == 1)
                            <img src="{{ asset('file_ttd/'.$kalabgetaran->signature_dosen) }}" width="90" height="40" style="postion: relative; z-index: 1;padding-left:10%;"/><br>
                        @else
                        @endif
                        {{$kalabgetaran->nama_dosen}}<br>{{$kalabgetaran->nip}}</td>
                    <td align="center">@if($bebaslab->tgl_kalab_getaran ?? ''){{date("d-m-Y",strtotime($bebaslab->tgl_kalab_getaran ?? ''))}}@endif</td>
                </tr>

                <tr>
                    <td style="vertical-align: text-top;">2</td>
                    <td style="vertical-align: text-top;">Perancangan dan Komputasi</td>
                    <td></td>
                    <td style="vertical-align:bottom">
                        @if(($bebaslab->kalab_perancangan ?? '') == 1)
                            <img src="{{ asset('file_ttd/'.$kalabperancangan->signature_dosen) }}" width="90" height="40" style="postion: relative; z-index: 1;padding-left:10%;"/><br>
                        @else
                        @endif
                        {{$kalabperancangan->nama_dosen}}<br>{{$kalabperancangan->nip}}</td>
                    <td align="center">@if($bebaslab->tgl_kalab_perancangan ?? ''){{date("d-m-Y",strtotime($bebaslab->tgl_kalab_perancangan ?? ''))}}@endif</td>
                </tr>

                <tr>
                    <td style="vertical-align: text-top;">3</td>
                    <td style="vertical-align: text-top;">Mekanika Fluida</td>
                    <td style="vertical-align:bottom">
                        @if(($bebaslab->laboran_mekanika ?? '') == 1)
                            {{date("d-m-Y",strtotime($bebaslab->tgl_laboran_mekanika ?? ''))}}<br>
                            <img src="{{ asset('file_ttd/'.$laboranmekanika->signature_dosen) }}" width="90" height="40" style="postion: relative; z-index: 1;padding-left:5%;"/><br>
                        @else
                        @endif
                        {{$laboranmekanika->nama_dosen}}<br>{{$laboranmekanika->nip}}</td>
                    <td style="vertical-align:bottom">
                        @if(($bebaslab->kalab_mekanika ?? '') == 1)
                            <img src="{{ asset('file_ttd/'.$kalabmekanika->signature_dosen) }}" width="90" height="40" style="postion: relative; z-index: 1;padding-left:10%;"/><br>
                        @else
                        @endif
                        {{$kalabmekanika->nama_dosen}}<br>{{$kalabmekanika->nip}}</td>
                    <td align="center">@if($bebaslab->tgl_kalab_mekanika ?? ''){{date("d-m-Y",strtotime($bebaslab->tgl_kalab_mekanika ?? ''))}}@endif</td>
                </tr>

                <tr>
                    <td style="vertical-align: text-top;">4</td>
                    <td style="vertical-align: text-top;">Motor Bakar & Otomotif</td>
                    <td style="vertical-align:bottom">
                        @if(($bebaslab->laboran_motor ?? '') == 1)
                            {{date("d-m-Y",strtotime($bebaslab->tgl_laboran_motor ?? ''))}}<br>
                            <img src="{{ asset('file_ttd/'.$laboranmotor->signature_dosen) }}" width="90" height="40" style="postion: relative; z-index: 1;padding-left:5%;"/><br>
                        @else
                        @endif
                        {{$laboranmotor->nama_dosen}}<br>{{$laboranmotor->nip}}</td>
                    <td style="vertical-align:bottom">
                        @if(($bebaslab->kalab_motor ?? '') == 1)
                            <img src="{{ asset('file_ttd/'.$kalabmotor->signature_dosen) }}" width="90" height="40" style="postion: relative; z-index: 1;padding-left:10%;"/><br>
                        @else
                        @endif
                        {{$kalabmotor->nama_dosen}}<br>{{$kalabmotor->nip}}</td>
                    <td align="center">@if($bebaslab->tgl_kalab_motor ?? ''){{date("d-m-Y",strtotime($bebaslab->tgl_kalab_motor ?? ''))}}@endif</td>
                </tr>
               
                <tr>
                    <td style="vertical-align: text-top;">5</td>
                    <td style="vertical-align: text-top;">Perpindahan Panas & Thermodinamika</td>
                    <td style="vertical-align:bottom">
                        @if(($bebaslab->laboran_panas ?? '') == 1)
                            {{date("d-m-Y",strtotime($bebaslab->tgl_laboran_panas ?? ''))}}<br>
                            <img src="{{ asset('file_ttd/'.$laboranpanas->signature_dosen) }}" width="90" height="40" style="postion: relative; z-index: 1;padding-left:5%;"/><br>
                        @else
                        @endif
                        {{$laboranpanas->nama_dosen}}<br>{{$laboranpanas->nip}}</td>
                    <td style="vertical-align:bottom">
                        @if(($bebaslab->kalab_panas ?? '') == 1)
                            <img src="{{ asset('file_ttd/'.$kalabpanas->signature_dosen) }}" width="90" height="40" style="postion: relative; z-index: 1;padding-left:10%;"/><br>
                        @else
                        @endif
                        {{$kalabpanas->nama_dosen}}<br>{{$kalabpanas->nip}}</td>
                    <td align="center">@if($bebaslab->tgl_kalab_panas ?? ''){{date("d-m-Y",strtotime($bebaslab->tgl_kalab_panas ?? ''))}}@endif</td>
                </tr>

                <tr>
                    <td style="vertical-align: text-top;">6</td>
                    <td style="vertical-align: text-top;">Proses Produksi</td>
                    <td style="vertical-align:bottom">
                        @if(($bebaslab->laboran_produksi ?? '') == 1)
                            {{date("d-m-Y",strtotime($bebaslab->tgl_laboran_produksi ?? ''))}}<br>
                            <img src="{{ asset('file_ttd/'.$laboranproduksi->signature_dosen) }}" width="90" height="40" style="postion: relative; z-index: 1;padding-left:5%;"/><br>
                        @else
                        @endif
                        {{$laboranproduksi->nama_dosen}}<br>{{$laboranproduksi->nip}}</td>
                    <td style="vertical-align:bottom">
                        @if(($bebaslab->kalab_produksi ?? '') == 1)
                            <img src="{{ asset('file_ttd/'.$kalabproduksi->signature_dosen) }}" width="90" height="40" style="postion: relative; z-index: 1;padding-left:10%;"/><br>
                        @else
                        @endif
                        {{$kalabproduksi->nama_dosen}}<br>{{$kalabproduksi->nip}}</td>
                    <td align="center">@if($bebaslab->tgl_kalab_produksi ?? ''){{date("d-m-Y",strtotime($bebaslab->tgl_kalab_produksi ?? ''))}}@endif</td>
                </tr>

                <tr>
                    <td style="vertical-align: text-top;">7</td>
                    <td style="vertical-align: text-top;">Otomasi & Robotika</td>
                    <td style="vertical-align:bottom">
                        @if(($bebaslab->laboran_otomasi ?? '') == 1)
                            {{date("d-m-Y",strtotime($bebaslab->tgl_laboran_otomasi ?? ''))}}<br>
                            <img src="{{ asset('file_ttd/'.$laboranotomasi->signature_dosen) }}" width="90" height="40" style="postion: relative; z-index: 1;padding-left:5%;"/><br>
                        @else
                        @endif
                        {{$laboranotomasi->nama_dosen}}<br>{{$laboranotomasi->nip}}</td>
                    <td style="vertical-align:bottom">
                        @if(($bebaslab->kalab_otomasi ?? '') == 1)
                            <img src="{{ asset('file_ttd/'.$kalabotomasi->signature_dosen) }}" width="90" height="40" style="postion: relative; z-index: 1;padding-left:10%;"/><br>
                        @else
                        @endif
                        {{$kalabotomasi->nama_dosen}}<br>{{$kalabotomasi->nip}}</td>
                    <td align="center">@if($bebaslab->tgl_kalab_otomasi ?? ''){{date("d-m-Y",strtotime($bebaslab->tgl_kalab_otomasi ?? ''))}}@endif</td>
                </tr>

                <tr>
                    <td style="vertical-align: text-top;">8</td>
                    <td style="vertical-align: text-top;">Material Teknik</td>
                    <td style="vertical-align:bottom">
                        @if(($bebaslab->laboran_material ?? '') == 1)
                            {{date("d-m-Y",strtotime($bebaslab->tgl_laboran_material ?? ''))}}<br>
                            <img src="{{ asset('file_ttd/'.$laboranmaterial->signature_dosen) }}" width="90" height="40" style="postion: relative; z-index: 1;padding-left:5%;"/><br>
                        @else
                        @endif
                        {{$laboranmaterial->nama_dosen}}<br>{{$laboranmaterial->nip}}</td>
                    <td style="vertical-align:bottom">
                        @if(($bebaslab->kalab_material ?? '') == 1)
                            <img src="{{ asset('file_ttd/'.$kalabmaterial->signature_dosen) }}" width="90" height="40" style="postion: relative; z-index: 1;padding-left:10%;"/><br>
                        @else
                        @endif
                        {{$kalabmaterial->nama_dosen}}<br>{{$kalabmaterial->nip}}</td>
                    <td align="center">@if($bebaslab->tgl_kalab_material ?? ''){{date("d-m-Y",strtotime($bebaslab->tgl_kalab_material ?? ''))}}@endif</td>
                </tr>

                <tr>
                    <td style="vertical-align: text-top;">9</td>
                    <td style="vertical-align: text-top;">Teknik Pengecoran dan Pengelasan</td>
                    <td></td>
                    <td style="vertical-align:bottom">
                        @if(($bebaslab->kalab_pengecoran ?? '') == 1)
                            <img src="{{ asset('file_ttd/'.$kalabpengecoran->signature_dosen) }}" width="90" height="40" style="postion: relative; z-index: 1;padding-left:10%;"/><br>
                        @else
                        @endif
                        {{$kalabpengecoran->nama_dosen}}<br>{{$kalabpengecoran->nip}}</td>
                    <td align="center">@if($bebaslab->tgl_kalab_pengecoran ?? ''){{date("d-m-Y",strtotime($bebaslab->tgl_kalab_pengecoran ?? ''))}}@endif</td>
                </tr>

                <tr>
                    <td style="vertical-align: text-top;">10</td>
                    <td style="vertical-align: text-top;">Nano Bioenergi</td>
                    <td></td>
                    <td style="vertical-align:bottom">
                        @if(($bebaslab->kalab_nano ?? '') == 1)
                            <img src="{{ asset('file_ttd/'.$kalabnano->signature_dosen) }}" width="90" height="40" style="postion: relative; z-index: 1;padding-left:10%;"/><br>
                        @else
                        @endif
                        {{$kalabnano>nama_dosen}}<br>{{$kalabnano->nip}}</td>
                    <td align="center">@if($bebaslab->tgl_kalab_nano ?? ''){{date("d-m-Y",strtotime($bebaslab->tgl_kalab_nano ?? ''))}}@endif</td>
                </tr>

                <tr>
                    <td style="vertical-align: text-top;">11</td>
                    <td style="vertical-align: text-top;">Energi Surya</td>
                    <td style="vertical-align:bottom">
                        @if(($bebaslab->laboran_energi ?? '') == 1)
                            {{date("d-m-Y",strtotime($bebaslab->tgl_laboran_energi ?? ''))}}<br>
                            <img src="{{ asset('file_ttd/'.$laboranenergi->signature_dosen) }}" width="90" height="40" style="postion: relative; z-index: 1;padding-left:5%;"/><br>
                        @else
                        @endif
                        {{$laboranenergi->nama_dosen}}<br>{{$laboranenergi->nip}}</td>
                    <td style="vertical-align:bottom">
                        @if(($bebaslab->kalab_energi ?? '') == 1)
                            <img src="{{ asset('file_ttd/'.$kalabenergi->signature_dosen) }}" width="90" height="40" style="postion: relative; z-index: 1;padding-left:10%;"/><br>
                        @else
                        @endif
                        {{$kalabenergi->nama_dosen}}<br>{{$kalabenergi->nip}}</td>
                    <td align="center">@if($bebaslab->tgl_kalab_energi ?? ''){{date("d-m-Y",strtotime($bebaslab->tgl_kalab_energi ?? ''))}}@endif</td>
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