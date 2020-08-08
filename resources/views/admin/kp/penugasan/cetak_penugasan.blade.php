<!DOCTYPE html>
<html>
<head>
	<title>Surat Tugas KP</title>
    <!-- <link rel="stylesheet" id="css-main" href="{{ asset('/css/bootstrap.min.css') }}"> -->
	<style type="text/css">
		table * {
            border: none;
        }
        body{
            font-size: 14px;
        	line-height: 1.5;
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
                    <strong>FAKULTAS TEKNIK</strong></p>
                    <p style="font-style: italic; margin:0; padding:0;">Jalan. Ir. Sutami nomor 36 A Kentingan Surakarta 57126
                    <br /> Telepon. 0271 647069 psw 438, faksimili: 0271 662118</p>
                </td>
            </tr>               
        </table>
    </htmlpageheader>
    <htmlpagefooter name="page-footer">
        <span style="background-color: #000000; color: white;">
            TE-KP-007
        </span>
    </htmlpagefooter>
    <div class="container">
        <div class="row">
            <div class="col">
            <hr style="border: 1px solid; color: #4FA9BA;">
            <table style="width: 100%;">
                <tr>
                    <th style="width: 10%; text-align: justify;">Nomor</th>
                    <td style="width: 3%;">:</td>
                    <td style="width: 60%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/UN27.08/KS/<?php date_default_timezone_set('Asia/Jakarta');echo date("Y"); ?></td>
                    <td style="width: 27%;">{{date('d ', strtotime($data->penugasan))}}
                    {{$monthList[date('M',strtotime($data->penugasan))]}} {{date(' Y',strtotime($data->penugasan))}}</td>
                    <!-- <td style="width: 27%;"><!--?php date_default_timezone_set('Asia/Jakarta');echo date("d ");echo $monthList[date("M")];echo date(" Y"); ?></td> -->
                </tr>
                <tr>
                    <th style="text-align: justify;">Hal</th>
                    <td>:</td>
                    <td>Penugasan Kerja Praktek / Magang</td>
                    <td></td>
                </tr>
            </table>
             <br>
            <p style="max-width: 50%">Yth. <strong>{{ $data->pic}} <br>
             {{ $data->perusahaan_nama}} <br>
             {{ $data->perusahaan_almt}}</strong></p>
            <p style="text-align: justify;" >Dengan hormat,<br><br>
              Berdasarkan surat <strong>No. {{ $data->no_surat}}</strong> 
              tanggal <strong>{{ date("d-m-Y", strtotime($data->tanggal_surat))}}</strong>
              mengenai jawaban permohonan kerja praktek / magang. Bersama ini kami tugaskan mahasiswa Program Studi
              Teknik Elektro sebagai berikut untuk melaksanakan kerja praktek / magang di perusahaan Bapak / Ibu:
            </p>
            <table style="width: 100%;">
                <tr>
                    <td style="width: 5%;"></td>
                    <td style="width: 10%;">Nama</td>
                    <td style="width: 3%;">:</td>
                    <td style="width: 82%;"><strong>{{ $data->nama_mhs}}</strong></td>
                </tr>
                <tr>
                    <td></td>
                    <td>NIM</td>
                    <td>:</td>
                    <td><strong>{{ $data->nim}}</strong></td>
                </tr>
            </table>
            <p style="text-align: justify;">Terhitung,</p>
            <table style="width: 100%;">
                <tr>
                    <td style="width: 5%;"></td>
                    <td style="width: 20%;">mulai tanggal</td>
                    <td style="width: 3%;">:</td>
                    <td style="width: 72%;"><strong>{{ date("d-m-Y", strtotime($data->tgl_mulai_kp))}}</strong></td>
                </tr>
                <tr>
                    <td></td>
                    <td>selesai tanggal</td>
                    <td>:</td>
                    <td><strong>{{ date("d-m-Y", strtotime($data->tgl_selesai_kp))}}</strong></td>
                </tr>
            </table>
            <p>Demikian surat penugasan ini untuk dilaksanakan sebagaimana mestinya.</p><br>
            <table style="width: 100%">
                <tr>
                    <td style="width: 55%;"></td>
                    <td style="width: 45%;"><br>{{$jabatan->nama_jabatan}},<br><br><br><br><br><br>
                    <b>{{$jabatan->nama_dosen}}</b><br><b>NIP. {{$jabatan->nip}}</b></td>
                </tr>
            </table>
            </div>
        </div>
    </div>
</body>
</html>