@component('mail::message')
# Hi, {{$data['name']}}

Tinggal satu langkah lagi untuk menjadi pengguna PasTan. Kamu hanya perlu memasukkan kode OTP di bawah ini pada halaman
konfirmasi, lalu tekan submit untuk menjadi pengguna PasTan.
@component('mail::panel')
{{$data['code']}}
@endcomponent

Cheers,<br>
{{ config('app.name') }}
@endcomponent