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
                <strong>PROGRAM STUDI TEKNIK MESIN</strong></p>
                <p style="font-style: italic; ">Jalan. Ir. Sutami nomor 36 A Kentingan Surakarta 57126
                <br /> Telepon. 0271 647069, faksimili: 0271 662118</p>
            </td>
        </tr>               
    </table>
    <hr style="border: 1px solid; color: #4FA9BA; ">
</htmlpageheader>
@include('admin.pendadaran.list.doc.undangan')
<div class="page-break"></div>
@include('admin.pendadaran.list.doc.berita_acara')
<div class="page-break"></div>
@include('admin.pendadaran.list.doc.rekap')
<div class="page-break"></div>
@include('admin.pendadaran.list.doc.penilaian1')
<div class="page-break"></div>
@include('admin.pendadaran.list.doc.penilaian2')
<div class="page-break"></div>
@include('admin.pendadaran.list.doc.penilaian3')
<div class="page-break"></div>
@include('admin.pendadaran.list.doc.penilaian4')
<div class="page-break"></div>
@include('admin.pendadaran.list.doc.revisi1')
<div class="page-break"></div>
@include('admin.pendadaran.list.doc.revisi2')
<div class="page-break"></div>
@include('admin.pendadaran.list.doc.revisi3')
<div class="page-break"></div>
@include('admin.pendadaran.list.doc.revisi4')
<div class="page-break"></div>
@include('admin.pendadaran.list.doc.bimbingan')
<div class="page-break"></div>
@include('admin.pendadaran.list.doc.persetujuan')
</body>
</html>