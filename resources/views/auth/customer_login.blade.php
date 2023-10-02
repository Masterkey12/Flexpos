@extends('layouts.front')

@section('content')
<div class="login-background"></div>
<div class="login-box">
  <div class="login-logo">
    <a href="#">
@if(!empty(setting('logo_path')))
        <img src="{{asset(setting('logo_path'))}}" alt="" height="70px">
        @else
        <img src="{{asset('images/fpos.png')}}" alt="" height="70px">
        @endif

    </a>
  </div>

  <div class="login-box-body">
  @if($errors->any())
		<div class="alert alert-danger">
		<strong>Whoops!</strong> {{__('Il y a eu des problèmes avec vos données.')}}<br><br>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
    <form data-no-ajax action="{{ route('customer-login') }}" method="post" id="login_form">
      @csrf
      <div class="text-center"> <!-- Utilisation de la classe text-center pour centrer horizontalement -->
    <img src="{{ asset('images/up2.png') }}" alt="Logo de l'entreprise" style="width: 100px; height: 100px; margin-bottom: 20px;">
  </div>
      <div class="form-group has-feedback">
        <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" id="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> {{__('Se souvenir de moi')}}
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
		<button type="submit" submit-text="Loading..." class="btn btn-success btn-block">{{__('Connexion')}}</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <div class="social-auth-links text-center">

</div>
<!-- /.social-auth-links -->

<!-- <a href="{{ route('password.request') }}">{{__('I forgot my password')}}</a><br> -->
</div>
<!-- /.login-box-body -->
</div>