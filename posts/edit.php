<?php
require_once __DIR__ . '/../lib/autoload.php';
new App\Template('edit','empty');
use App\Helper;
use App\Tools;


$countries = new App\Models\Country;
$cities = new App\Models\City;
$continents = new App\Models\Continents;

$postNameSpace = new App\Models\Posts;
$postItem = $postNameSpace->getItemBy('slug',$_GET['slug']);

$city = $cities->getItemBy('id', $postItem->city_id);
$country = $countries->getItemBy('id', $postItem->country_id);

if (isset($_POST["submit"])) {
    $postUpdate = new App\Controllers\PostController;
    $postUpdate->updatePost($_POST);
    header("Location:/");
}

if(!Helper::isAuth()){
    Tools::flashMessage('Előbb jelentkezzen be!!', 'danger');
    header("Location:/");
}

?>

<h4>Üdv, <?= App\Helper::user()->username ?>!</h4>
<h6>Módosítás</h6>

<form class="upload-form" method="post" enctype="multipart/form-data">
<div class="upload-container">
<label for="image-upload" class="upload-box">
<i class="upload-icon"><i class="fa-solid fa-arrow-up-from-bracket"></i></i>
<span>Kép feltöltése</span>
<input type="file" name="img" id="image-upload"  value="<?=$postItem->image?>" >
</label>
</div>

<select id="continent" class="filter-select">
<option value="0">Összes Kontinens</option>
<?php foreach ($continents->all() as $continent) : ?>
<option <?php if($postItem->continent_id == $continent->id) echo 'selected'?> value=" <?=$continent->id ?>"" class="dropdown-text"><?= $continent->continent_name ?></option>
<?php endforeach ?>
</select>
<input type="text" name="postname" class="form-input" value="<?=$postItem->postname?>"  required/>

<input type="text" name="country" class="form-input" value="<?=$country->country_name?>"  required/>

<input type="text" name="city" class="form-input"  value="<?=$city->city_name?>" required/>

<textarea name="description" class="form-input"required><?=$postItem->description?></textarea>
<input type="text" name="id" hidden value="<?=$postItem->id?>">
<button type="submit" name="submit" class="upload-button">Módosítás</button>
</form>
