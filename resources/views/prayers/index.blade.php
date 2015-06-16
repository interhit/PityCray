<!doctype html>
<html>
	<head>
		<meta charset='utf-8'>
	</head>
	<body>
		
		<h1>All prayers</h1>
		
		
		@foreach ($prayers as $prayer)
			
			$user = User::find($prayer->user)
			<li>{{ $prayer->id }} - {{ $user->username }}</li>
		
		@endforeach
		
	</body>
</html>