@component('mail::message')
Hello!
<br/>
{{ $nama }}
<br/>
Terimakasih Pembuatan Akun Siswa Sudah Berhasil !

<br/>
<br/>
Diharapkan Siswa Login untuk mengisi biodata dan persyaratan berkas
@component('mail::button', ['url' => url('/')])
Lengkapi Formulir Pendaftaran
@endcomponent

Terimakasih,<br>
SMP MUHAMMADIYAH 3 BANDUNG
@endcomponent