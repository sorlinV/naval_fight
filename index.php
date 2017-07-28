<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Naval Fight</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        button {
            border: 1px solid black;
            height: 3em;
            width: 3em;
        }
    </style>
</head>
<body>
<?php if (!empty($_SESSION['user'])) : ?>
    <form action="action.php" method="POST">
        <input type="button" value="Deco">
    </form>
    <button id="orientation">Vertical</button>
    <div id="board"></div>
    <script src="Classes/Boat.js"></script>
    <script src="place_boat.js"></script>
<?php else : ?>
    <form action="action.php" method="POST">
        <label for="name">Username:</label>
        <input type="text" name="name">
        <label for="password">Password:</label>
        <input type="password" name="password">
        <label for="password2">Confirm Password:</label>
        <input type="password" name="password2">
        <input type="button" value="Register">
    </form>
    <form action="action.php" method="POST">
        <label for="name">Username:</label>
        <input type="text" name="name">
        <label for="password">Password:</label>
        <input type="password" name="password">
        <input type="button" value="Connect">
    </form>
<?php endif; ?>
</body>
</html>