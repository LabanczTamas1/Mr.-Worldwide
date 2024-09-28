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

    <main class="container" style="margin-top: 100px;">
    <!-- Üdvözlő üzenet -->
    <?php if(!App\Helper::isAuth()) :?>
                <h4>Fedezd fel a világot, csatlakozz hozzánk!</h4>
            <?php else :
            ?>
                <h4>Üdv, <?= App\Helper::user()->username ?>!</h4>
            <?php endif; ?>

    
    <!-- Posztok szekció címe -->
    <h3 class="section-title">Összes poszt</h3>

            <?php echo $content?>
    </main>

    <!-- Optional Overlay Element -->
    <div id="overlay" class="overlay" onclick="toggleSidebar()"></div>

</body>

</html>
