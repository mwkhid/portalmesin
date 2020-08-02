<!DOCTYPE html>
<html>
<head>
  <title>Biodata Alumni</title>
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

      body{
        font-size: 14px;
        line-height: 1.3;
        font-family: "Times New Roman", Times, serif;
      }

      @page {
        /* header: page-header;
        footer: page-footer;  */
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
      TE-KP-006
  </span>
</htmlpagefooter>
<div class="container">
    <div class="row">
       <div class="col">
            <p style="text-align: center; font-size: 18px;"><strong><u>BIODATA ALUMNI TEKNIK ELEKTRO</u></strong></p>
            <table class="table1" style="width: 100%">    
                <tr>
                    <td style="width: 23%;">Nama</td>
                    <td style="width: 3%;">:</td>
                    <td style="width: 74%;">{{$bio->nama}}</td>
                </tr>
                <tr>
                    <td>NIM</td>
                    <td>:</td>
                    <td>{{$bio->nim}}</td>
                </tr>
                <tr>
                    <td>Tempat/Tgl. Lahir</td>
                    <td>:</td>
                    <td>{{$bio->tempat_lahir}}, {{date("d ", strtotime($bio->tgl_lahir))}}
                    {{$monthList[date("M", strtotime($bio->tgl_lahir))]}}{{date(" Y", strtotime($bio->tgl_lahir))}}</td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td>:</td>
                    <td> {{$bio->agama}} &nbsp;&nbsp;&nbsp;&nbsp;Jenis Kelamin : @if($bio->jenis_kelamin == 1)Laki-Laki @elseif($bio->jenis_kelamin == 2) Perempuan @endif </td>
                </tr>
                <tr>
                    <td>Tanggal Masuk</td>
                    <td>:</td>
                    <td> {{date("d ", strtotime($bio->tgl_masuk))}}
                    {{$monthList[date("M", strtotime($bio->tgl_masuk))]}}{{date(" Y", strtotime($bio->tgl_masuk))}}</td>
                </tr>
                <tr>
                    <td>Tanggal Lulus</td>
                    <td>:</td>
                    <td> {{date("d ", strtotime($bio->tgl_lulus))}}
                    {{$monthList[date("M", strtotime($bio->tgl_lulus))]}}{{date(" Y", strtotime($bio->tgl_lulus))}}</td>
                </tr>
                <tr>
                    <td>Alamat Rumah</td>
                    <td>:</td>
                    <td>{{$bio->alamat}}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td>{{$bio->email}}</td>
                </tr>
                <tr>
                    <td>No Telephon (Rumah)</td>
                    <td>:</td>
                    <td>{{$bio->no_rumah}}</td>
                </tr>
                <tr>
                    <td>No Telephon (Hp)</td>
                    <td>:</td>
                    <td>{{$bio->no_hp}}</td>
                </tr>
                <tr>
                    <td>Nilai Tugas Akhir</td>
                    <td>:</td>
                    <td>{{$bio->nilai_ta}} &nbsp;&nbsp;&nbsp;&nbsp;IPK Terakhir : {{$bio->ipk_terakhir}}</td>
                </tr>
                <tr>
                    <td>Capaian SKS</td>
                    <td>:</td>
                    <td>{{$bio->capaian_sks}}</td>
                </tr>
                <tr>
                    <td>Lama Masa Studi</td>
                    <td>:</td>
                    <td>{{$bio->masa_studi}}</td>
                </tr>
                <tr>
                    <td>Bidang Ilmu</td>
                    <td>:</td>
                    <td>{{$bio->bidang_ilmu}}</td>
                </tr>
                <br><br><br>
                <tr>
                    <td><strong><u>Judul Tugas Akhir :</u></strong></td>
                </tr>
                <tr>
                    <td>*Bahasa Indonesia</td>
                    <td>:</td>
                    <td style="text-align:justify;">{{$bio->judul_ind}}</td>
                </tr>
                <tr>
                    <td>*Bahasa Inggris</td>
                    <td>:</td>
                    <td style="text-align:justify;">{{$bio->judul_eng}}</td>
                </tr>
            </table>
            <br><br>
            <table style="width: 100%">
                <tr>
                    <td style="width: 30%; vertical-align: text-top; padding-left:25px;">
                        Foto 4x6 <br><br> Berwarna
                    </td>
                    <td style="width: 35%"><div>Surakarta,<br><br>Yang Menyerahkan<br></div>
                    @if($mhs->signature_mhs)
                    <img src="{{ asset('file_ttd/'.$mhs->signature_mhs) }}" width="100" height="80" style="postion: absolute; z-index: 1; top:10%;"/>
                    @else
                    <br><br><br><br><br>
                    @endif
                    <div>({{$bio->nama}})</div></td>
                    <td style="width: 35%"><div>Disahkan Oleh<br><br>Pembimbing Akademik<br></div>
                    @if($bio->acc_pembimbing == 1)
                        @if($pembimbing->signature_dosen)
                        <img src="{{ asset('file_ttd/'.$pembimbing->signature_dosen) }}" width="100" height="80" style="postion: absolute; z-index: 1; top:10%;"/>
                        @endif
                    @else
                    <br><br><br><br><br>
                    @endif
                    <div>({{$pembimbing->nama_dosen}})</div></td>
                </tr>
            </table>
         </div>     
      </div>
  </div>
</body>
</html>