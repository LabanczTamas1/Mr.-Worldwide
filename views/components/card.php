<?php
function post_item(array $post)
{
?>
    <div class="card-element" onclick="document.navigateTo('<?= $post['slug'] ?>')">
        <img src="<?=$post['img']?>" class="card-img-to" alt="<?= $post['title'] ?>">
        
        <div class="card-body">
            <h5 class="card-title"><?= $post['title'] ?></h5>
            <small class="text-muted">
                <i class="fas fa-map-marker-alt"></i> <?= $post['city'] ?>
            </small>
            <p class="card-text"><?= substr($post['description'], 0, 12) ?></p>
            
            <div class="card-footer d-flex justify-content-between">
                <button type="button" class="btn btn-outline-primary">
                    <i class="far fa-thumbs-up"></i> <?= $post['like_count']; ?>
                </button>
                <button type="button" class="btn btn-outline-primary">
                    <i class="far fa-comment"></i> <?= $post['comment_count']; ?>
                </button>
                <button type="button" class="btn btn-outline-primary">
                    <i class="far fa-thumbs-down"></i> <?= $post['dislike_count']; ?>
                </button>
                
                <?php if (App\Helper::isAuth()): ?>
                    <?php if ($post['auth'] || $post['type'] == 'Developer'): ?>
                        <a href="<?= $post['slug'] ?>/edit.php">módosítás</a>
                        <a href="<?= $post['slug'] ?>/delete.php">törlés</a>
                    <?php endif ?>
                <?php endif ?>
            </div>
        </div> 
    </div>
<?php
}
?>
