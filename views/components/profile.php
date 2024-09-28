<?php
require_once __DIR__ . '/../../lib/autoload.php';
new App\Template('login', 'empty');

$counteries = new App\Models\Country;
$continents = new App\Models\Continents;
$cities = new App\Models\City;
?>

<main class="container">
    <!-- Üdvözlő üzenet -->
    <h4>Üdv, <?= App\Helper::user()->username ?>!</h4>

      <!-- Új poszt gomb -->
      <div class="account-container" style="background-color: black;margin-bottom: 10px; color:white;  width: 200px; border-radius: 100px;">
         <a class="navbar-brand" href="/../posts/create.php" style="display:flex; justify-content: space-evenly; text-decoration: none; color: white;">
            <h4 style="padding-top:8px; padding-left:8px;">Új poszt</h4>
         </a>
    </div>
    
    <!-- Posztok szekció címe -->
    <h3 class="section-title">Posztjaim</h3>

  

    <!-- Szűrők szekció -->
    <div class="filter-section">
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

        <div class="filter-container">
            <form method="get" class="form">
                <select id="country" class="filter-select">
                    <option value="0">Összes Ország</option>
                    <?php foreach ($counteries->all() as $country) : ?>
                        <option value="<?= $country->id ?>" class="dropdown-text"><?= $country->country_name ?></option>
                    <?php endforeach ?>
                </select>
            </form>
        </div>

        <div class="filter-container">
            <form method="get" class="form">
                <select id="city" class="filter-select">
                    <option value="0">Összes Város</option>
                    <?php foreach ($cities->all() as $city) : ?>
                        <option value="<?= $city->id ?>" class="dropdown-text"><?= $city->city_nam ?></option>
                    <?php endforeach ?>
                </select>
            </form>
        </div>
    </div>

    <!-- Posztok megjelenítése -->
    <div class="posts-section">
        <!-- Posztok kerülnek ide -->
    </div>
</main>
