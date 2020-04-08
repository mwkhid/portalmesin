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
                @foreach($penguji as $index=>$pengujis)
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
            <strong style="font-style:italic;">LULUS/TIDAK LULUS *)</strong>
            Ujian Pendadaran Skripsi dengan predikat Nilai Angka (Skala 4): 
            <input style="height:50px;padding:10px;border: 1px solid black;width:40px;">
            Nilai Huruf:
            <input style="height:50px;padding:10px;border: 1px solid black;width:40px;"></p>
            <p style="text-align: justify;">Revisi (jika ada) diselesaikan paling lambat sepuluh hari kerja setelah sidang pendadaran dilaksanakan.
            Demikian berita acara ini dibuat, agar dapat dipergunakan sebagaimana mestinya.</p>
            <table style="width: 100%; padding-left:20px;">
                <tr>
                    <td style="width: 50%;text-align: center;"><br>Ketua Penguji<br><br><br><br><br><br><strong>{{$pembimbing1->nama_dosen}}</strong>
                    <br>NIP. {{$pembimbing1->nip}}</td>
                    <td style="width: 50%;text-align: center;">Surakarta, {{date("d ", strtotime($pendadaran->tanggal))}}
                    {{$monthList[date("M", strtotime($pendadaran->tanggal))]}}{{date(" Y", strtotime($pendadaran->tanggal))}}
                    <br>Mahasiswa yang diuji<br><br><br><br><br><br><strong>{{$data->nama_mhs}}</strong> <br>NIM. {{$data->nim}}</td>
                </tr>
            </table>
        </div>     
    </div>
</div>