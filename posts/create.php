<?php
require_once __DIR__ . '/../lib/autoload.php';
new App\Template();
?>

<h4>Üdv, <?= App\Helper::user()->username ?></h4>
    <h6>Feltötlés</h6>

<form class="upload-form" method="POST">
    <div class="upload-container">
        <label for="image-upload" class="upload-box">
            <i class="upload-icon"><i class="fa-solid fa-arrow-up-from-bracket"></i></i>
            <span>Kép feltöltése</span>
            <input type="file" id="image-upload" style="display: none;" />
        </label>
    </div>
    <div class="filter-container">
    <form method="get" class="form">
        <select id="continent" class="filter-select">
            <option value="0">Összes Kontinens</option>
            <?php foreach ($continents->all() as $continent) : ?>
                <option value="<?= $continent->id ?>" class="dropdown-text"><?= $continent->continent_name ?></option>
            <?php endforeach ?>
        </select>
    </form>
</div>


    
    <input type="text" class="form-input" placeholder="Ország" />
    
    <input type="text" class="form-input" placeholder="Város" />
    
    <textarea class="form-input" placeholder="Leírás"></textarea>
    
    <button type="submit" class="upload-button">Feltöltés</button>
</form>
