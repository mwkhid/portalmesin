<!DOCTYPE html>
<html>
<head>
  <title>Surat Pendadaran Tugas Akhir</title>
  <style type="text/css">
      table.table * {
          border: none;
          line-height: 1.2;
      }

      .table td {
          height: 25px;
          text-align: center;
      }

      .beritaacara{  
        border-collapse: collapse;
        width: 100%;
      }

      .beritaacara th, .beritaacara td{
        border: 1px solid black;
        padding: 5px;
      }

      .rekap{  
        border-collapse: collapse;
        width: 100%;
        font-size: 13px;
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

      .bimbingan{  
        border-collapse: collapse;
        width: 100%;
      }

      .bimbingan th, .bimbingan td{
        border: 1px solid black;
        height: 40px;
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
            <table style="width: 100%;">
                <tr>
                    <td style="width: 17%; text-align: justify;">Nomor</td>
                    <td style="width: 3%;">:</td>
                    <td style="width: 80%;"></td>
                    <!-- <td style="width: 80%;">{{sprintf("%03d", $data->id)}}/UN.SD/TE/{{date("Y")}}</td> -->
                </tr>
                <tr>
                    <td style=" text-align: justify;">Lampiran</td>
                    <td>:</td>
                    <td>Draf Skripsi</td>
                </tr>
                <tr>
                    <td style=" text-align: justify;">Perihal</td>
                    <td>:</td>
                    <td><strong>Undangan Sidang Pendadaran Skripsi</strong></td>
                </tr>
            </table>
            <p style="text-align: justify;margin-bottom:0px;">Kepada Yth.</p>
            <table>
                @foreach($pembimbing as $index=>$pembimbings)
                <tr>
                    <td style="width: 3%;"></td>
                    <td style="width: 3%;"><strong>{{$index+1}}.</strong></td>
                    <td style="width: 94%;"><strong>{{$pembimbings->nama_dosen}}</strong></td>
                </tr>
                @endforeach
                @foreach($penguji as $index=>$pengujis)
                <tr>
                    <td style="width: 3%;"></td>
                    <td style="width: 3%;"><strong>{{$index+3}}.</strong></td>
                    <td style="width: 94%;"><strong>{{$pengujis->nama_dosen}}</strong></td>
                </tr>
                @endforeach
            </table>
            <p style=" text-align: justify;margin-bottom:0px;">Dengan hormat. <br>
            Mengharap dengan hormat kehadiran Bapak dalam Sidang Pendadaran Skripsi mahasiswa :
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
                @foreach($pembimbing as $index=>$pembimbings)
                <tr>
                    <td></td>
                    <td>Pembimbing {{$index+1}}</td>
                    <td>:</td>
                    <td>{{$pembimbings->nama_dosen}}</td>
                </tr>
                @endforeach
            </table>
            <p style="text-align: justify;">Sidang pendadaran Skripsi akan diselenggarakan pada : </p>
            <table style="width: 100%">
                <tr>
                    <td style="width: 3%;"></td>
                    <td style="width: 25%;">Hari, tanggal</td>
                    <td style="width: 3%;">:</td>
                    <td style="width: 67%;">{{$dayList[date("D", strtotime($pendadaran->tanggal))]}}, 
                    {{date("d ", strtotime($pendadaran->tanggal))}}
                    {{$monthList[date("M", strtotime($pendadaran->tanggal))]}}
                    {{date(" Y", strtotime($pendadaran->tanggal))}}</td>
                </tr>
                <tr>
                    <td style="width: 3%;"></td>
                    <td style="width: 25%;">Jam</td>
                    <td style="width: 3%;">:</td>
                    <td style="width: 67%;">{{date("H.i ", strtotime($pendadaran->jam_mulai))}} - {{date("H.i ", strtotime($pendadaran->jam_selesai))}}</td>
                </tr>
                <tr>
                    <td style="width: 3%;"></td>
                    <td style="width: 25%;">Ruangan</td>
                    <td style="width: 3%;">:</td>
                    <td style="width: 67%;">{{$pendadaran->nama_ruang}}</td>
                </tr>
            </table>
            <p style="text-align: justify;">Bersama ini kami lampirkan draf skripsi sebagai bahan ujian.<br> 
            Atas perhatian dan kehadirannya, kami ucapkan terima kasih.</p>
            <table style="width: 100%; padding-left:20px;">
                <tr>
                    <td style="width: 45%;"></td>
                    <td style="width: 55%;text-align: left;"><div>Surakarta, {{date("d ", strtotime($pendadaran->created_at))}}
                    {{$monthList[date("M", strtotime($pendadaran->created_at))]}}{{date(" Y", strtotime($pendadaran->created_at))}}
                    <br>{{$jabatan->nama_jabatan}}<br></div>
                    @if($jabatan->signature_dosen)
                    <img src="{{ asset('file_ttd/'.$jabatan->signature_dosen) }}" width="100" height="80" style="postion: absolute; z-index: 1; top:10%;"/>
                    @else
                    <br><br><br><br>
                    @endif
                    <div><strong>{{$jabatan->nama_dosen}}</strong> <br>NIP. {{$jabatan->nip}}</div></td>
                </tr>
            </table>
            <br>
            <p>Tembusan : <br> 1. Arsip </p>
            <!-- <p style="margin-bottom:0px;">Tembusan:
              <ol type="1" style="margin-top:0px;">
                <li>Arsip</li>
              </ol>
            </p> -->
        </div>     
    </div>
</div>
</body>
</html>