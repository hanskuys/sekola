@extends('dashboard.guru.base')
@section('content')
<div class="page-heading d-flex justify-content-between items-center">
    <h3>Akun {{$data->nama}}</h3>
</div>

<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="/guru/akun/{{ $data->id }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                        
                    <div class="form-group">
                        <label for="basicInput">Email</label>
                        <input type="text" readonly disabled class="form-control" value="{{ $data->email }}" id="basicInput">
                    </div>

                    <div class="form-group">
                        <label for="basicInput">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="basicInput" placeholder="Enter Password">
                        @error('password')
                        <div class="invalid-feedback">
                            <i class="bx bx-radio-circle"></i>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="basicInput">Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror" id="basicInput" placeholder="Enter Confirm Password">
                        @error('confirm_password')
                        <div class="invalid-feedback">
                            <i class="bx bx-radio-circle"></i>
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{asset("assets/extensions/choices.js/public/assets/styles/choices.css")}}">
@endpush

@push('scripts')
<script src="{{ asset("assets/extensions/choices.js/public/assets/scripts/choices.js") }}"></script>
<script src="{{ asset("assets/js/pages/form-element-select.js") }}"></script>
@endpush