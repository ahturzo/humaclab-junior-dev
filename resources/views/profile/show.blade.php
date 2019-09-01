@extends('layouts.app')

@section('top-link')
	<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
    <!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> -->
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<style>

		body {
		  background: #F1F3FA;
		}

		/* Profile container */
		.profile {
		  margin: 20px 0;
		}

		/* Profile sidebar */
		.profile-sidebar {
		  padding: 20px 0 10px 0;
		  background: #fff;
		}

		.profile-userpic img {
		  float: none;
		  margin: 0 auto;
		  width: 50%;
		  height: 50%;
		  -webkit-border-radius: 50% !important;
		  -moz-border-radius: 50% !important;
		  border-radius: 50% !important;
		}

		.profile-usertitle {
		  text-align: center;
		  margin-top: 20px;
		}

		.profile-usertitle-name {
		  color: #5a7391;
		  font-size: 16px;
		  font-weight: 600;
		  margin-bottom: 7px;
		}

		.profile-usertitle-job {
		  text-transform: uppercase;
		  color: #5b9bd1;
		  font-size: 12px;
		  font-weight: 600;
		  margin-bottom: 15px;
		}

		.profile-userbuttons {
		  text-align: center;
		  margin-top: 10px;
		}

		.profile-userbuttons .btn {
		  text-transform: uppercase;
		  font-size: 11px;
		  font-weight: 600;
		  padding: 6px 15px;
		  margin-right: 5px;
		}

		.profile-userbuttons .btn:last-child {
		  margin-right: 0px;
		}

		/* Profile Content */
		.profile-content {
		  padding: 20px;
		  background: #fff;
		  min-height: 460px;
		}

		.details{
			margin: 15px;
		}
    </style>
@endsection('top-link')

@section('content')
	<div class="container">
    <div class="row profile justify-content-md-center">
        <div class="col-md-6 col-sm-8">
          <div class="profile-sidebar">
            <!-- SIDEBAR USERPIC -->
            <div class="profile-userpic">
                <img src="https://cdn2.iconfinder.com/data/icons/ios-7-icons/50/user_male2-512.png" class="rounded mx-auto d-block">
            </div>

            <div class="profile-usertitle">
                <div class="profile-usertitle-name">
                  {{ $details->name }}
                </div>
                <div class="profile-usertitle-job">
                  
                </div>
            </div>
            
        	<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
	            <div class="container">
	            	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-2" aria-controls="navbar-2" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
	                <div class="collapse navbar-collapse" id="navbar-2">
	                    <!-- Left Side Of Navbar -->
	                    <ul class="navbar-nav mr-auto">

	                    </ul>

	                    <ul class="navbar-nav ml-auto">
	                        <li class="nav-item">
	                            <a class="nav-link" href="{{ route('profile.edit', encrypt($details->id)) }}">{{ __('Edit Details') }}</a>
	                        </li>
	                        <li class="nav-item">
	                            <a class="nav-link" href="{{ route('profile.change-pass', encrypt($details->id)) }}">{{ __('Change Password') }}</a>
	                        </li>
	                    </ul>
	                </div>
	            </div>
	        </nav>

            <div class="row">
            	<div class="col">
            		<div class="row details">
            			<div class="col-md-4"><strong>Email:</strong></div>
            			<div class="col-md-8"><strong>{{ $details->email }}</strong></div>
            		</div>
            		<div class="row details">
            			<div class="col-md-4"><strong>Date of Birth:</strong></div>
            			<div class="col-md-8"><strong>{{ \Carbon\Carbon::parse($details->birth)->format('D, F d Y') }}</strong></div>
            		</div>
            		<div class="row details">
            			<div class="col-md-4"><strong>City:</strong></div>
            			<div class="col-md-8"><strong>{{ $details->city }}</strong></div>
            		</div>
            		<div class="row details">
            			<div class="col-md-4"><strong>Country:</strong></div>
            			<div class="col-md-8"><strong>{{ $details->country }}</strong></div>
            		</div>
            		<div class="row">
            			<form class="col" action="{{ route('profile.destroy', encrypt($details->id)) }}" method="POST">
	                        {{ csrf_field() }}
	                        <input type="hidden" name="_method" value="Delete">
	                        <button type="submit" class="btn btn-danger float-right">Delete Account Permanently</button>
	                    </form>
	            	</div>
            	</div>
            	
            </div>

          </div>
        </div>
    </div>
</div>
<br>
<br>
@endsection

