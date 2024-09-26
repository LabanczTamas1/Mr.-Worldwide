<?php
require_once __DIR__ . '/../../lib/autoload.php';
new App\Template('login','empty');
?>
 <main class="container">
 <h4>Üdv, <?= App\Helper::user()->username ?>!</h4>
    <a href="/../user/uploads.php">Új poszt</a>
    </main>
