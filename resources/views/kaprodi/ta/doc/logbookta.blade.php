<div class="container">
    <div class="row">
        <div class="col">
        <p style="text-align: center; font-size: 18px;"><strong>Log Book Tugas Akhir Mahasiswa</strong></p>
            <table class="table1" style="width: 100%;">    
                <tr>
                    <td style="width: 15%;">Nama Mahasiswa</td>
                    <td style="width: 3%;">:</td>
                    <td style="width: 82%;"><strong>{{$ta->nama_mhs}}</strong></td>
                </tr>
                <tr>
                    <td>NIM</td>
                    <td>:</td>
                    <td><strong>{{$ta->nim}}</strong></td>
                </tr>
                <tr>
                    <td>Judul</td>
                    <td>:</td>
                    <td><strong>{{$ta->judul}}</strong></td>
                </tr>
                <tr>
                    <td>Dosen Pembimbing</td>
                    <td>:</td>
                    <td><strong>
                    @foreach($pembimbing as $key=>$row)
                        {{$key+1}}. {{$row->nama_dosen}} <br>
                    @endforeach
                    </strong></td>
                </tr>
            </table>
            <br>
            <table class="table2" style="width: 100%;">
                <tr>
                <th style="width: 5%;">No</th>
                <th style="width: 10%;">Tanggal</th>
                <th style="width: 10%;">Nama</th>
                <th style="width: 20%;">Kegiatan</th>
                <th style="width: 10%;">Hubungan Bab</th>
                <th style="width: 10%;">Kendala</th>
                <th style="width: 15%;">Rencana</th>
                <th style="width: 10%;">Komentar Pem.1</th>
                <th style="width: 10%;">Komentar Pem.2</th>
                </tr>
            @foreach ($logbookta as $key=>$row)
            <tr>
                <td>{{ $key+1}}</td>
                <td>
                    {{date('d-m-Y H:i:s',strtotime($row->created_at))}}
                </td>
                <td>
                    {{$row->nama_mhs}}
                </td>
                <td style="text-align:justify;">
                    {{$row->kegiatan}}
                </td>
                <td>
                    @if($row->bab == 1)
                        BAB 1 PENDAHULUAN
                    @elseif($row->bab == 2)
                        BAB 2 TINJAUAN PUSTAKA
                    @elseif($row->bab == 3)
                        BAB 3 METODOLOGI (JALANNYA PENELITIAN)
                    @elseif($row->bab == 4)
                        BAB 4 HASIL DAN PEMBAHASAN
                    @elseif($row->bab == 5)
                        BAB 5 KESIMPULAN
                    @endif
                </td>
                <td>
                    {{$row->kendala}}
                </td>
                <td>
                    {{$row->rencana}}
                </td>
                <td>
                    {{$row->komentar1}}
                </td>
                <td>
                    {{$row->komentar2}}
                </td>
            </tr>
            @endforeach
            </table>     
        </div>     
    </div>
</div>