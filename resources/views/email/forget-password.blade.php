@component('mail::message')
# Hello, {{$data_user_forget_pass['name']}}

Anda telah menerima email ini karena telah meminta untuk mereset kata sandi akun anda. <br>
Silahkan salin 6 digit angka dibawah ini kemudian masukkan ke kolom yang meminta inputan 6 digit angka. <br>
Anda bisa abaikan apabila tidak meminta untuk mereset akun anda.

@component('mail::button', ['url' => ''])
{{$data_user_forget_pass['code']}}
@endcomponent

Terima kasih,<br>
{{ config('app.name') }}
@endcomponent