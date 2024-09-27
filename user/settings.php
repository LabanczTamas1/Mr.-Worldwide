<?php
require_once __DIR__ . '/../lib/autoload.php';
new App\Template();
use App\Controllers\UploadController;

if (isset($_POST["submit"])) {
    $upload = new UploadController();
    $upload->InsertPost($_POST, $_FILES); // Pass both POST and FILES to handle image upload and form data
}
?>

<h4>Üdv, <?= App\Helper::user()->username ?>!</h4>
<h6>Fiók műveletek</h6>

<div class="settings-container">
<form class="upload-form" method="post" enctype="multipart/form-data">
    <h5>Felhasználónév megváltoztatása</h5>
    <input type="text" name="city" class="form-input" placeholder="Város" required/>
    <button type="submit" name="submit" class="upload-button">Megváltoztatása</button>
</form>
<div class="line"></div>
<form class="upload-form" method="post" enctype="multipart/form-data">
    <h5>Jelszó megváltoztatása</h5>
    <input type="text" name="city" class="form-input" placeholder="Város" required/>
    <button type="submit" name="submit" class="upload-button">Megváltoztatása</button>
</form>
</div>
<button type="submit" class="upload-button" id="account-delete-button"><a href="/userhandle/logout">Fiókom törlése</a></button>

