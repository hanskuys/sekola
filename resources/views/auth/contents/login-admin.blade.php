@extends('auth.base')
@section('content')
<h1 class="auth-title">Log in Admin</h1>

<form action="{{ route('admin.login') }}" method="POST">
    @csrf

    <x-input-field type="text" id="val-email" name="email" label="Alamat Email" placeholder="Masukan Email" :required="true" 
    value="{{ old('email') }}"/>

    <x-input-field type="password" id="val-password" name="password" label="Password" placeholder="Masukan Password" :required="true" />

    <button class="btn btn-primary btn-block btn-lg shadow-lg">Log in</button>
</form>
@endsection