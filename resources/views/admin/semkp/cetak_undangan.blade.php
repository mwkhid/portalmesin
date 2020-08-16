<!DOCTYPE html>
<html>
<head>
    <title>Surat Undangan Seminar KP</title>
    <!-- <link rel="stylesheet" id="css-main" href="{{ asset('/css/bootstrap.min.css') }}"> -->
    <style type="text/css">
        table * {
            border: none;
        }

        body{
            font-size: 14px;
            line-height: 1.3;
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
        TE-KP-009
    </span>
</htmlpagefooter>
<div class="container">
    <div class="row">
        <div class="col">
            <hr style="border: 1px solid; color: #4FA9BA;">
            <table class="lamp" style="width: 100%;">
                <tr>
                    <th style="width: 10%; text-align:left;">Nomor</th>
                    <td style="width: 3%;">:</td>
                    <td style="width: 60%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/UN27.08.06.7/PP/<?php date_default_timezone_set('Asia/Jakarta');echo date("Y"); ?></td>
                    <td style="width: 27%;">{{date('d ', strtotime($data->updated_at))}}
                    {{$monthList[date('M',strtotime($data->updated_at))]}} {{date(' Y',strtotime($data->updated_at))}}</td>
                    <!-- <td style="width: 27%;"><!--?php date_default_timezone_set('Asia/Jakarta');echo date("d "); echo $monthList[date("M")];echo date(" Y"); ?></td> -->
                </tr>
                <tr>
                    <th>Lampiran</th>
                    <td>:</td>
                    <td>Laporan KP</td>
                    <td></td>
                </tr>
                <tr>
                    <th style="text-align:left;">Hal</th>
                    <td>:</td>
                    <td>Seminar Kerja Praktek / Magang</td>
                    <td></td>
                </tr>
            </table>
                <br>
            <p style="max-width: 50%">Kepada Yth. <strong><br>
                &nbsp; {{$data->nama_dosen}}
                </strong></p>
            <p style="text-align: justify;" >Dengan hormat,<br>
                Kami mengharap kehadiran Bapak dalam Seminar Kerja Praktek / Magang atas nama mahasiswa,
            </p>
            <table style="width: 100%;">
                <tr>
                    <td style="width: 5%;"></td>
                    <td style="width: 25%;">Nama</td>
                    <td style="width: 3%;">:</td>
                    <td style="width: 67%;"><strong>{{$data->nama_mhs}}</strong></td>
                </tr>
                <tr>
                    <td></td>
                    <td>NIM</td>
                    <td>:</td>
                    <td><strong>{{$data->nim}}</strong></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Judul Laporan KP</td>
                    <td>:</td>
                    <td><strong>{{$data->judul_seminar}}</strong></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Pembimbing</td>
                    <td>:</td>
                    <td><strong>{{$data->nama_dosen}} / {{$data->nip}}</strong></td>
                </tr>
            </table>
            <br>
            <p style="text-align: justify;">Seminar Kerja Praktek / Magang akan diselenggarakan pada :</p>
            <table style="width: 100%;">
                <tr>
                    <td style="width: 5%;"></td>
                    <td style="width: 25%;">Hari, tanggal</td>
                    <td style="width: 3%;">:</td>
                    <td style="width: 67%;"><strong>{{$dayList[date("D", strtotime($data->tanggal_seminar))]}}, {{date("d-m-Y", strtotime($data->tanggal_seminar))}}</strong></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Tempat</td>
                    <td>:</td>
                    <td><strong>{{$data->nama_ruang}}</strong></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Waktu</td>
                    <td>:</td>
                    <td><strong>{{$data->jam_mulai}} s/d {{$data->jam_selesai}}</strong></td>
                </tr>
            </table>
            <br>
            <p style="text-align: justify;">Demikian undangan ini kami sampaikan, atas perhatian dan kerjasamanya kami ucapkan terima kasih.</p>
            <table style="width: 100%">
                <tr>
                    <td style="width: 60%;"></td>
                    <td style="width: 40%;"><br>{{$kp->nama_jabatan}}<br>
                    @if($kp->signature_dosen)
                    <img src="{{ asset('file_ttd/'.$kp->signature_dosen) }}" width="150" height="100" style="z-index: 1; top:10%; margin-left:15px;"/>
                    @else
                    <br><br><br><br>
                    @endif
                    <br><b>{{$kp->nama_dosen}}</b><br><b>NIP. {{$kp->nip}}</b></td>
                </tr>
            </table>
        </div>
    </div>
</div>
</body>
</html>