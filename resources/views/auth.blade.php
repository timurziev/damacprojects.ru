<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="{{ Request::root() }}/auth/create">
		<input type="text" placeholder="email" name="email"> <br><br>
		<input type="text" placeholder="name" name="name"> <br><br>
		<input type="password" placeholder="password" name="password"> <br><br>
		<input type="submit">
	</form>
</body>
</html>