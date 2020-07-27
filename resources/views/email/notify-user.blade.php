@component('mail::message')
# Hi, {{$data_notify['nama']}}

{{$data_notify['message']}}

Cheers,<br>
{{ config('app.name') }}
@endcomponent