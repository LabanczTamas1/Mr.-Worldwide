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
$commentNamespace  = new App\Models\Comment;
$comments = $commentNamespace ->getItemsBy('post_id',$post->id);
if($user){
    $isLiked = $user->isLiked($post->id);
    $isDisliked = $user->isUnliked($post->id);
    if (isset($_POST['submit_comment'])) {
        $user->InsertComment($_POST);
        $comments = $commentNamespace->getItemsBy('post_id', $post->id);
    }
    if (isset($_POST['delete_comment'])) {
        $user->DeleteComment($_POST['comment_id']);
        $comments = $commentNamespace->getItemsBy('post_id', $post->id);
    }
    if(isset($_POST['updated_comment'])){
        $user->UpdateComment($_POST['comment_update_text'],$_POST['comment_id']);
        $comments = $commentNamespace->getItemsBy('post_id', $post->id);
    }
}
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
            <?php if ($user): ?>
            <div class="card-footer d-flex justify-content-between">
                <button type="submit" name="like" class="btn btn-outline-primary like <?= $isLiked ? 'liked' : '' ?>">
                    <i class="far fa-thumbs-up"></i>
                </button>
                <button type="submit" class="btn btn-outline-primary">
                    <i class="far fa-comment"></i>
                </button>
                <button type="submit" name="dislike" class="btn btn-outline-primary dislike <?= $isDisliked ? 'disliked' : '' ?>">
                    <i class="far fa-thumbs-down"></i>
                </button>
            </div> 
            <?php endif?>
         <?php if ($comments) :?>
            <?php foreach ($comments as $comment) : ?>
                <form method="POST">
                    <input type="text" hidden name="comment_id" value="<?= $comment->id ?>">
                    <div class="comment">
                        <div class="author-name">
                            <?=$user->getItemById(intval($comment->user_id))->username?>
                        </div>
                        <div class="comment-text">
                        <textarea name="comment_update_text" class="comment-text"> <?= $comment->comment ?></textarea>
                        </div>
                    </div>
                    <?php if ($user) : ?>
                                <?php if ($user->id== $comment->user_id || $usertype == "Developer") : ?>
                                    <div class="input">
                                    <?php if (!isset($_POST['update_comment'])) : ?>
                                        <button type="submit" name="update_comment" class="btn btn-comment-update">Szerkesztés</button>
                                        <?php else : ?>
                                            <button type="submit" name="updated_comment" class="btn btn-comment-update">Szerkesztés</button>
                                        <?php endif; ?>
                                         <button type="submit" name="delete_comment" class="btn btn-delete">Törlés</button>                                     
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                </form>
         <?php endforeach?>
    <?php endif?>
    <?php if (App\Helper::isAuth()): ?>
    <form method="post" class="form">
    <div class="input-wrapper">
        <input type="text" hidden name="post_id" value="<?= $post->id ?>">
        <input type="text" name="comment" class="form-input" placeholder="Comment..." required/>
        <button type="submit" class="submit-btn" name="submit_comment">
            <i class="fa fa-paper-plane"></i>
        </button>
    </div>
    </form>
    <?php endif?>

    <?php if ($user) : ?>
    <script>
        $(document).ready(function() {

            async function postData(url = '', data = {}) {
                const response = await fetch(url, {
                    method: 'POST',
                    cache: 'no-cache',
                    headers: {
                        'Content-Type': 'application/json',
                        "Access-Control-Allow-Origin": "*",
                        "Access-Control-Allow-Credentials": true
                    },

                    body: JSON.stringify(data)
                });
                return response.json();
            }



            let post_has_liked = <?= $isLiked ? "true" : "false" ?>;
            $('button.like').click(function() {
                if (!post_has_liked){
                    postData('like.php', {
                        action: "like",
                        post_id: <?= $post->id ?>
                    }).then(function(response) {
                        if (response.success) {
                            $('button.like').addClass('liked');
                            post_has_liked = !post_has_liked;
                        }
                    })
                }
                else{
                    postData('like.php', {
                        action: "unlike",
                        post_id: <?= $post->id ?>
                    }).then(function(response) {
                        if (response.success) {
                            $('button.like').removeClass('liked');
                            post_has_liked = !post_has_liked;
                        }
                    })
                }

            });   
            
            let post_has_disliked = <?= $isDisliked ? "true" : "false" ?>;
            $('button.dislike').click(function() {
                if (!post_has_disliked){
                    postData('dislike.php', {
                        action: "like",
                        post_id: <?= $post->id ?>
                    }).then(function(response) {
                        if (response.success) {
                            $('button.dislike').addClass('disliked');
                            post_has_disliked = !post_has_disliked;
                        }
                    })
                }
                else{
                    postData('dislike.php', {
                        action: "unlike",
                        post_id: <?= $post->id ?>
                    }).then(function(response) {
                        if (response.success) {
                            $('button.dislike').removeClass('disliked');
                            post_has_disliked = !post_has_disliked;
                        }
                    })
                }

            });        
        });
    </script>
<?php endif; ?>

