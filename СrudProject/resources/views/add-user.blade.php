<!DOCTYPE html>
<html>
<head>
    <title>Добавить пользователя</title>
</head>
<body>
    <h1>Добавить пользователя</h1>
    <form action="{{ url('/store-user') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="surname">Surname:</label>
        <input type="text" id="surname" name="surname" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
