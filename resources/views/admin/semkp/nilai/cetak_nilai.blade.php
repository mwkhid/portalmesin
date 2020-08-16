<!DOCTYPE html>
<html>
<head>
	<title>Cetak Nilai Kerja Praktek</title>
	<style type="text/css">
		table * {
            border: none;
        }
        body{
            font-size: 14px;
        	line-height: 1.2;
            font-family: "Times New Roman", Times, serif;
        }

        .page-break {
            page-break-after: always;
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
                    <p style="font-size: 15px; margin:0; padding:0;"> KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN<br />
                    UNIVERSITAS SEBELAS MARET<br />
                    FAKULTAS TEKNIK<br />
                    <strong>PROGRAM STUDI TEKNIK ELEKTRO</strong></p>
                    <p style="font-size: 13px; font-style: italic; margin:0; padding:0;">Jalan. Ir. Sutami nomor 36 A Kentingan Surakarta 57126
                    <br /> Telepon. 0271 647069 psw 438, faksimili: 0271 662118</p>
                </td>
            </tr>               
        </table>
    </htmlpageheader>
    <htmlpagefooter name="page-footer">
        <span style="background-color: #000000; color: white; padding:100px;">
            TE-KP-011
        </span>
    </htmlpagefooter>
    <div class="container">
        <div class="row">
            <div class="col">
            <hr style="border: 1px solid; color: #4FA9BA;">
            <p style="text-align: center; font-size: 16px; margin:0; padding:0;"><strong>KITIR NILAI KERJA PRAKTEK</strong></p>
            <p style="text-align: center; font-size: 14px; margin:0; padding:0;">Untuk <strong style="text-decoration:underline;">Mahasiswa</strong></p>
            <br>
            <p style="text-align: justify;">Telah diterima Laporan Kerja Praktek atas </p>
            <table style="width: 100%;">
                <tr>
                    <td style="width: 5%;"></td>
                    <td style="width: 22%;">Nama</td>
                    <td style="width: 3%;">:</td>
                    <td style="width: 70%;"><strong>{{ $data->nama_mhs}} / {{$data->nim}}</strong></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Judul Laporan KP</td>
                    <td>:</td>
                    <td><strong>{{ $data->judul_seminar}}</strong></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Tanggal KP</td>
                    <td>:</td>
                    <td><strong>{{ date("d-m-Y", strtotime($data->tgl_mulai_kp))}}</strong> s.d. <strong>{{ date("d-m-Y", strtotime($data->tgl_selesai_kp))}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Tempat KP</td>
                    <td>:</td>
                    <td><strong>{{ $data->perusahaan_nama}}</strong></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Pembimbing</td>
                    <td>:</td>
                    <td><strong>{{ $data->nama_dosen}}</strong></td>
                </tr>
            </table>
            <br>
            <table style="width: 100%; border-collapse: collapse;">
                <tr style="background-color: #BABABA">
                    <td style="width: 55%;">Nilai Huruf: {{$data->huruf}}</td>
                    <td style="width: 45%;">Nilai Angka: {{$data->angka}}</td>
                </tr>
            </table>
            <br>
            <table style="width: 100%">
                <tr>
                    <td style="width: 55%;"></td>
                    <td style="width: 45%;">Surakarta, {{date('d ',strtotime($data->created_at))}} {{$monthList[date('M', strtotime($data->created_at))]}} {{date(' Y', strtotime($data->created_at))}}<br><br>{{$jabatan->nama_jabatan}},<br>
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
    <div class="page-break"></div>
    <div class="container">
        <div class="row">
            <div class="col">
            <hr style="border: 1px solid black;">
            <p style="text-align: center; font-size: 16px; margin:0; padding:0;"><strong>KITIR NILAI KERJA PRAKTEK</strong></p>
            <p style="text-align: center; font-size: 14px; margin:0; padding:0;">Untuk <strong style="text-decoration:underline;">Koordinator KP</strong></p>
            <br>
            <p style="text-align: justify;">Telah diterima Laporan Kerja Praktek atas </p>
            <table style="width: 100%;">
                <tr>
                    <td style="width: 5%;"></td>
                    <td style="width: 22%;">Nama</td>
                    <td style="width: 3%;">:</td>
                    <td style="width: 70%;"><strong>{{ $data->nama_mhs}} / {{$data->nim}}</strong></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Judul Laporan KP</td>
                    <td>:</td>
                    <td><strong>{{ $data->judul_seminar}}</strong></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Tanggal KP</td>
                    <td>:</td>
                    <td><strong>{{ date("d-m-Y", strtotime($data->tgl_mulai_kp))}}</strong> s.d. <strong>{{ date("d-m-Y", strtotime($data->tgl_selesai_kp))}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Tempat KP</td>
                    <td>:</td>
                    <td><strong>{{ $data->perusahaan_nama}}</strong></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Pembimbing</td>
                    <td>:</td>
                    <td><strong>{{ $data->nama_dosen}}</strong></td>
                </tr>
            </table>
            <br>
            <table style="width: 100%; border-collapse: collapse;">
                <tr style="background-color: #BABABA">
                    <td style="width: 55%;">Nilai Huruf: {{$data->huruf}}</td>
                    <td style="width: 45%;">Nilai Angka: {{$data->angka}}</td>
                </tr>
            </table>
            <br>
            <table style="width: 100%">
                <tr>
                    <td style="width: 55%;"></td>
                    <td style="width: 45%;">Surakarta, {{date('d ',strtotime($data->tgl_nilai))}} {{$monthList[date('M', strtotime($data->tgl_nilai))]}} {{date(' Y', strtotime($data->tgl_nilai))}}<br><br>{{$jabatan->nama_jabatan}},<br>
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