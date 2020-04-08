<div class="container">
    <div class="row">
       <div class="col">
            <p style="text-align: center; font-size: 16px; margin:2px; padding-bottom:2px;"><strong>Lembar Revisi</strong></p>
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
                    <td>Judul</td>
                    <td>:</td>
                    <td>{{$data->judul}}</td>
                </tr>
            </table>
            <br>
            <table class="revisi">
                <tr>
                    <td></td>
                </tr>
            </table>
            <p style="text-align: justify;margin-top:0px;">
                <strong>Catatan: Revisi diselesaikan paling lambat sepuluh hari kerja setelah ujian pendadaran dilaksanakan.</strong>
            </p>
            <table style="width: 100%;">
                <tr>
                    <td style="width: 45%;"></td>
                    <td style="width: 55%;text-align: center;">Surakarta, {{date("d ", strtotime($pendadaran->tanggal))}}
                    {{$monthList[date("M", strtotime($pendadaran->tanggal))]}}{{date(" Y", strtotime($pendadaran->tanggal))}}
                    <br>Penguji<br><br><br><br><br><strong>{{$penguji2->nama_dosen}}</strong> <br>NIP. {{$penguji2->nip}}</td>
                </tr>
            </table>
        </div>     
    </div>
</div>