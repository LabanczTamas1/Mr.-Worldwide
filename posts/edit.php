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
<h6>Módosítás</h6>

<form class="upload-form" method="post" enctype="multipart/form-data">
    <div class="upload-container">
        <label for="image-upload" class="upload-box">
            <i class="upload-icon"><i class="fa-solid fa-arrow-up-from-bracket"></i></i>
            <span>Kép feltöltése</span>
            <input type="file" name="image" id="image-upload" style="display: none;" required/>
        </label>
    </div>
    
    <select name="continent" id="continent" class="filter-select" required>
        <option value="" disabled selected hidden>Kontinens</option> <!-- Placeholder option -->
        <option value="Európa">Európa</option>
        <option value="Ázsia">Ázsia</option>
        <option value="Afrika">Afrika</option>
        <option value="Észak-Amerika">Észak-Amerika</option>
        <option value="Dél-Amerika">Dél-Amerika</option>
        <option value="Ausztrália">Ausztrália</option>
        <option value="Antarktisz">Antarktisz</option>
    </select>

    <input type="text" name="country" class="form-input" placeholder="Ország" required/>
    
    <input type="text" name="city" class="form-input" placeholder="Város" required/>
    
    <textarea name="description" class="form-input" placeholder="Leírás" required></textarea>
    
    <button type="submit" name="submit" class="upload-button">Feltöltés</button>
</form>
