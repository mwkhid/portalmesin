<!DOCTYPE html>
<html>
<head>
  <title>Halaman Pengesahan</title>
  <!-- <link rel="stylesheet" id="css-main" href="{{ asset('/css/bootstrap.min.css') }}"> -->
  <style type="text/css">
      .table * {
          border: none;
      }

      .table1 td {
          /* vertical-align: text-top; */
          text-align: center;
          height: 25px;
          /* padding: 2px; */
      }

        .ttd1 td {
            height: 45px;
        }

      body{
        font-size: 14px;
        line-height: 1.3;
        font-family: "Times New Roman", Times, serif;
      }

      @page {
        /* header: page-header; */
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
            </td>
        </tr>               
    </table>
</htmlpageheader>
<htmlpagefooter name="page-footer">
  <p align="center">iv</p>
</htmlpagefooter>
<div class="container">
    <div class="row">
       <div class="col">
            <p style="text-align: center; font-size: 14px; margin-bottom:0; padding-bottom:0; line-height: 1.5;">
            <strong>HALAMAN PENGESAHAN TIM PEMBIMBING DAN TIM PENGUJI</strong></p>
            <p style="text-align: center; font-size: 14px; margin-top:0; padding-top:0; text-transform: uppercase; line-height: 1.5;">
            <strong>{{$ta->judul}}</strong></p>
            <p align="center" style="font-size: 14px;"><strong>Disusun Oleh</strong></p>
            <p align="center" style="font-size: 14px; text-transform:uppercase;"><strong><u>{{$data->nama_mhs}}</u></strong></p>
            <p align="center" style="font-size: 14px;"><strong>NIM {{$data->nim}}</strong></p>
            <table class="table1" style="width: 100%">    
                <tr>
                    <td style="width: 50%;"><strong><div>Pembimbing 1<br></div>
                    @if(($halpengesahan->PB1 ?? '') == 1)
                        @if($pem1->signature_dosen)
                        <img src="{{ asset('file_ttd/'.$pem1->signature_dosen) }}" width="100" height="80" style="postion: relative; z-index: 1; top:10%;"/>
                        @else
                        <br><br><br>
                        @endif
                    @else
                    <br><br><br>
                    @endif
                        <br><u>{{$pem1->nama_dosen}}</u><br>NIP {{$pem1->nip}}</strong></td>
                    <td style="width: 50%;"><strong><div>Pembimbing 2<br></div>
                    @if(($halpengesahan->PB2 ?? '') == 1)
                        @if($pem2->signature_dosen)
                        <img src="{{ asset('file_ttd/'.$pem2->signature_dosen) }}" width="100" height="80" style="postion: relative; z-index: 1; top:10%;"/>
                        @else
                        <br><br><br>
                        @endif
                    @else
                    <br><br><br>
                    @endif
                        <br><u>{{$pem2->nama_dosen}}</u><br>NIP {{$pem2->nip}}</strong></td>
                </tr>
            </table>
            <p align="justify" style="font-size: 14px;">Telah dipertahankan di hadapan Tim Dosen Penguji pada hari {{$dayList[date("D", strtotime($pendadaran->tanggal))]}} tanggal {{date("d", strtotime($pendadaran->tanggal))}} {{$monthList[date("M", strtotime($pendadaran->tanggal))]}} {{date("Y", strtotime($pendadaran->tanggal))}}</p>
            <table width="100%" class="ttd1">
                <tr>
                    <td width="3%" style="vertical-align: text-top;">1.</td>
                    <td width="57%" style="vertical-align: text-top;"><strong><u>{{$pem1->nama_dosen}}</u></strong><br>NIP. 198705062019031009</td>
                    <td width="40%">
                    @if(($halpengesahan->PB1 ?? '') == 1)
                        @if($pem1->signature_dosen)
                        <img src="{{ asset('file_ttd/'.$pem1->signature_dosen) }}" width="80" height="30" style="postion: relative; z-index: 1; top:10%;"/>
                        <br>.................................
                        @else
                        .................................
                        @endif
                    @else
                    .................................
                    @endif
                    </td>
                </tr>
                <tr>
                    <td width="3%" style="vertical-align: text-top;">2.</td>
                    <td width="57%" style="vertical-align: text-top;"><strong><u>{{$pem2->nama_dosen}}</u></strong><br>NIP. 198705062019031009</td>
                    <td width="40%">
                    @if(($halpengesahan->PB2 ?? '') == 1)
                        @if($pem2->signature_dosen)
                        <img src="{{ asset('file_ttd/'.$pem2->signature_dosen) }}" width="80" height="30" style="postion: relative; z-index: 1; top:10%;"/>
                        <br>.................................
                        @else
                        .................................
                        @endif
                    @else
                    .................................
                    @endif
                    </td>
                </tr>
                <tr>
                    <td width="3%" style="vertical-align: text-top;">3.</td>
                    <td width="57%" style="vertical-align: text-top;"><strong><u>{{$uji1->nama_dosen}}</u></strong><br>NIP. 198705062019031009</td>
                    <td width="40%">
                    @if(($halpengesahan->PJ1 ?? '') == 1)
                        @if($uji1->signature_dosen)
                        <img src="{{ asset('file_ttd/'.$uji1->signature_dosen) }}" width="80" height="30" style="postion: relative; z-index: 1; top:10%;"/>
                        <br>.................................
                        @else
                        .................................
                        @endif
                    @else
                    .................................
                    @endif
                    </td>
                </tr>
                <tr>
                    <td width="3%" style="vertical-align: text-top;">4.</td>
                    <td width="57%" style="vertical-align: text-top;"><strong><u>{{$uji2->nama_dosen}}</u></strong><br>NIP. 198705062019031009</td>
                    <td width="40%">
                    @if(($halpengesahan->PJ2 ?? '') == 1)
                        @if($uji2->signature_dosen)
                        <img src="{{ asset('file_ttd/'.$uji2->signature_dosen) }}" width="80" height="30" style="postion: relative; z-index: 1; top:10%;"/>
                        <br>.................................
                        @else
                        .................................
                        @endif
                    @else
                    .................................
                    @endif
                    </td>
                </tr>
            </table>
            <br><br>
            <table style="width: 100%">
                <tr>
                    <td style="width: 50%"><br><br>Kepala Prodi Teknik Elektro<br>
                    @if(($halpengesahan->kaprodi ?? '') == 1)
                        @if($kaprodi->signature_dosen)
                        <img src="{{ asset('file_ttd/'.$kaprodi->signature_dosen) }}" width="100" height="80" style="postion: relative; z-index: 1; top:10%;"/>
                        @else
                        <br><br><br><br>
                        @endif
                    @else
                    <br><br><br><br>
                    @endif
                    <br><strong><u>{{$kaprodi->nama_dosen}}</u></strong><br>NIP. {{$kaprodi->nip}}</td>
                    <td style="width: 50%">Mengetahui,<br><br>Koordinator Tugas Akhir<br>
                    @if(($halpengesahan->koor_ta ?? '') == 1)
                        @if($koorta->signature_dosen)
                        <img src="{{ asset('file_ttd/'.$koorta->signature_dosen) }}" width="100" height="80" style="postion: relative; z-index: 1; top:10%;"/>
                        @else
                        <br><br><br><br>
                        @endif
                    @else
                    <br><br><br><br>
                    @endif
                        <br><strong><u>{{$koorta->nama_dosen}}</u></strong><br>NIP. {{$koorta->nip}}</td>
                </tr>
            </table>
         </div>     
      </div>
  </div>
</body>
</html>