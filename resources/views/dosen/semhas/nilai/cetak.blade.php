<!DOCTYPE html>
<html>
<head>
  <title>Surat Seminar Hasil Tugas Akhir</title>
  <style type="text/css">
      table.table * {
          border: none;
          line-height: 1.2;
      }

      .table td {
          height: 25px;
          text-align: center;
      }

      .susunanpenguji{  
        border-collapse: collapse;
        width: 100%;
      }

      .susunanpenguji th, .susunanpenguji td{
        border: 1px solid black;
      }

      .rekap{  
        border-collapse: collapse;
        width: 100%;
      }

      .rekap th, .rekap td{
        border: 1px solid black;
        padding: 10px;
      }

      .penilaian{  
        border-collapse: collapse;
        width: 100%;
      }

      .penilaian th, .penilaian td{
        border: 1px solid black;
        height: 25px;
      }

      .revisi{  
        border-collapse: collapse;
        width: 100%;
      }

      .revisi th, .revisi td{
        border: 1px solid black;
        height: 350px;
      }

      .daftarhadir{  
        border-collapse: collapse;
        width: 100%;
      }

      .daftarhadir th, .daftarhadir td{
        border: 1px solid black;
        height: 60px;
      }

      .persetujuan{  
        border-collapse: collapse;
        width: 100%;
      }

      .persetujuan th, .persetujuan td{
        border: 1px solid black;
        height: 40px;
      }

      body{
        font-size: 14px;
        line-height: 1.5;
        font-family: "Times New Roman", Times, serif;
      }

      @page {
            header: page-header;
            /* footer: page-footer;  */
      }

      .page-break {
            page-break-after: always;
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
    <hr style="border: 1px solid; color: #4FA9BA; ">
</htmlpageheader>
<div class="container">
    <div class="row">
       <div class="col">
            <p style="text-align: center; font-size: 16px; margin:2px; padding-bottom:2px;"><strong>Berita Acara Seminar Hasil Skripsi</strong></p>
            <p style=" text-align: justify;margin-bottom:0px;">
            Pada hari ini <strong style="font-style:italic;">{{$dayList[date("D", strtotime($semhas->tanggal))]}}</strong>
            tanggal <strong style="font-style:italic;">{{date("d ", strtotime($semhas->tanggal))}}</strong> 
            bulan <strong style="font-style:italic;">{{$monthList[date("M", strtotime($semhas->tanggal))]}}</strong>
            tahun <strong style="font-style:italic;">{{date(" Y", strtotime($semhas->tanggal))}}</strong>
            telah dilaksanakan Seminar Hasil Skripsi Mahasiswa pada Program Studi Teknik Elektro,
            Fakultas Teknik, Universitas Sebelas Maret Surakarta :
            </p>
            <table style="width: 100%">    
                <tr>
                    <td style="width: 3%;"></td>
                    <td style="width: 25%;">Nama</td>
                    <td style="width: 3%;">:</td>
                    <td style="width: 67%;text-transform: capitalize;">{{$data->nama_mhs}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>NIM</td>
                    <td>:</td>
                    <td>{{$data->nim}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Bidang keminatan</td>
                    <td>:</td>
                    <td>{{$data->nama_peminatan}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td style="vertical-align: text-top;">Judul</td>
                    <td style="vertical-align: text-top;">:</td>
                    <td style="text-align: justify;">{{$data->judul}}</td>
                </tr>
            </table>
            <p style="text-align: justify;margin-bottom:0px;">Dengan susunan penguji : </p>
            <table class="susunanpenguji">
                <tr>
                    <th style="width: 5%;">No</th>
                    <th style="width: 50%;">Nama</th>
                    <th style="width: 20%;">Jabatan</th>
                    <th style="width: 25%;">Tanda Tangan</th>
                </tr>
                @foreach($pembimbing as $index=>$pembimbings)
                <tr>
                    <td style="text-align: center;">{{$index+1}}</td>
                    <td>{{$pembimbings->nama_dosen}}<br>NIP. {{$pembimbings->nip}}</td>
                    <td style="text-align: center;">@if($index == 0)Ketua Penguji
                        @else
                        Anggota Penguji
                        @endif    
                    </td>
                    @if($index == 0)
                    <td>
                        <div style="position: relative; z-index: 0;">1</div>
                        @if($pembimbing1->signature_dosen)
                        <img src="{{ asset('file_ttd/'.$pembimbing1->signature_dosen) }}" width="80" height="30" style="postion: relative; z-index: 1; top:10%;"/>
                        @else
                        @endif
                    </td>
                    @else
                    <td style="padding-left: 50px;">
                        <div style="position: relative; z-index: 0;">2</div>
                        @if($pembimbing2->signature_dosen)
                        <img src="{{ asset('file_ttd/'.$pembimbing2->signature_dosen) }}" width="80" height="30" style="postion: relative; z-index: 1; top:10%;"/>
                        @else
                        @endif
                    </td>
                    @endif
                </tr>
                @endforeach
                @foreach($penguji as $index=>$pengujis)
                <tr>
                    <td style="text-align: center;">{{$index+3}}</td>
                    <td>{{$pengujis->nama_dosen}}<br>NIP. {{$pengujis->nip}}</td>
                    <td style="text-align: center;">Anggota Penguji</td>
                    @if($index == 0)
                    <td>
                        <div style="position: relative; z-index: 0;">3</div>
                        @if($penguji1->signature_dosen)
                        <img src="{{ asset('file_ttd/'.$penguji1->signature_dosen) }}" width="80" height="30" style="postion: relative; z-index: 1; top:10%;"/>
                        @else
                        @endif
                    </td>
                    @else
                    <td style="padding-left: 50px;">
                        <div style="position: relative; z-index: 0;">4</div>
                        @if($penguji2->signature_dosen)
                        <img src="{{ asset('file_ttd/'.$penguji2->signature_dosen) }}" width="80" height="30" style="postion: relative; z-index: 1; top:10%;"/>
                        @else
                        @endif
                    </td>
                    @endif
                </tr>
                @endforeach
            </table>
            <p style="text-align: justify;">Berdasarkan evaluasi Tim Penguji, saudara yang disebutkan di atas dinyatakan
            @if($semhas->pernyataan == 1)
                <strong style="font-style:italic;"> MEMENUHI SYARAT<span style="text-decoration:line-through;">/TIDAK MEMENUHI SYARAT</span>  *)</strong>
            @else
                <strong style="font-style:italic;"> <span style="text-decoration:line-through;">MEMENUHI SYARAT/</span>TIDAK MEMENUHI SYARAT  *)</strong>
            @endif
            untuk melaksanakan Ujian Pendadaran Skripsi dengan predikat Nilai Angka (skala 4): <span style="border: 1px solid black;">&nbsp;&nbsp; {{$semhas->nilai_skala}} &nbsp;&nbsp;</span>
            Nilai Huruf: <span style="border: 1px solid black;">&nbsp;&nbsp; {{$semhas->nilai_huruf}} &nbsp;&nbsp;</span></p>
            <p style="text-align: justify;">Revisi (jika ada) diselesaikan paling lambat dua puluh hari kerja setelah seminar hasil dilaksanakan.</p>
            <p style="text-align: justify;">Demikian berita acara ini dibuat, agar dapat dipergunakan sebagaimana mestinya.</p>
            <br>
            <table style="width: 100%;">
                <tr>
                    <td style="width: 55%;text-align: left;">
                    <div><br>Ketua Penguji<br></div>
                    @if($pembimbing1->signature_dosen)
                    <img src="{{ asset('file_ttd/'.$pembimbing1->signature_dosen) }}" width="100" height="80" style="postion: absolute; z-index: 1; top:10%;"/>
                    @else
                    <br><br><br><br><br>
                    @endif
                    <div><strong>{{$pembimbing1->nama_dosen}}</strong>
                    <br>NIP. {{$pembimbing1->nip}}</div></td>
                    <td style="width: 45%;text-align: left;"><div>Surakarta, {{date("d ", strtotime($semhas->tanggal))}}
                    {{$monthList[date("M", strtotime($semhas->tanggal))]}}{{date(" Y", strtotime($semhas->tanggal))}}
                    <br>Mahasiswa yang diuji<br></div>
                    @if($data->signature_mhs)
                    <img src="{{ asset('file_ttd/'.$data->signature_mhs) }}" width="100" height="80" style="postion: absolute; z-index: 1; top:10%;"/>
                    @else
                    <br><br><br><br><br>
                    @endif
                    <div><strong>{{$data->nama_mhs}}</strong> <br>NIM. {{$data->nim}}</div></td>
                </tr>
            </table>
            <p>Tembusan : <br> 1. Arsip </p>
        </div>     
    </div>
</div>
<div class="page-break"></div>
<div class="container">
    <div class="row">
       <div class="col">
            <p style="text-align: center; font-size: 16px; margin:2px; padding-bottom:2px;"><strong>Lembar Rekapitulasi Penilaian Seminar Hasil Skripsi</strong></p>
            <br>
            <table style="width: 100%">    
                <tr>
                    <td style="width: 3%;"></td>
                    <td style="width: 25%;">Nama</td>
                    <td style="width: 3%;">:</td>
                    <td style="width: 67%;text-transform: capitalize;">{{$data->nama_mhs}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>NIM</td>
                    <td>:</td>
                    <td>{{$data->nim}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Bidang keminatan</td>
                    <td>:</td>
                    <td>{{$data->nama_peminatan}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td style="vertical-align: text-top;">Judul</td>
                    <td style="vertical-align: text-top;">:</td>
                    <td style="text-align: justify;">{{$data->judul}}</td>
                </tr>
            </table>
            <p style="text-align: justify;margin-bottom:0px;">Telah melaksanakan seminar hasil skripsi dengan nilai sebagai berikut: </p>
            <table class="rekap">
                <tr>
                    <th style="width: 8%;">No</th>
                    <th style="width: 65%;">Penguji</th>
                    <th style="width: 27%;">Nilai (Skala 100)</th>
                </tr>
                @foreach($pembimbing as $index=>$pembimbings)
                <tr>
                    <td style="text-align: center;">{{$index+1}}</td>
                    <td>{{$pembimbings->nama_dosen}}</td>
                    <td style="text-align: center;">
                        @if($index == 0)
                            {{$nilai1->total}}
                        @else
                            {{$nilai2->total}}
                        @endif
                    </td>
                </tr>
                @endforeach
                @foreach($penguji as $index=>$pengujis)
                <tr>
                    <td style="text-align: center;">{{$index+3}}</td>
                    <td>{{$pengujis->nama_dosen}}</td>
                    <td style="text-align: center;">
                        @if($index == 0)
                            {{$nilai3->total}}
                        @else
                            {{$nilai4->total}}
                        @endif
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td style="text-align: right;">Nilai rata-rata</td>
                    <td style="text-align: center;">{{$rata2}}</td>
                </tr>
            </table>
            <br>
            <table style="width: 100%;">
                <tr>
                    <td style="width: 45%;">
                    </td>
                    <td style="width: 55%;text-align: left;"><div>Surakarta, {{date("d ", strtotime($semhas->tanggal))}}
                    {{$monthList[date("M", strtotime($semhas->tanggal))]}}{{date(" Y", strtotime($semhas->tanggal))}}
                    <br>Ketua Penguji<br></div>
                    @if($pembimbing1->signature_dosen)
                    <img src="{{ asset('file_ttd/'.$pembimbing1->signature_dosen) }}" width="100" height="80" style="postion: absolute; z-index: 1; top:10%;"/>
                    @else
                    <br><br><br><br><br>
                    @endif
                    <div><strong>{{$pembimbing1->nama_dosen}}</strong> <br>NIP. {{$pembimbing1->nip}}</div></td>
                </tr>
            </table>
            <p style="margin-bottom:0px;"><strong>Konversi Nilai</strong></p>
            <table style="width: 100%;">
                <tr>
                    <td style="width: 35%;text-align: left;border:1px solid black;vertical-align: text-top;padding:10px;">
                        <pre style="-moz-tab-size: 4; -o-tab-size: 4; tab-size: 4;font-family: "Times New Roman", Times, serif;">A      =   &#8805; 85</pre>
                        <pre style="-moz-tab-size: 4; -o-tab-size: 4; tab-size: 4;font-family: "Times New Roman", Times, serif;">A-     =   80 - 84</pre>
                        <pre style="-moz-tab-size: 4; -o-tab-size: 4; tab-size: 4;font-family: "Times New Roman", Times, serif;">B+     =   75 - 79</pre>
                        <pre style="-moz-tab-size: 4; -o-tab-size: 4; tab-size: 4;font-family: "Times New Roman", Times, serif;">B      =   70 - 74</pre>
                        <pre style="-moz-tab-size: 4; -o-tab-size: 4; tab-size: 4;font-family: "Times New Roman", Times, serif;">C+     =   65 - 69</pre>
                        <pre style="-moz-tab-size: 4; -o-tab-size: 4; tab-size: 4;font-family: "Times New Roman", Times, serif;">C      =   60 - 64</pre>
                        <pre style="-moz-tab-size: 4; -o-tab-size: 4; tab-size: 4;font-family: "Times New Roman", Times, serif;">D      =   55 - 59</pre>
                        <pre style="-moz-tab-size: 4; -o-tab-size: 4; tab-size: 4;font-family: "Times New Roman", Times, serif;">E      =   &#60; 55</pre>
                    </td>
                    <td style="width: 65%;"></td>
                </tr>
            </table>
        </div>     
    </div>
</div>
</body>
</html>