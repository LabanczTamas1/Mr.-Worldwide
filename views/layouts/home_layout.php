<?php require_once __DIR__.'/../components/card.php';
?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <title><?php echo $title ?></title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $this->include('components/head') ?>
</head>

<body class="helping_quary">
    <header>
    <?php $this->include('components/navbar') ?>
    </header>
    <?php $this->include('components/flashMessage') ?>

    <main style="margin-top:100px;">
    <?php if(!App\Helper::isAuth()) :?>
        Nyisd ki az elméd, fedezd fel a világot!
        <?php endif?>
        <?php if (!App\Helper::isAuth()) : ?>
        <div class="container home-container">
        </div>
        <?php else :
        ?>
            <h4>Üdv, <?= App\Helper::user()->username ?>!</h4>
        <?php endif; ?>
    <h3>Összes Poszt<h3>

            <?php echo $content?>
    </main>

    <!-- Optional Overlay Element -->
    <div id="overlay" class="overlay" onclick="toggleSidebar()"></div>

</body>

</html>
