@extends('layouts.default')

@section('content')

<!-- Main section -->
<div id="main">

	<div class="form-panel" id="register-panel">
		<div class="container">
			
			<div class="col-md-12">
							
				<div class="panel-heading">Register</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<p><strong>{{ Lang::get('forms.register.failed') }}</strong></p><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li><p>{{ $error }}</p></li>
								@endforeach
							</ul>
						</div>
					@endif

					<form role="form" method="POST" action="{{ url('/auth/register') }}" class="login-form" id="register-form">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<fieldset class="icon-input profile-icon">
							<input type="text" name="name" value="{{ old('name') }}" placeholder="{{ Lang::get('forms.register.name') }}" required>
						</fieldset>

						<fieldset class="icon-input email-icon">
								<input type="email" name="email" value="{{ old('email') }}" placeholder="{{ Lang::get('forms.register.email') }}" required>
						</fieldset>

						<fieldset class="icon-input pass-icon">
								<input type="password" name="password" placeholder="{{ Lang::get('forms.register.password') }}" required>
						</fieldset>

						<fieldset class="icon-input pass-icon">
								<input type="password" name="password_confirmation" placeholder="{{ Lang::get('forms.register.confirm_password') }}" required>
						</fieldset>

						<button type="submit" class="btn red-btn">{{ Lang::get('forms.register.submit') }}</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
