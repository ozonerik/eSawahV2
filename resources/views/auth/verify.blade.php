@extends('layouts.guest')

@section('content')
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="/" class="h1"><b>Admin</b>LTE</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">{{ __('Verify Your Email Address') }}</p>
      @if (session('resent'))
        <div class="alert alert-success" role="alert">
            {{ __('A fresh verification link has been sent to your email address.') }}
        </div>
      @endif

      {{ __('Before proceeding, please check your email for a verification link.') }}
      {{ __('If you did not receive the email') }},

      <form method="POST" action="{{ route('verification.resend') }}">
      @csrf
        <div class="row">
          <!-- /.col -->
          <div class="col-12 mt-3">
            <button type="submit" class="btn btn-primary btn-block">{{ __('click here to request another') }}</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mt-3">
      <a href="{{ route('logout') }}" class="text-center" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Sign Out') }}</a>
      </p>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->
@endsection
