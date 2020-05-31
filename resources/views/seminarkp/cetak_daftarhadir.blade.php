<!DOCTYPE html>
<html>
<head>
  <title>Daftar Hadir Seminar KP</title>
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
          font-size: 14px;
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

      .table2 th {
        background-color: #3c73a3;
        color: white;
        text-align: center;
        padding: 8px;
      }

      .table2 td {
        height: 45px;
        text-align: center;
      }

      .table2 tr:nth-child(even){background-color: #f2f2f2}

      .page-break {
          page-break-after: always;
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
    <hr style="border: 1px solid; color: #4FA9BA; margin:0; padding:0;">
</htmlpageheader>
<htmlpagefooter name="page-footer">
    <span style="background-color: #000000; color: white;">
        TE-KP-010
    </span>
</htmlpagefooter>
<div class="container">
    <div class="row">
       <div class="col">
            <p style="text-align: center; font-size: 18px;"><strong>DAFTAR HADIR SEMINAR KERJA PRAKTEK</strong></p>
            <table class="table1" style="width: 100%">    
                <tr>
                    <td style="width: 25%;">Nama</td>
                    <td style="width: 3%;">:</td>
                    <td style="width: 72%;"><strong>{{$data->nama_mhs}}</strong></td>
                </tr>
                <tr>
                    <td>Judul Laporan KP</td>
                    <td>:</td>
                    <td><strong>{{$data->judul_seminar}}</strong></td>
                </tr>
                <tr>
                    <td>Tanggal Seminar KP</td>
                    <td>:</td>
                    <td><strong>{{date("d-m-Y", strtotime($data->tanggal_seminar))}}</strong></td>
                </tr>
                <tr>
                    <td>Tanggal KP</td>
                    <td>:</td>
                    <td><strong>{{date("d-m-Y", strtotime($data->tgl_mulai_kp))}} 
                    s/d {{date("d-m-Y", strtotime($data->tgl_selesai_kp))}}</strong></td>
                </tr>
                <tr>
                    <td>Tempat KP</td>
                    <td>:</td>
                    <td><strong>{{$data->perusahaan_nama}}</strong></td>
                </tr>
                <tr>
                    <td>Pembimbing</td>
                    <td>:</td>
                    <td><strong>{{$data->nama_dosen}}</strong></td>
                </tr>
            </table>
            <br>
            <table class="table2">
              <tr>
                <th style="width: 5%;">No</th>
                <th style="width: 20%;">NIP/NIM</th>
                <th style="width: 65%;">Nama</th>
                <th style="width: 10%;">Tanda Tangan</th>
              </tr>
              <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
              </tr>
              <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
              </tr>
              <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
              </tr>
              <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
              </tr>
              <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
              </tr>
              <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
              </tr>
              <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
              </tr>
              <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
              </tr>
              <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
              </tr>
              <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
              </tr>
              <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
              </tr>
              <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
              </tr>
              <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
              </tr>
            </table>     
         </div>     
      </div>
  </div>
    <div class="page-break"></div>
    <div class="container">
        <div class="row">
           <div class="col">
               <table class="table2">
                  <tr>
                    <th style="width: 5%;">No</th>
                    <th style="width: 20%;">NIP/NIM</th>
                    <th style="width: 65%;">Nama</th>
                    <th style="width: 10%;">Tanda Tangan</th>
                  </tr>
                  <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                  </tr>
                  <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                  </tr>
                  <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                  </tr>
                  <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                  </tr>
                  <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                  </tr>
                  <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                  </tr>
                  <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                  </tr>
                  <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                  </tr>
                  <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                  </tr>
                  <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                  </tr>
                  <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                  </tr>
                  <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                  </tr>
                  <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                  </tr>
                  <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                  </tr>
                  <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                  </tr>
                  <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                  </tr>
                  <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                  </tr>
                  <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                  </tr>
                  <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                  </tr>
                </table>      
           </div>     
        </div>
    </div>
</body>
</html>