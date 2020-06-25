<div class="container">
    <div class="row">
       <div class="col">
            <p style="text-align: center; font-size: 16px; margin:2px; padding-bottom:2px;"><strong>Lembar Rekapitulasi Penilaian Sidang Pendadaran Skripsi</strong></p>
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
            <p style="text-align: justify;margin-bottom:0px;">Telah melaksanakan sidang pendadaran skripsi dengan nilai sebagai berikut: </p>
            <table class="rekap">
                <tr>
                    <th style="width: 35%;">Pembimbing</th>
                    <th style="width: 15%;">Nilai Bimbingan (Skala 100)</th>
                    <th style="width: 35%;">Penguji</th>
                    <th style="width: 15%;">Nilai (Skala 100)</th>
                </tr>
                @foreach($pembimbing as $index=>$pembimbings)
                <tr>
                    <td>{{$index+1}}. {{$pembimbings->nama_dosen}}</td>
                    <td></td>
                    <td>{{$index+1}}. {{$pembimbings->nama_dosen}}</td>
                    <td></td>
                </tr>
                @endforeach
                @foreach($penguji as $index=>$pengujis)
                <tr>
                    @if($index == 0)
                    <td rowspan="2"></td>
                    <td rowspan="2"></td>
                    @endif
                    <td>{{$index+3}}. {{$pengujis->nama_dosen}}</td>
                    <td></td>
                </tr>
                @endforeach
                <tr>
                    <td>Nilai rata-rata bimbingan (NB)</td>
                    <td></td>
                    <td>Nilai rata-rata ujian (NU)</td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="2">Nilai akhir (NA) = (60% x NB) + (40% x NU)</td>
                    <td colspan="2"></td>
                </tr>
            </table>
            <br>
            <table style="width: 100%;">
                <tr>
                    <td style="width: 45%;">
                    </td>
                    <td style="width: 55%;text-align: left;">Surakarta, {{date("d ", strtotime($pendadaran->tanggal))}}
                    {{$monthList[date("M", strtotime($pendadaran->tanggal))]}}{{date(" Y", strtotime($pendadaran->tanggal))}}
                    <br>Ketua Penguji<br><br><br><br><br><strong>{{$pembimbing1->nama_dosen}}</strong> <br>NIP. {{$pembimbing1->nip}}</td>
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