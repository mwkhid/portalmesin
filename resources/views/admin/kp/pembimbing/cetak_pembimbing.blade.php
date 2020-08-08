<!DOCTYPE html>
<html>
<head>
	<title>Surat Permohonan Pembimbing</title>
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
                    FAKULTAS TEKNIK<br />
                    <strong>PROGRAM STUDI TEKNIK ELEKTRO</strong></p>
                    <p style="font-style: italic; margin:0; padding:0;">Jalan. Ir. Sutami nomor 36 A Kentingan Surakarta 57126
                    <br /> Telepon. 0271 647069 psw 438, faksimili: 0271 662118</p>
                </td>
            </tr>               
        </table>
    </htmlpageheader>
    <htmlpagefooter name="page-footer">
        <span style="background-color: #000000; color: white; padding:100px;">
            TE-KP-003
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
                    <td style="width: 60%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; /UN27.08.06.7/PP/2017</td>
                    <td style="width: 27%;"><?php date_default_timezone_set('Asia/Jakarta');echo date("d ");echo $monthList[date("M")]; echo date(" Y"); ?></td>
                </tr>
                <tr>
                    <th style=" text-align: justify;">Hal</th>
                    <td>:</td>
                    <td>Permohonan Pembimbing Kerja Praktek / Magang</td>
                    <td></td>
                </tr>
            </table>
             <br>
            <p style="max-width: 50%">Yth. <strong>{{ $data->nama_dosen}}</p>
            <p style="text-align: justify;" >Dengan hormat,<br><br>
              Mengharap kesediaan Bapak menjadi Pembimbing Kerja Praktek / Magang mahasiswa
              sebagai berikut.
            </p>
            <table style="width: 100%;">
                <tr>
                    <td style="width: 5%;"></td>
                    <td style="width: 17%;">Nama</td>
                    <td style="width: 3%;">:</td>
                    <td style="width: 75%;"><strong>{{ $data->nama_mhs}}</strong></td>
                </tr>
                <tr>
                    <td></td>
                    <td>NIM</td>
                    <td>:</td>
                    <td><strong>{{ $data->nim}}</strong></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Program Studi</td>
                    <td>:</td>
                    <td><strong>TEKNIK ELEKTRO</strong></td>
                </tr>
            </table>
            <br>
            <p>Atas perhatian dan kerjasamanya kami ucapkan terima kasih.</p>
            <br>
            <table style="width: 100%">
                <tr>
                    <td style="width: 55%;"></td>
                    <td style="width: 45%;"><br>{{$jabatan->nama_jabatan}},<br>
                    @if($jabatan->signature_dosen)
                    <img src="{{ asset('file_ttd/'.$jabatan->signature_dosen) }}" width="150" height="100" style="z-index: 1; top:10%; margin-left:15px;"/>
                    @else
                    <br><br><br><br>
                    @endif
                    <br><b>{{$jabatan->nama_dosen}}</b><br><b>NIP. {{$jabatan->nip}}</b></td>
                </tr>
            </table>
            </div>
        </div>
    </div>
</body>
</html>