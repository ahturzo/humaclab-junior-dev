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
                    <h3>{{ __('User Registration') }}</h3>
                    <p style="color: white;">register here to become a member of our website.</p>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-center">{{ __('User Name:') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-center">{{ __('Password:') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="datepicker" class="col-md-4 col-form-label text-md-center">{{ __('Date Of Birth:') }}</label>

                            <div class="col-md-6">
                                <input name="birth" id="datepicker" width="100%">
                            </div>
                        </div>                        

                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-center">{{ __('City:') }}</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>

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
                                <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" required autocomplete="country" autofocus>

                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-center"></label>

                            <div class="col-md-6">
                                <h6 style="color: #02325f;">Terms & Conditions</h6>
                                <p><small>Agreed and consent to our <strong style="color: red;"><u>Terms & Service</u>,</strong> and End User License Agreement.</small></p>
                                <div class="form-group" style="display: -webkit-inline-box;">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio1" name="agree" value="agree" class="custom-control-input" checked="">
                                        <label class="custom-control-label" for="customRadio1" style="margin-right: 5px;">I Agree</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio2" name="agree" value="not_agree" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio2">I Do Not Agree</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="border: 2px solid #d6c7c7;">
                                    {{ __('CREATE NEW ACCOUNT') }}
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
