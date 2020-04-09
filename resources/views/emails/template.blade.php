@component('mail::message')
# {{ $details['title'] }}

{{$details['nama']}}

{{$details['kegiatan']}}

{{$details['bab']}}

{{$details['kendala']}}

{{$details['rencana']}}

@component('mail::button', ['url' => $details['url']])
Button Text
@endcomponent
   
Thanks,

Portal KPTA
@endcomponent