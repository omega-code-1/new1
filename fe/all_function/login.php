<?php
require_once ('func.php');
session_start();
$a = new pageLogin;
$tempPopUpMessageAPI = $a->aksesLoginPelanggan();
?>

<!-- tampilan webnya -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STEAK 365 | Login</title>
    <link rel="stylesheet" href="css/base.login.css">
    <link href="https://fonts.googleapis.com/css2?family=Bruno+Ace+SC&display=swap" rel="stylesheet">
</head>

<body>
    <div class="content-body">
        <div class="brand">
            <div class="brand1">
                <div class="brand2">
                    STEAK 365
                </div>
            </div>
        </div>
        <div class="a1">
            <div class="a2">
                <button type="button" class="btn-toggle-login actv">Login</button>
                <!-- <button type="button" class="btn-toggle-regis">Regis</button> -->
            </div>
            <div class="a3">
                <form action="" method="POST" class="formL">
                    <label for="username" class="l1">Username</label>
                    <input type="text" name="username" class="up1" required>
                    <label for="password" class="l1">Password</label>
                    <input type="password" name="password" class="up1" required>
                    <button type="submit" name="submit" class="submitL" id="submit1">GO!</button>
                </form>
                <form action="" method="POST" class="formR" style="display: none;">
                    <label for="username" class="l1">Create Username</label>
                    <input type="text" name="username" class="up1" required>
                    <label for="password1" class="l1">Create Password</label>
                    <input type="password" name="password" class="up1" required>
                    <label for="password2" class="l1">Confirm Password</label>
                    <input type="password" name="password2" class="up1" required>
                    <button type="submit" name="submit" class="submitL" id="submit2">Regis</button>
                </form>
            </div>
        </div>
        <div class="popUpMessageAPI"><?= $tempPopUpMessageAPI ?></div>
        <a href="/fe" class="back-home">Back home</a>

        <script src="js/base.login.js"></script>
    </div>
</body>

</html>