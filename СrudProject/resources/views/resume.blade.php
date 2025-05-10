<!DOCTYPE html>
<html>
<head>
    <title>Резюме пользователя</title>
</head>
<body>
    <h1>Резюме</h1>
    <p><strong>Имя:</strong> {{ $user->name }}</p>
    <p><strong>Фамилия:</strong> {{ $user->surname }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
</body>
</html>
