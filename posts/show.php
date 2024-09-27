<?php
require_once __DIR__ . '/../lib/autoload.php';
new App\Template('_', 'empty');
?>

<div class="card-element">
    <img src="https://via.placeholder.com/1296x734" class="card-img-to" alt="Patagonia Map">
            <div class="information-segment">
            <h5 class="card-author">Teszt Elek</h5>
                <h5 class="card-title">Nyaralas</h5>
                <small class="text-muted">
                    <i class="fas fa-map-marker-alt">California Baby</i>
                </small>
            </div>
            <div class="post-description">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
            </div>
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




</div>