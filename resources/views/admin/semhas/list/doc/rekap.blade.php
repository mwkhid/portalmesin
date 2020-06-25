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
                    <td style="text-align: center;"></td>
                </tr>
                @endforeach
                @foreach($penguji as $index=>$pengujis)
                <tr>
                    <td style="text-align: center;">{{$index+3}}</td>
                    <td>{{$pengujis->nama_dosen}}</td>
                    <td style="text-align: center;"></td>
                </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td style="text-align: right;">Nilai rata-rata</td>
                    <td></td>
                </tr>
            </table>
            <br>
            <table style="width: 100%;">
                <tr>
                    <td style="width: 45%;">
                    </td>
                    <td style="width: 55%;text-align: left;">Surakarta, {{date("d ", strtotime($semhas->tanggal))}}
                    {{$monthList[date("M", strtotime($semhas->tanggal))]}}{{date(" Y", strtotime($semhas->tanggal))}}
                    <br>Ketua Penguji<br><br><br><br><br><br><strong>{{$pembimbing1->nama_dosen}}</strong> <br>NIP. {{$pembimbing1->nip}}</td>
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