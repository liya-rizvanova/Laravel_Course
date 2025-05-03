<!DOCTYPE html>
<html>
<head>
    <title>Форма пользователя</title>
</head>
<body>
    <h1>Введите ваши данные</h1>

    <form method="POST" action="/store_form">
        @csrf
        <label for="first_name">Имя:</label><br>
        <input type="text" name="first_name" required><br><br>

        <label for="last_name">Фамилия:</label><br>
        <input type="text" name="last_name" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" name="email" required><br><br>

        <button type="submit">Submit</button>
    </form>

</body>
</html>
