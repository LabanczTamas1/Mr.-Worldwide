<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<div class="card-element">
    <img src="https://via.placeholder.com/776x439" class="card-img-to" alt="Patagonia Map">
    <div class="card-body">
        <h5 class="card-title"><?= $username = 'Andrew Attie'; ?></h5>
        <small class="text-muted"><i class="fas fa-map-marker-alt"></i> <?= $location = 'Patagonia'; ?></small>
    </div>
    <p class="card-text">Find out the amazing view of this paradise! The waters, the mountains, all the beauty of Patagonia and the Country...</p>
    <div class="card-footer d-flex justify-content-between">
   
        <div>
            <button type="button" class="btn btn-outline-primary">
                <i class="far fa-thumbs-up"></i> <?= $likes = 15; ?>
            </button>
            <button type="button" class="btn btn-outline-primary">
                <i class="far fa-comment"></i> <?= $comments = 3; ?>
            </button>
            <button type="button" class="btn btn-outline-primary">
                <i class="far fa-thumbs-down"></i> <?= $shares = 15; ?>
            </button>
        </div>
    </div>
</div>
