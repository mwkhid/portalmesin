<div class="container">
    <div class="row">
       <div class="col">
            <p style="text-align: center; font-size: 16px; margin:2px; padding-bottom:2px;"><strong>Lembar Penilaian Seminar Hasil Skripsi</strong></p>
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
            <table class="penilaian">
                <tr>
                    <th style="width: 85%;" colspan="2">Aspek yang dinilai</th>
                    <th style="width: 15%;">Nilai</th>
                </tr>
                <tr>
                    <td rowspan="5" style="width: 5%;text-align: center;"><strong>A.</strong></td>
                    <td style="padding-left:15px;"><strong>Prestasi (maksimum 30)</strong></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="padding-left:15px;">1. Keruntutan materi dan sistematika isi presentasi (maks. 10)</td>
                    <td></td>
                </tr>
                <tr>
                    <td style="padding-left:15px;">2. Cara penyampaian materi (maks. 10)</td>
                    <td></td>
                </tr>
                <tr>
                    <td style="padding-left:15px;">3. Kualitas grafis file presentasi (maks. 5)</td>
                    <td></td>
                </tr>
                <tr>
                    <td style="padding-left:15px;">4. Waktu presentasi (maks. 5)</td>
                    <td></td>
                </tr>
                <tr>
                    <td rowspan="6" style="width: 5%;text-align: center;"><strong>B.</strong></td>
                    <td style="padding-left:15px;"><strong>Makalah skripsi  (maksimum 40)</strong></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="padding-left:15px;">1. Format dan kelengkapan naskah (maks. 10)</td>
                    <td></td>
                </tr>
                <tr>
                    <td style="padding-left:15px;">2. Kedalaman landasan teori (maks. 10)</td>
                    <td></td>
                </tr>
                <tr>
                    <td style="padding-left:15px;">3. Ketepatan menggunakan metode penelitian (maks. 10)</td>
                    <td></td>
                </tr>
                <tr>
                    <td style="padding-left:15px;">4. Ketajaman analisis dan pembahasan (maks. 5)</td>
                    <td></td>
                </tr>
                <tr>
                    <td style="padding-left:15px;">5. Ketepatan penarikan kesimpulan dan saran (maks. 5)</td>
                    <td></td>
                </tr>
                <tr>
                    <td rowspan="4" style="width: 5%;text-align: center;"><strong>C.</strong></td>
                    <td style="padding-left:15px;"><strong>Penguasaan materi  (maksimum 30)</strong></td>
                    <td></td>
                </tr>
                <tr>
                    <td style="padding-left:15px;">1. Kemampuan dan pemahaman materi (maks. 10)</td>
                    <td></td>
                </tr>
                <tr>
                    <td style="padding-left:15px;">2. Ketepatan memberikan jawaban (maks. 10)</td>
                    <td></td>
                </tr>
                <tr>
                    <td style="padding-left:15px;">3. Kualitas jawaban (maks. 10)</td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align:center;height:35px;"><strong>Jumlah</strong></td>
                    <td style="height:35px;"></td>
                </tr>
            </table>
            <br>
            <table style="width: 100%;">
                <tr>
                    <td style="width: 45%;"></td>
                    <td style="width: 55%;text-align: left;">Surakarta, {{date("d ", strtotime($semhas->tanggal))}}
                    {{$monthList[date("M", strtotime($semhas->tanggal))]}}{{date(" Y", strtotime($semhas->tanggal))}}
                    <br>Penguji<br><br><br><br><br><strong>{{$pembimbing1->nama_dosen}}</strong> <br>NIP. {{$pembimbing1->nip}}</td>
                </tr>
            </table>
        </div>     
    </div>
</div>