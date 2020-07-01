<div class="container">
    <div class="row">
       <div class="col">
            <p style="text-align: center; font-size: 16px; margin:2px; padding-bottom:2px;"><strong>FORMULIR PERSETUJUAN SEMINAR HASIL SKRIPSI</strong></p>
            <p style="text-align: left;">Saya yang bertanda tangan di bawah ini bermaksud melaksanakan seminar hasil skripsi: </p>
            <table style="width: 100%">    
                <tr>
                    <td style="width: 3%;"></td>
                    <td style="width: 25%;">Nama/NIM</td>
                    <td style="width: 3%;">:</td>
                    <td style="width: 67%;text-transform: capitalize;">{{$data->nama_mhs}} / {{$data->nim}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Hari, tanggal</td>
                    <td>:</td>
                    <td>{{$dayList[date("D", strtotime($semhas->tanggal))]}}, 
                    {{date("d ", strtotime($semhas->tanggal))}}
                    {{$monthList[date("M", strtotime($semhas->tanggal))]}}
                    {{date(" Y", strtotime($semhas->tanggal))}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Jam</td>
                    <td>:</td>
                    <td>{{date("H.i ", strtotime($semhas->jam_mulai))}} - {{date("H.i ", strtotime($semhas->jam_selesai))}}</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Ruangan</td>
                    <td>:</td>
                    <td>{{$semhas->nama_ruang}}</td>
                </tr>
            </table>
            <br>
            <table style="width: 100%;">
                <tr>
                    <td style="width: 50%;text-align: left;"></td>
                    <!-- <td style="width: 50%;text-align: left;"><br>Persetujuan Ruangan<br><br><br>{{$staff->nama_dosen}}<br>NIP. {{$staff->nip}}</td> -->
                    <td style="width: 50%;text-align: left;">Surakarta, {{date("d ", strtotime($semhas->updated_at))}}
                    {{$monthList[date("M", strtotime($semhas->updated_at))]}}{{date(" Y", strtotime($semhas->updated_at))}}
                    <br>Pemohon<br><br><br>{{$data->nama_mhs}}<br>NIM. {{$data->nim}}</td>
                </tr>
                <tr>
                    <td style="width: 50%;text-align: left;">Menyetujui<br>Pembimbing 1<br><br><br>{{$pembimbing1->nama_dosen}}<br>NIP. {{$pembimbing1->nip}}</td>
                    <td style="width: 50%;text-align: left;"><br>Pembimbing 2<br><br><br>{{$pembimbing2->nama_dosen}}<br>NIP. {{$pembimbing2->nip}}</td>
                </tr>
            </table>
            <hr style="border: 1px solid black;">
            <p style="text-align: left;margin-top:0px;margin-bottom:0px;"><strong>Kesediaan hadir Penguji</strong></p>
            <table class="persetujuan">
                <tr>
                    <th style="width: 5%;">No</th>
                    <th style="width: 60%;">Nama</th>
                    <th style="width: 35%;" colspan="2">Tanda Tangan</th>
                </tr>
                @foreach($pembimbing as $index=>$pembimbings)
                <tr>
                    <td style="text-align: center;">{{$index+1}}</td>
                    <td>{{$pembimbings->nama_dosen}}<br>NIP. {{$pembimbings->nip}}</td>
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
            <br>
            <table style="width: 100%;">
                <tr>
                    <td style="width: 50%;text-align: left;vertical-align: text-top;"> <strong>KELENGKAPAN ADMINISTRASI :</strong>
                        <br>&#9633; 1. Lembar Konsultasi
                        <br>&#9633; 2. Log Book
                        <br>&#9633; 3. Bukti keikutsertaan Seminar Hasil
                        <br>&#9633; 4. Naskah skripsi 5 eksemplar
                        <!-- <ul style="list-style: square; padding: 10px;">
                            <li>Lembar Konsultasi</li>
                            <li>Log Book</li>
                            <li>Bukti keikutsertaan Seminar Hasil</li>
                            <li>Naskah skripsi 5 eksemplar</li>
                        </ul> -->
                    </td>
                    <td style="width: 50%;text-align: left;vertical-align: text-top;">{{$jabatan->nama_jabatan}}<br><br><br><br>{{$jabatan->nama_dosen}}<br>NIP. {{$jabatan->nip}}</td>
                </tr>
            </table>
        </div>     
    </div>
</div>