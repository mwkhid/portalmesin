<!DOCTYPE html>
<html>
<head>
    <title>Form Konsultasi KP</title>
    <!-- <link rel="stylesheet" id="css-main" href="{{ asset('/css/bootstrap.min.css') }}"> -->
    <style type="text/css">
        
        .table1 * {
          border: none;
          line-height: 1.5;
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

        .table2 th,.table2 td {
          border: 1px solid black;
          text-align: center;
          padding: 8px;
        }

        .table2 td {
            height: 45px;
        }

        .table2 th {
          background-color: #3c73a3;
          color: white;
        } 
       
        .table2 tr:nth-child(even){background-color: #f2f2f2}

        .page-break {
            page-break-after: always;
        }

        @page {
            /* header: page-header; */
            footer: page-footer; 
        }

    </style>
</head>
<body>
    <htmlpagefooter name="page-footer">
        <p style="padding-bottom:20px;"><strong>Catatan :</strong><br>
        1. Lembar pantauan ditandatangani dosen pembimbing selama penyusunan proposal & laporan akhir.<br>
        2. Lembar konsultasi ditanda tangani pembimbing lapangan dan distempel selama kegiatan di lapangan.</p>
        <span style="background-color: #000000; color: white;">
            TE-KP-002
        </span>
    </htmlpagefooter>
    <div class="container">
        <div class="row">
           <div class="col">
            <p style="text-align: center; font-size: 18px;"><strong>LEMBAR KONSULTASI KERJA PRAKTEK</strong></p>
               <table class="table1" style="width: 100%;">    
                    <tr>
                        <td style="width: 35%;">Nama Mahasiswa</td>
                        <td style="width: 3%;">:</td>
                        <td style="width: 62%;"><strong>{{$data->nama_mhs}}</strong></td>
                    </tr>
                    <tr>
                        <td>NIM</td>
                        <td>:</td>
                        <td><strong>{{$data->nim}}</strong></td>
                    </tr>
                    <tr>
                        <td>Dosen Pembimbing</td>
                        <td>:</td>
                        <td><strong>{{$data->nama_dosen}} / {{$data->nip}}</strong></td>
                    </tr>
                    <tr>
                        <td>Pembimbing Lapangan</td>
                        <td>:</td>
                        <td >__________________________</td>
                    </tr>
                    <tr>
                        <td>Tempat Kerja Praktek (KP)</td>
                        <td>:</td>
                        <td><strong>{{$data->perusahaan_nama}}</strong></td>
                    </tr>
                    <tr>
                        <td>Alamat Tempat KP</td>
                        <td>:</td>
                        <td><strong>{{$data->perusahaan_almt}}</strong></td>
                    </tr>
                    <tr>
                        <td>Tanggal Kerja Praktek (KP)</td>
                        <td>:</td>
                        <td><strong>{{date("d-m-Y", strtotime($data->rencana_mulai_kp))}} sd. {{date("d-m-Y", strtotime($data->rencana_selesai_kp))}} </strong></td>
                    </tr>
                </table>
                <br>
                <table class="table2" style="width: 100%;">
                  <tr>
                    <th style="width: 5%;">No</th>
                    <th style="width: 20%;" >Tanggal</th>
                    <th style="width: 65%;" >Uraian Kegiatan</th>
                    <th style="width: 10%;">Paraf Pembb.</th>
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
                    <th style="width: 20%;" >Tanggal</th>
                    <th style="width: 65%;" >Uraian Kegiatan</th>
                    <th style="width: 10%;">Paraf Pembb.</th>
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