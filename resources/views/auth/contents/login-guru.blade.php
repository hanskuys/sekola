@extends('auth.base')
@section('content')
<h1 class="auth-title">Log in Guru</h1>

<form action="{{ route('guru.login') }}" method="POST">
    @csrf

    
    <x-input-field type="text" id="val-email" name="email" label="Alamat Email" placeholder="Masukan Email" :required="true" 
    value="{{ old('email') }}"/>

    <x-input-field type="password" id="val-password" name="password" label="Password" placeholder="Masukan Password" :required="true" />

    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
</form>
@endsection