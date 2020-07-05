<div class="container">
    <div class="row">
       <div class="col">
            <p style="text-align: center; font-size: 16px; margin:2px; padding-bottom:2px;"><strong>Berita Acara Sidang Pendadaran Skripsi</strong></p>
            <p style=" text-align: justify;margin-bottom:0px;">
            Pada hari ini <strong style="font-style:italic;">{{$dayList[date("D", strtotime($pendadaran->tanggal))]}}</strong>
            tanggal <strong style="font-style:italic;">{{date("d ", strtotime($pendadaran->tanggal))}}</strong> 
            bulan <strong style="font-style:italic;">{{$monthList[date("M", strtotime($pendadaran->tanggal))]}}</strong>
            tahun <strong style="font-style:italic;">{{date(" Y", strtotime($pendadaran->tanggal))}}</strong>
            telah dilaksanakan Sidang Pendadaran Skripsi Mahasiswa pada Program Studi Teknik Elektro,
            Fakultas Teknik, Universitas Sebelas Maret Surakarta :
            </p>
            <table style="width: 100%">    
                <tr>
                    <td style="width: 3%;"></td>
                    <td style="width: 25%;">Nama</td>
                    <td style="width: 3%;">:</td>
                    <td style="width: 67%;text-transform: capitalize;">{{$ta->nama_mhs}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>NIM</td>
                    <td>:</td>
                    <td>{{$ta->nim}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Bidang keminatan</td>
                    <td>:</td>
                    <td>{{$ta->nama_peminatan}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td style="vertical-align: text-top;">Judul</td>
                    <td style="vertical-align: text-top;">:</td>
                    <td style="text-align: justify;">{{$ta->judul}}</td>
                </tr>
            </table>
            <p style="text-align: justify;margin-bottom:0px;">Dengan susunan penguji : </p>
            <table class="beritaacara">
                <tr>
                    <th style="width: 6%;">No</th>
                    <th style="width: 49%;">Nama</th>
                    <th style="width: 20%;">Jabatan</th>
                    <th style="width: 25%;" colspan="2">Tanda Tangan</th>
                </tr>
                @foreach($pembimbing as $index=>$pembimbings)
                <tr>
                    <td style="text-align: center;">{{$index+1}}</td>
                    <td>{{$pembimbings->nama_dosen}}<br>NIP. {{$pembimbings->nip}}</td>
                    <td style="text-align: center;">@if($index == 0)Ketua Penguji
                        @else
                        Anggota Penguji
                        @endif    
                    </td>
                    <td style="border-right: none;">@if($index == 0)1
                        @else
                        @endif 
                    </td>
                    <td style="border-left: none;border-top: none;">@if($index != 0)2
                        @else
                        @endif 
                    </td>
                </tr>
                @endforeach
                @foreach($pengujipen as $index=>$pengujis)
                <tr>
                    <td style="text-align: center;">{{$index+3}}</td>
                    <td>{{$pengujis->nama_dosen}}<br>NIP. {{$pengujis->nip}}</td>
                    <td style="text-align: center;">Anggota Penguji</td>
                    <td style="border-right: none;">@if($index == 0)3
                        @else
                        @endif 
                    </td>
                    <td style="border-left: none;border-top: none;">@if($index != 0)4
                        @else
                        @endif 
                    </td>
                </tr>
                @endforeach
            </table>
            <p style="text-align: justify;">Berdasarkan evaluasi Tim Penguji, saudara yang disebutkan diatas dinyatakan 
            @if($pendadaran->kelulusan == 1)
                <strong style="font-style:italic;">LULUS<span style="text-decoration:line-through;">/TIDAK LULUS</span> *)</strong>
            @else
                <strong style="font-style:italic;"><span style="text-decoration:line-through;">LULUS/</span>TIDAK LULUS *)</strong>
            @endif
            Ujian Pendadaran Skripsi dengan predikat Nilai Angka (Skala 4): <span style="border: 1px solid black;">&nbsp;&nbsp; {{$pendadaran->nilai_skala}} &nbsp;&nbsp;</span>
            Nilai Huruf: <span style="border: 1px solid black;">&nbsp;&nbsp; {{($pendadaran->nilai_huruf)}} &nbsp;&nbsp;</span></p>
            <p style="text-align: justify;">Revisi (jika ada) diselesaikan paling lambat sepuluh hari kerja setelah sidang pendadaran dilaksanakan.</p>
            <p style="text-align: justify;">Demikian berita acara ini dibuat, agar dapat dipergunakan sebagaimana mestinya.</p>
            <table style="width: 100%;">
                <tr>
                    <td style="width: 50%;text-align: left;"><br>Ketua Penguji<br><br><br><br><br><br><strong>{{$pembimbing1->nama_dosen}}</strong>
                    <br>NIP. {{$pembimbing1->nip}}</td>
                    <td style="width: 50%;text-align: left;">Surakarta, {{date("d ", strtotime($pendadaran->tanggal))}}
                    {{$monthList[date("M", strtotime($pendadaran->tanggal))]}}{{date(" Y", strtotime($pendadaran->tanggal))}}
                    <br>Mahasiswa yang diuji<br><br><br><br><br><br><strong>{{$ta->nama_mhs}}</strong> <br>NIM. {{$ta->nim}}</td>
                </tr>
            </table>
            <p>Tembusan : <br> 1. Arsip </p>
        </div>     
    </div>
</div>
<div class="page-break"></div>
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
                    <td style="width: 67%;text-transform: capitalize;">{{$ta->nama_mhs}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>NIM</td>
                    <td>:</td>
                    <td>{{$ta->nim}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Bidang keminatan</td>
                    <td>:</td>
                    <td>{{$ta->nama_peminatan}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td style="vertical-align: text-top;">Judul</td>
                    <td style="vertical-align: text-top;">:</td>
                    <td style="text-align: justify;">{{$ta->judul}}</td>
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
                    <td style="text-align: center;">@if($index == 0) {{$nb1->total_skripsi}} @else {{$nb2->total_skripsi}} @endif</td>
                    <td>{{$index+1}}. {{$pembimbings->nama_dosen}}</td>
                    <td style="text-align: center;">@if($index == 0) {{$nilaipen1->total}} @else {{$nilaipen2->total}} @endif</td>
                </tr>
                @endforeach
                @foreach($pengujipen as $index=>$pengujis)
                <tr>
                    @if($index == 0)
                    <td rowspan="2"></td>
                    <td rowspan="2"></td>
                    @endif
                    <td>{{$index+3}}. {{$pengujis->nama_dosen}}</td>
                    <td style="text-align: center;">@if($index == 0) {{$nilaipen3->total}} @else {{$nilaipen4->total}} @endif</td>
                </tr>
                @endforeach
                <tr>
                    <td>Nilai rata-rata bimbingan (NB)</td>
                    <td style="text-align: center;">{{$nbrata2}}</td>
                    <td>Nilai rata-rata ujian (NU)</td>
                    <td style="text-align: center;">{{$ratapen2}}</td>
                </tr>
                <tr>
                    <td colspan="2">Nilai akhir (NA) = (60% x NB) + (40% x NU)</td>
                    <td colspan="2" style="text-align: center;">{{$nilaiakhir}}</td>
                </tr>
            </table>
            <br>
            <table style="width: 100%;">
                <tr>
                    <td style="width: 45%;"></td>
                    <td style="width: 55%;text-align: left;">Surakarta, {{date("d ", strtotime($pendadaran->tanggal))}}
                    {{$monthList[date("M", strtotime($pendadaran->tanggal))]}}{{date(" Y", strtotime($pendadaran->tanggal))}}
                    <br>Ketua Penguji<br><br><br><br><br><strong>{{$pembimbing1->nama_dosen}}</strong> <br>NIP. {{$pembimbing1->nip}}</td>
                </tr>
            </table>
            <p style="margin-bottom:0px;"><strong>Konversi Nilai</strong></p>
            <table style="width: 100%;">
                <tr>
                    <td style="width: 45%;text-align: left;border:1px solid black;vertical-align: text-top;padding:10px;">
                        <pre style="-moz-tab-size: 4; -o-tab-size: 4; tab-size: 4;font-family: "Times New Roman", Times, serif;">A      =   &#8805; 85</pre>
                        <pre style="-moz-tab-size: 4; -o-tab-size: 4; tab-size: 4;font-family: "Times New Roman", Times, serif;">A-     =   80 - 84</pre>
                        <pre style="-moz-tab-size: 4; -o-tab-size: 4; tab-size: 4;font-family: "Times New Roman", Times, serif;">B+     =   75 - 79</pre>
                        <pre style="-moz-tab-size: 4; -o-tab-size: 4; tab-size: 4;font-family: "Times New Roman", Times, serif;">B      =   70 - 74</pre>
                        <pre style="-moz-tab-size: 4; -o-tab-size: 4; tab-size: 4;font-family: "Times New Roman", Times, serif;">C+     =   65 - 69</pre>
                        <pre style="-moz-tab-size: 4; -o-tab-size: 4; tab-size: 4;font-family: "Times New Roman", Times, serif;">C      =   60 - 64</pre>
                        <pre style="-moz-tab-size: 4; -o-tab-size: 4; tab-size: 4;font-family: "Times New Roman", Times, serif;">D      =   55 - 59</pre>
                        <pre style="-moz-tab-size: 4; -o-tab-size: 4; tab-size: 4;font-family: "Times New Roman", Times, serif;">E      =   &#60; 55</pre>
                    </td>
                    <td style="width: 55%;"></td>
                </tr>
            </table>
        </div>     
    </div>
</div>