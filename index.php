<?php
require_once __DIR__ . '/lib/autoload.php';
include './views/components/card.php';
new App\Template('Főoldal', 'home_layout');
$counteries = new App\Models\Country;
$continents = new App\Models\Continents;
$cities = new App\Models\City;
$uploaded_posts = new App\Models\Posts;
$posts = $uploaded_posts->all();
print_r($_POST)
?>
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
                <option value="<?= $country->id ?>" class="dropdown-text"><?= $country->counry_name ?></option>
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

<div class="post-section">
        <?php
        if ($posts){
            foreach ($posts as $post) {
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