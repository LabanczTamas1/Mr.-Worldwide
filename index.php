<?php
require_once __DIR__ . '/lib/autoload.php';
include './views/components/card.php';
new App\Template('Főoldal', 'home_layout');
$countries = new App\Models\Country;
$continents = new App\Models\Continents;
$cities = new App\Models\City;
$posts = new App\Models\Posts;
$post_collection = null;

$continent_filter = isset($_GET['continents']) ? $_GET['continents'] : 0;
$country_filter = isset($_GET['countries']) ? $_GET['countries'] : 0;
$city_filter = isset($_GET['cities']) ? $_GET['cities'] : 0;

$filter = $continent_filter || $country_filter || $city_filter;
$filters = [];

if ($filter) {
    if ($continent_filter) {
        $filters['continent_id'] = $continent_filter;
    }
    if ($country_filter) {
        $filters['country_id'] = $country_filter;
    }
    if ($city_filter) {
        $filters['city_id'] = $city_filter;
    }

    $post_collection = $posts->filter($filters);
} else {
    $post_collection = $posts->all();
}
?>
<form method="get" class="form filter_form">
    <div class="filter-section">
    <div class="filter-container">
        <select id="continent" class="form-select" name="continents">
            <option value="0">Összes Kontinens</option>
            <?php foreach ($continents->all() as $continent) : ?>
                <option value="<?= $continent->id ?>" class="dropdown-text" <?php if($continent_filter == $continent->id) echo 'selected' ?>><?= $continent->continent_name ?></option>
            <?php endforeach ?>
        </select>
    </div>

    <div class="filter-container">
        <select id="country" class="form-select" name="countries">
            <option value="0">Összes Ország</option>
            <?php foreach ($countries->all() as $country) : ?>
                <option value="<?= $country->id ?>" class="dropdown-text" <?php if($country_filter == $country->id) echo 'selected' ?>><?= $country->country_name ?></option>
            <?php endforeach ?>
        </select>
    </div>

    <div class="filter-container">
        <select id="city" class="form-select" name="cities">
            <option value="0">Összes Város</option>
            <?php foreach ($cities->all() as $city) : ?>
                <option value="<?= $city->id ?>" class="dropdown-text" <?php if($city_filter == $city->id) echo 'selected' ?>><?= $city->city_name ?></option>
            <?php endforeach ?>
        </select>
    </div>
    </div>
</form>
<div class="post-section">
        <?php
        if ($post_collection){
            foreach ($post_collection as $post) {
                $ownsByTheUserBool = $user ? $post->ownsByTheUser($user->id) : false;
                $type = $user ? $user->type :false;
                post_item([
                    'img' => '/files/blog_image/'.$post->image,
                    'title' => $post->postname,
                    'description' => $post->description,
                    'city'=> $cities->getItemBy('id',$post->city_id)->city_name,
                    'slug' =>'/posts/'. $post->slug,
                    'auth' => $ownsByTheUserBool,
                    'like_count' => 15,
                    'dislike_count' => 20,
                    'comment_count' =>30,
                    'type' => $type
                ]);
            }
        }else{
            echo'<p>Legyen ön az első aki feltölt egy blogot</p>';
        }
        ?>
</div>