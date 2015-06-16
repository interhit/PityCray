@extends('layouts.default')


@section('title')
Login page - {{ env('SITE_NAME') }}
@endsection

@section('heading')
{{ Lang::get('misc.pages.login') }}
@endsection

@section('body-class')login-page @endsection

@section('content')
<div id="main">
	<div class="form-panel" id="login-panel">
		<div class="container">
			<div class="col-md-12">
				<p>Pentru resetarea parolei te rugam sa-ti introdu e-mail-ul.</p>

					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<p><strong>Whoops!</strong> There were some problems with your input.</p><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li><p>{{ $error }}</p></li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="login-form" role="form" method="POST" action="{{ url('/auth/login') }}" id="login-form">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						
						<fieldset class="icon-input email-icon">
							<input type="email" placeholder="E-mail" name="email" value="{{ old('email') }}" required />
						</fieldset>

						<fieldset class="icon-input pass-icon">
							<input type="password" name="password" placeholder="Parola" required/>
						</fieldset>

							<label style="color:#fff;">
								<input type="checkbox" name="remember" style="width:50px;"> Remember Me
							</label>

						<button type="submit" class="btn red-btn">GO</button>
					</form>
			</div>
		</div>
	</div>
</div>
@endsection
