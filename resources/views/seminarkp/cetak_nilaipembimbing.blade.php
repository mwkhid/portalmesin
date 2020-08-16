<!DOCTYPE html>
<html>
<head>
  <title>Nilai Seminar KP</title>
  <!-- <link rel="stylesheet" id="css-main" href="{{ asset('/css/bootstrap.min.css') }}"> -->
  <style type="text/css">
      .table * {
          border: none;
      }

      .table td {
          height: 25px;
          text-align: center;
      }

      .table1 td {
          vertical-align: text-top;
          text-align: left;
          padding: 2px;
      }

      .table2 {
        border-collapse: collapse;
        width: 100%;
      }

      .table2 th, .table2 td {
        border: 1px solid black;
      }

      .table2 th td {
        text-align: left;
        /*padding: 8px;*/
      }
      .table2 td {
          height: 25px;
      }

      .table2 th {
        background-color: #f2f2f2;
        color: black;
      }

      .table3 td {
          text-align: left;
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
  <span style="background-color: #000000; color: white;">
      TE-KP-006
  </span>
</htmlpagefooter>
<div class="container">
    <div class="row">
       <div class="col">
        <hr style="border: 1px solid; color: #4FA9BA; margin:0; padding:0">
            <p style="text-align: center; font-size: 18px;"><strong>LEMBAR PENILAIAN KERJA PRAKTEK PEMBIMBING</strong></p>
            <table class="table1" style="width: 100%">    
                <tr>
                    <td style="width: 10%;">Nama</td>
                    <td style="width: 3%;">:</td>
                    <td style="width: 87%;"><strong>{{$data->nama_mhs}}</strong></td>
                </tr>
                <tr>
                    <td>NIM</td>
                    <td>:</td>
                    <td><strong>{{$data->nim}}</strong></td>
                </tr>
            </table>
            <br>
            <br>
            <table class="table2">
              <tr>
                <td style="width: 5%;">1.</td>
                <td style="width: 75%;">Tata tulis, Penyampaian Makalah, Penguasaan Materi, Kemampuan Menjawab Pertanyaan</td>
                <td style="width: 10%; text-align:center;">{{$nilai_pembimbing->KP1A}}</td>
                <td style="width: 10%; text-align:center;">{{$nilai_pembimbing->KP1H}}</td>
              </tr>
            </table>
            <br>
            <br>
            <table style="width: 100%; font-size: 14px;" class="table3">
              <tr>
                <td colspan="8">Catatan:</td>
              </tr>
              <tr>
                <td colspan="8">Nilai KP = 60% Nilai Perusahaan + 40% Nilai Dosen Pembimbing KP</td>
              </tr>
              <tr>
                <td style="width: 5%;">a.</td>
                <td style="width: 15%;">85 s/d 100</td>
                <td style="width: 2%;">:</td>
                <td style="width: 28%;">A</td>
                <td style="width: 5%;">d.</td>
                <td style="width: 15%;">70 s/d 74</td>
                <td style="width: 2%;">:</td>
                <td style="width: 28%;">B</td>
              </tr>
              <tr>
                <td style="width: 5%;">b.</td>
                <td style="width: 15%;">80 s/d 84</td>
                <td style="width: 2%;">:</td>
                <td style="width: 28%;">A-</td>
                <td style="width: 5%;">e.</td>
                <td style="width: 15%;">65 s/d 69</td>
                <td style="width: 2%;">:</td>
                <td style="width: 28%;">C+</td>
              </tr>
              <tr>
                <td style="width: 5%;">c.</td>
                <td style="width: 15%;">75 s/d 79</td>
                <td style="width: 2%;">:</td>
                <td style="width: 28%;">B+</td>
                <td style="width: 5%;">d.</td>
                <td style="width: 15%;">60 s/d 64</td>
                <td style="width: 2%;">:</td>
                <td style="width: 28%;">C</td>
              </tr>
            </table>
            <br><br>
            <table style="width: 100%" class="table3">
              <tr>
                    <td style="width: 50%; font-size: 14px;"></td>
                    <td style="width: 50%; font-size: 14px;">Dosen Pembimbing KP<br>
                    @if($data->signature_dosen)
                    <img src="{{ asset('file_ttd/'.$data->signature_dosen) }}" width="150" height="100" style="z-index: 1; top:10%; margin-left:15px;"/>
                    @else
                    <br><br><br><br>
                    @endif
                    <br><b>{{$data->nama_dosen}}</b><br>NIP. <b>{{$data->nip}}</b></td>
              </tr>
            </table>      
         </div>     
      </div>
  </div>
</body>
</html>