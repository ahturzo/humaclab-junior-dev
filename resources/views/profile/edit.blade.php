@extends('layouts.app')

@section('top-link')
	<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>    
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark" style="padding-left: 2.25rem;     line-height: 0.6;">
                    <h3>{{ __('Edit User Details') }}</h3>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('profile.update', encrypt($details->id)) }}">
                        @csrf
            			{{ method_field('patch') }}

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-center">{{ __('User Name:') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus placeholder="{{ $details->name }}">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-center">{{ __('E-Mail ID:') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="{{ $details->email }}">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="datepicker" class="col-md-4 col-form-label text-md-center">{{ __('Date Of Birth:') }}</label>

                            <div class="col-md-6">
                                <input name="birth" id="datepicker" width="100%" placeholder="{{ $details->birth }}">
                            </div>
                        </div>                        

                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-center">{{ __('City:') }}</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" autocomplete="city" autofocus placeholder="{{ $details->city }}">

                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-center">{{ __('Country:') }}</label>

                            <div class="col-md-6">
                                <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" autocomplete="country" autofocus placeholder="{{ $details->country }}">

                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="border: 2px solid #d6c7c7;">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('bottom-js')
	<script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });
    </script>
@endsection