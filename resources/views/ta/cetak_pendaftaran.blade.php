<!DOCTYPE html>
<html>
<head>
  <title>Pendaftaran Tugas Akhir</title>
  <style type="text/css">
      .table * {
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
          font-size: 13px;
          vertical-align: text-top;
          text-align: left;
          padding: 2px;
      }

      .table2 {
        /* border-collapse: collapse; */
        width: 100%;
      }

      .table2 th, td {
        text-align: left;
        padding: 8px;
      }
      .table2 td {
          height: 15px;
          background-color: #bfbfbf;
          color: black;
      } 

      .matkul{
        margin-left: 30px; margin-right: 15px; 
        width:100%;
        border-collapse: collapse;
      }

      .matkul td {
        border:0.5px solid grey;
      }

      body{
        font-size: 13px;
        line-height: 1;
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
</htmlpageheader>
<div class="container">
    <div class="row">
       <div class="col">
        <hr style="border: 1px solid; color: #4FA9BA; margin-bottom:0px;">
            <p style="text-align: center; font-size: 16px;"><strong>FORMULIR PENDAFTARAN TUGAS AKHIR</strong></p>
            <table class="table2" style="width: 100%">
              <tr>
                <td>I. Data Mahasiswa</td>
              </tr>
            </table>
            <table class="table1" style="width: 100%">    
                <tr>
                    <td style="width: 5%;"></td>
                    <td style="width: 40%;">Nama Mahasiswa</td>
                    <td style="width: 3%;">:</td>
                    <td style="width: 52%;">{{$data->nama_mhs}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>NIM</td>
                    <td>:</td>
                    <td>{{$data->nim}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Capaian SKS</td>
                    <td>:</td>
                    <td>{{$data->sks}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>IPK (Indeks Prestasi Komulatif)</td>
                    <td>:</td>
                    <td>{{$data->ipk}}</td>
                </tr>
            </table>
            <br>
            <table class="table2" style="width: 100%">
              <tr>
                <td>II. Data Tugas Akhir</td>
              </tr>
            </table>
            <table class="table1" style="width: 100%">    
                <tr>
                    <td style="width: 5%;"></td>
                    <td style="width: 40%;">Bidang Peminatan</td>
                    <td style="width: 3%;">:</td>
                    <td style="width: 52%;">{{$data->nama_peminatan}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Judul Tugas Akhir</td>
                    <td>:</td>
                    <td>{{$data->judul}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Mata Kuliah Pendukung</td>
                    <td>:</td>
                    <td></td>
                </tr>
            </table>
            <table class="matkul" style="line-height:10px;" cellspacing="0" cellpadding="0">
            <?php $no="a"; ?>
            @foreach ($matkul as $row)
            <tr>
                    <td style="width:5%;">{{$no++ }})</td>
                    <td style="width:20%;">{{$row->kode_matkul}}</td>
                    <td style="width:50%;">{{$row->nama_matkul}}</td>
                    <td style="width:25%;">{{number_format("$row->ip",2) }} / {{$row->huruf}}</td>
            </tr>
            @endforeach
            </table>
            <br>
            <table class="table2" style="width: 100%">
              <tr>
                <td>III. Data Mahasiswa</td>
              </tr>
            </table>
            <table class="matkul">
            @foreach($pembimbing as $index=>$pembimbings)
            <tr>
                    <td style="width:5%;">{{ $index+1 }}</td>
                    <td style="width:65%;">@if($index == 0)Pembimbing Utama
                    @else
                    Pembimbing Pendamping
                    @endif:<br>
                    {{$pembimbings->nama_dosen}}<br>
                    {{$pembimbings->nip}}</td>
                    <td style="width:30%;"></td>
            </tr>
            @endforeach
            </table>
            <br>
            <table style="width: 100%; padding-left:20px;">
                <tr>
                    <td style="width: 55%;">Mengetahui<br>{{$ta->nama_jabatan}}<br><br><br><br><br><br>{{$ta->nama_dosen}}<br>NIP. {{$ta->nip}}</td>
                    <td style="width: 45%;">Surakarta, {{date("d F Y", strtotime($data->tgl_pengajuan))}}<br>Yang mengajukan<br><br><br><br><br><br>{{$data->nama_mhs}}<br>NIM. {{$data->nim}}</td>
                </tr>
            </table>
            <table style="width: 100%; padding-left:20px;">
                <tr>
                    <td style="width: 25%;"></td>
                    <td style="width: 75%;">Menyetujui<br>{{$kbk->nama_jabatan}}<br><br><br><br><br><br>{{$kbk->nama_dosen}}<br>NIP. {{$kbk->nip}}</td>
                </tr>
            </table>
         </div>     
      </div>
  </div>
</body>
</html>