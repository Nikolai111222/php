<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="action.php" method="post">
        <input
            type="text"
            name="username"
            placeholder="имя"
            required
            minlength="3"
        >
        <input
            type="password"
            name="password"
            placeholder="пароль"
            required
            minlength="8"
        >
        <input
            type="email"
            name="email"
            placeholder="email"
        >
        <input
            type="submit"
            value="отправить"
        >
    </form>
</body>
</html>


