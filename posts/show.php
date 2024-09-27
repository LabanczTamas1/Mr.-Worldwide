<?php
global $user;
require_once __DIR__ . '/../lib/autoload.php';
new App\Template('_', 'empty');
$posts = new App\Models\Posts;
$country = new App\Models\Country;
$city = new App\Models\City;
$post = $posts->getItemBy('slug',$_GET['slug']);
$author = new App\Models\User;
$author->getItemBy('id',$post->user_id);
$post_city = $city->getItemBy('id',$post->city_id);
?>

<div class="card-element">
    <img src="../files/blog_image/<?= $post->image ?>" class="card-img-to" alt="<?=$post_city->city_name?> Map">
            <div class="information-segment">
            <h5 class="card-author"><?=$author->username?></h5>
                <h5 class="card-title">Nyaralas</h5>
                <small class="text-muted">
                    <i class="fas fa-map-marker-alt"><?=$post->postname?></i>
                </small>
            </div>
            <div class="post-description">
            <?=$post->description?>
            <div class="card-footer d-flex justify-content-between">
                <button type="button" class="btn btn-outline-primary">
                    <i class="far fa-thumbs-up"></i>
                </button>
                <button type="button" class="btn btn-outline-primary">
                    <i class="far fa-comment"></i>
                </button>
                <button type="button" class="btn btn-outline-primary">
                    <i class="far fa-thumbs-down"></i>
                </button>
            </div> 
    
    <div class="comment">
        <div class="author-name">
            Andrew Attie
        </div>
        <div class="comment-text">
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
        </div>
    </div>
    <form method="get" class="form">
    <div class="input-wrapper">
        <input type="text" name="comment" class="form-input" placeholder="Comment..." required/>
        <button type="submit" class="submit-btn">
            <i class="fa fa-paper-plane"></i>
        </button>
    </div>
</form>