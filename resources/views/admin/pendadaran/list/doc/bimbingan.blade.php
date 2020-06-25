<div class="container">
    <div class="row">
       <div class="col">
            <p style="text-align: center; font-size: 16px; margin:2px; padding-bottom:2px;"><strong>Lembar Penilaian Bimbingan Skripsi</strong></p>
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
            <br>
            <table class="bimbingan">
                <tr>
                    <th style="width: 55%;">ASPEK YANG DINILAI</th>
                    <th style="width: 20%;">Nilai <br> (Skala 100)</th>
                    <th style="width: 10%;">Bobot (%)</th>
                    <th style="width: 15%;">Nilai x Bobot</th>
                </tr>
                <tr>
                    <td>1. Ketepatan waktu masa bimbingan</td>
                    <td></td>
                    <td style="text-align:center;">10</td>
                    <td></td>
                </tr>
                <tr>
                    <td>2. Kemajuan penelitian mingguan</td>
                    <td></td>
                    <td style="text-align:center;">15</td>
                    <td></td>
                </tr>
                <tr>
                    <td>3. Sikap mahasiswa selama masa bimbingan</td>
                    <td></td>
                    <td style="text-align:center;">20</td>
                    <td></td>
                </tr>
                <tr>
                    <td>4. Sumber dan data pada penelitian dapat dipertanggungjawabkan</td>
                    <td></td>
                    <td style="text-align:center;">20</td>
                    <td></td>
                </tr>
                <tr>
                    <td>5. Kemampuan menggunakan metode penelitian</td>
                    <td></td>
                    <td style="text-align:center;">20</td>
                    <td></td>
                </tr>
                <tr>
                    <td>6. Kemampuan analisis dan menarik kesimpulan</td>
                    <td></td>
                    <td style="text-align:center;">15</td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="3" style="text-align:right;height:35px;"><strong>Nilai total</strong></td>
                    <td style="height:35px;"></td>
                </tr>
            </table>
            <br>
            <table style="width: 100%;">
                <tr>
                    <td style="width: 45%;"></td>
                    <td style="width: 55%;text-align: left;">Surakarta, {{date("d ", strtotime($pendadaran->tanggal))}}
                    {{$monthList[date("M", strtotime($pendadaran->tanggal))]}}{{date(" Y", strtotime($pendadaran->tanggal))}}
                    <br>Pembimbing 1<br><br><br><br><br><strong>{{$pembimbing1->nama_dosen}}</strong> <br>NIP. {{$pembimbing1->nip}}</td>
                </tr>
            </table>
        </div>     
    </div>
</div>
<div class="page-break"></div>
<div class="container">
    <div class="row">
       <div class="col">
            <p style="text-align: center; font-size: 16px; margin:2px; padding-bottom:2px;"><strong>Lembar Penilaian Bimbingan Skripsi</strong></p>
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
            <br>
            <table class="bimbingan">
                <tr>
                    <th style="width: 55%;">ASPEK YANG DINILAI</th>
                    <th style="width: 20%;">Nilai <br> (Skala 100)</th>
                    <th style="width: 10%;">Bobot (%)</th>
                    <th style="width: 15%;">Nilai x Bobot</th>
                </tr>
                <tr>
                    <td>1. Ketepatan waktu masa bimbingan</td>
                    <td></td>
                    <td style="text-align:center;">10</td>
                    <td></td>
                </tr>
                <tr>
                    <td>2. Kemajuan penelitian mingguan</td>
                    <td></td>
                    <td style="text-align:center;">15</td>
                    <td></td>
                </tr>
                <tr>
                    <td>3. Sikap mahasiswa selama masa bimbingan</td>
                    <td></td>
                    <td style="text-align:center;">20</td>
                    <td></td>
                </tr>
                <tr>
                    <td>4. Sumber dan data pada penelitian dapat dipertanggungjawabkan</td>
                    <td></td>
                    <td style="text-align:center;">20</td>
                    <td></td>
                </tr>
                <tr>
                    <td>5. Kemampuan menggunakan metode penelitian</td>
                    <td></td>
                    <td style="text-align:center;">20</td>
                    <td></td>
                </tr>
                <tr>
                    <td>6. Kemampuan analisis dan menarik kesimpulan</td>
                    <td></td>
                    <td style="text-align:center;">15</td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="3" style="text-align:right;height:35px;"><strong>Nilai total</strong></td>
                    <td style="height:35px;"></td>
                </tr>
            </table>
            <br>
            <table style="width: 100%;">
                <tr>
                    <td style="width: 45%;"></td>
                    <td style="width: 55%;text-align: left;">Surakarta, {{date("d ", strtotime($pendadaran->tanggal))}}
                    {{$monthList[date("M", strtotime($pendadaran->tanggal))]}}{{date(" Y", strtotime($pendadaran->tanggal))}}
                    <br>Pembimbing 2<br><br><br><br><br><strong>{{$pembimbing2->nama_dosen}}</strong> <br>NIP. {{$pembimbing2->nip}}</td>
                </tr>
            </table>
        </div>     
    </div>
</div>