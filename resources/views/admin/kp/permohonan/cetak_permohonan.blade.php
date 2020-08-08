<!DOCTYPE html>
<html>
<head>
	<title>Surat Permohonan KP</title>
	<style type="text/css">
		table * {
            border: none;
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
                    <strong>FAKULTAS TEKNIK</strong></p>
                    <p style="font-style: italic; margin:0; padding:0;">Jalan. Ir. Sutami nomor 36 A Kentingan Surakarta 57126
                    <br /> Telepon. 0271 647069 psw 438, faksimili: 0271 662118</p>
                </td>
            </tr>               
        </table>
    </htmlpageheader>
    <htmlpagefooter name="page-footer">
        <span style="background-color: #000000; color: white; padding:100px;">
            TE-KP-004
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
                    <td style="width: 27%;">{{date('d ', strtotime($data->permohonan))}}
                    {{$monthList[date('M',strtotime($data->permohonan))]}} {{date(' Y',strtotime($data->permohonan))}}</td>
                </tr>
                <tr>
                    <th>Lampiran</th>
                    <td>:</td>
                    <td>Proposal KP</td>
                    <td></td>
                </tr>
                <tr>
                    <th style=" text-align: justify;">Hal</th>
                    <td>:</td>
                    <td>Permohonan Kerja Praktek / Magang</td>
                    <td></td>
                </tr>
            </table>
             <br>
            <p style="max-width: 50%">Yth. <strong>{{ $data->pic}} <br>
             {{ $data->perusahaan_nama}} <br>
             {{ $data->perusahaan_almt}}</strong></p>
            <p style="text-align: justify;" >Dengan hormat,<br><br>
              Dengan surat ini kami bermaksud mengajukan permohonan kepada Bapak/Ibu untuk menerima 
              mahasiswa kami kerja praktek / magang pada perusahaan yang Bapak/Ibu pimpin. 
              Adapun nama mahasiswa tersebut adalah sebagai berikut:
            </p>
            <table style="width: 100%;">
                <tr>
                    <td style="width: 5%;"></td>
                    <td style="width: 10%;">NAMA</td>
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
            <br>
            <p style="text-align: justify;">Untuk pelaksanaan kerja praktek / magang 
            tersebut di atas dimohonkan  mulai tanggal 
            <b>{{ date("d-m-Y", strtotime($data->rencana_mulai_kp))}}</b> sampai 
            <b>{{ date("d-m-Y", strtotime($data->rencana_selesai_kp))}}</b> 
            atau dalam waktu yang lain sesuai dengan kebijakan perusahaan Bapak/Ibu.</p>
            <p>Untuk surat balasan mohon dialamatkan kepada: </p>
            <p style="text-align: center;"><b> Kepala Program Studi Teknik Elektro<br>
            Fakultas Teknik Universitas Sebelas Maret<br>
            Jl. Ir. Sutami 36A Surakarta 57126 Telp. 0271-647069</b></p>
            <p>Atas perhatian dan kerjasamanya kami ucapkan terima kasih.</p>
            <br>
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