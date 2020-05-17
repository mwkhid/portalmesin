
<!DOCTYPE html>
<html>
<head>
    <title>Log Book TA</title>
    <!-- <link rel="stylesheet" id="css-main" href="{{ asset('/css/bootstrap.min.css') }}"> -->
    <style type="text/css">
        
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
                <br>
                <table class="table2" style="width: 100%;">
                  <tr>
                    <th style="width: 7%;">No</th>
                    <th style="width: 15%;">Nama</th>
                    <th style="width: 30%;">Kegiatan</th>
                    <th style="width: 17%;">Hubungan Bab</th>
                    <th style="width: 15%;">Kendala</th>
                    <th style="width: 15%;">Rencana</th>
                  </tr>
                @foreach ($data as $key=>$row)
                <tr>
                    <td>{{ $key+1}}</td>
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
                </tr>
                @endforeach
                </table>      
           </div>     
        </div>
    </div>
</body>
</html>