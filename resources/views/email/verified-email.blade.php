@component('mail::message')
# Selamat datang, {{$data['name']}}

Terima kasih telah mendaftar di PasTan!. Ada langkah terakhir yang anda harus lakukan yaitu <br>
menyalin 6 digit angka dikotak biru bawah ini kemudian masukkan di kolom yang meminta inputan 6 digit angka. <br>
Langkah ini berfungsi untuk memastikan bahwa email anda masukkan adalah valid.

@component('mail::button', ['url' => ''])
{{$data['code']}}
@endcomponent

Terima kasih,<br>
{{ config('app.name') }}
@endcomponent