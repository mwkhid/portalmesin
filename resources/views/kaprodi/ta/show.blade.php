<!DOCTYPE html>
<html>
<head>
    <title>Tugas Akhir</title>
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

        .beritaacara{  
        border-collapse: collapse;
        width: 100%;
        }

        .beritaacara th, .beritaacara td{
        border: 1px solid black;
        padding: 5px;
        }

        body{
            font-size: 15px;
            line-height: 1.2;
            font-family: "Times New Roman", Times, serif;
        }

        @page {
            /* header: page-header; */
            /* footer: page-footer;  */
        }

        .page-break {
            page-break-after: always;
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
@include('kaprodi.ta.doc.logbookta')
<div class="page-break"></div>
@if($semhas != null && $nilai3 != null && $nilai4 != null)
    @include('kaprodi.ta.doc.semhas')
@else
    Data Seminar Hasil Belum Ada
@endif
<div class="page-break"></div>
@if($pendadaran != null && $nilaipen3 != null && $nilaipen4 != null)
    @include('kaprodi.ta.doc.pendadaran')
@else
    Data Pendadaran Belum Ada
@endif
<div class="page-break"></div>
@if($ta->doc_ta != null)
    <a href="{{asset('file_draftta/'.$ta->doc_ta)}}">Link Draft Final TA</a>
@else
    Belum Upload Dokumen TA
@endif
</body>
</html>