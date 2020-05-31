
<!DOCTYPE html>
<html>
<head>
    <title>Log Book TA</title>
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
            font-size: 12px;
            height: 45px;
        }

        .table2 th {
            font-size: 13px;
            background-color: #3c73a3;
            color: white;
        } 
       
        .table2 tr:nth-child(even){background-color: #f2f2f2}

        body{
            font-size: 15px;
            line-height: 1.2;
            font-family: "Times New Roman", Times, serif;
        }

        @page {
            /* header: page-header; */
            /* footer: page-footer;  */
        }

    </style>
</head>
<body>
    <!-- <htmlpagefooter name="page-footer">
        <p style="padding-bottom:20px;"><strong>Catatan :</strong><br>
        1. Lembar pantauan ditandatangani dosen pembimbing selama penyusunan proposal & laporan akhir.<br>
        2. Lembar konsultasi ditanda tangani pembimbing lapangan dan distempel selama kegiatan di lapangan.</p>
        <span style="background-color: #000000; color: white;">
            TE-KP-002
        </span>
    </htmlpagefooter> -->
    <div class="container">
        <div class="row">
           <div class="col">
            <p style="text-align: center; font-size: 18px;"><strong>Log Book Tugas Akhir Mahasiswa</strong></p>
                <table class="table1" style="width: 100%;">    
                    <tr>
                        <td style="width: 15%;">Nama Mahasiswa</td>
                        <td style="width: 3%;">:</td>
                        <td style="width: 82%;"><strong>{{$ta->nama_mhs}}</strong></td>
                    </tr>
                    <tr>
                        <td>NIM</td>
                        <td>:</td>
                        <td><strong>{{$ta->nim}}</strong></td>
                    </tr>
                    <tr>
                        <td>Judul</td>
                        <td>:</td>
                        <td><strong>{{$ta->judul}}</strong></td>
                    </tr>
                    <tr>
                        <td>Dosen Pembimbing</td>
                        <td>:</td>
                        <td><strong>
                        @foreach($pembimbing as $key=>$row)
                            {{$key+1}}. {{$row->nama_dosen}} <br>
                        @endforeach
                        </strong></td>
                    </tr>
                </table>
                <br>
                <table class="table2" style="width: 100%;">
                  <tr>
                    <th style="width: 5%;">No</th>
                    <th style="width: 10%;">Tanggal</th>
                    <th style="width: 10%;">Nama</th>
                    <th style="width: 20%;">Kegiatan</th>
                    <th style="width: 10%;">Hubungan Bab</th>
                    <th style="width: 10%;">Kendala</th>
                    <th style="width: 15%;">Rencana</th>
                    <th style="width: 10%;">Komentar Pem.1</th>
                    <th style="width: 10%;">Komentar Pem.2</th>
                  </tr>
                @foreach ($data as $key=>$row)
                <tr>
                    <td>{{ $key+1}}</td>
                    <td>
                        {{date('d-m-Y H:i:s',strtotime($row->created_at))}}
                    </td>
                    <td>
                        {{$row->nama_mhs}}
                    </td>
                    <td style="text-align:justify;">
                        {{$row->kegiatan}}
                    </td>
                    <td>
                        {{$row->bab}}
                        @if($row->bab == 1)
                            BAB 1 PENDAHULUAN
                        @elseif($row->bab == 2)
                            BAB 2 TINJAUAN PUSTAKA
                        @elseif($row->bab == 3)
                            BAB 3 METODOLOGI (JALANNYA PENELITIAN)
                        @elseif($row->bab == 4)
                            BAB 4 HASIL DAN PEMBAHASAN
                        @elseif($row->bab == 5)
                            BAB 5 KESIMPULAN
                        @endif
                    </td>
                    <td>
                        {{$row->kendala}}
                    </td>
                    <td>
                        {{$row->rencana}}
                    </td>
                    <td>
                        {{$row->komentar1}}
                    </td>
                    <td>
                        {{$row->komentar2}}
                    </td>
                </tr>
                @endforeach
                </table>
                <br><br>
                <table style="width: 100%; padding-left:20px;">
                    <tr>
                        <td style="width: 50%;">Pembimbing I<br><br><br><br><br><br><strong>{{$pembimbing1->nama_dosen}}</strong> <br>NIP. {{$pembimbing1->nip}}</td>
                        <td style="width: 50%;">Pembimbing II<br><br><br><br><br><br><strong>{{$pembimbing2->nama_dosen}}</strong> <br>NIP. {{$pembimbing2->nip}}</td>
                    </tr>
                </table>      
           </div>     
        </div>
    </div>
</body>
</html>