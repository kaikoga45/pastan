@component('mail::message')
# Hi, {{$data_user_forget_pass['name']}}
Tinggal satu langkah lagi untuk mereset kata sandimu. Kamu hanya perlu memasukkan kode OTP di bawah ini pada halaman
konfirmasi, lalu reset kata sandimu.

@component('mail::panel')
{{$data_user_forget_pass['code']}}
@endcomponent

Cheers,<br>
{{ config('app.name') }}
@endcomponent