<?php
require_once __DIR__ . '/../lib/autoload.php';
use App\Helper;
use App\Tools;

new App\Template('login','login');

if (isset($_POST["userlogin"])) {
    $LoginController = new App\Controllers\LoginController;

    $LoginController->Get_user($_POST['email'], $_POST['passwd']);
}
?>

<div>
<form method="POST" id="login_form">
        <div>
            <label for="email_value">Email cím: </label>
            <input type="email" name="email" id="email_value" required>
        </div>
        <div>
            <label for="passwd_value">Jelszó:</label>
            <input type="password" name="passwd" id="passwd_value" required>
        </div>
        <button type="submit" name="userlogin">Bejelentkezés</button>
        <div>
            <div><a href="register.php">Regisztráció</a></div>
        </div>
    </form>
</div>