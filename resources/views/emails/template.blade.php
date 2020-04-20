@component('mail::message')
# {{ $details['title'] }}

Nama : {{$details['nama']}}

Bab :@if($details['bab'] == 1)
        BAB 1 PENDAHULUAN
    @elseif($details['bab'] == 2)
        BAB 2 TINJAUAN PUSTAKA
    @elseif($details['bab'] == 3)
        BAB 3 METODOLOGI (JALANNYA PENELITIAN)
    @elseif($details['bab'] == 4)
        BAB 4 HASIL DAN PEMBAHASAN
    @elseif($details['bab'] == 5)
        BAB 5 KESIMPULAN
    @endif

Kegiatan :
{{$details['kegiatan']}}

Kendala :
{{$details['kendala']}}

Recana :
{{$details['rencana']}}

@component('mail::button', ['url' => $details['url']])
Lihat Log Book
@endcomponent
   
Thanks,

Portal KPTA
@endcomponent