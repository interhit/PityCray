<!doctype html>
<html>
	<head>
		<meta charset='utf-8'>
	</head>
	<body>
		
		<h1>All users</h1>
		
		
		@foreach ($users as $user)
		
			<li>{{ $user->name }}</li>
		
		@endforeach
		
	</body>
</html>