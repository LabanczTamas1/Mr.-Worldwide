<?php
require_once __DIR__ . '/../lib/autoload.php';
new App\Template();
?>

<h4>Üdv, <?= App\Helper::user()->username ?>!</h4>
    <h6>Feltötlés</h6>

<form class="upload-form">
    <div class="upload-container">
        <label for="image-upload" class="upload-box">
            <i class="upload-icon"><i class="fa-solid fa-arrow-up-from-bracket"></i></i>
            <span>Kép feltöltése</span>
            <input type="file" id="image-upload" style="display: none;" />
        </label>
    </div>
    
    <select id="continent" class="filter-select">
        <option value="" disabled selected hidden>Kontinens</option> <!-- Placeholder option -->
        <option value="Európa">Európa</option>
        <option value="Ázsia">Ázsia</option>
        <option value="Afrika">Afrika</option>
        <option value="Észak-Amerika">Észak-Amerika</option>
        <option value="Dél-Amerika">Dél-Amerika</option>
        <option value="Ausztrália">Ausztrália</option>
        <option value="Antarktisz">Antarktisz</option>
    </select>

    
    <input type="text" class="form-input" placeholder="Ország" />
    
    <input type="text" class="form-input" placeholder="Város" />
    
    <textarea class="form-input" placeholder="Leírás"></textarea>
    
    <button type="submit" class="upload-button">Feltöltés</button>
</form>
