<!DOCTYPE html>
<html lang="hu">

<head>
    <title><?php echo $title ?></title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include __DIR__ . '/../components/head.php'; ?>
</head>

<body class="helping_quary">
    <header>
        <?php include __DIR__ . '/../components/navbar.php'; ?>
        <a href="/../userhandle/register.php?action=login">Bejelentkezés</a>
        <a href="/../userhandle/register.php?action=signup">Regisztráció</a>
        Nyisd ki az elméd, fedezd fel a világot!
    </header>

    <main>
    <h3>Összes Poszt<h3>
    <div class="filter-container">
            <div class="continent-container">
            <label for="continent">Kontinens: </label>
            <select id="continent" class="filter-select">
                <option value="Európa">Európa</option>
                <option value="Ázsia">Ázsia</option>
                <option value="Afrika">Afrika</option>
                <option value="Észak-Amerika">Észak-Amerika</option>
                <option value="Dél-Amerika">Dél-Amerika</option>
                <option value="Ausztrália">Ausztrália</option>
                <option value="Antarktisz">Antarktisz</option>
            </select>
    </div>

            <label for="country">Ország: </label>
            <input type="text" id="country" class="search-input" placeholder="Search...">

            <label for="city">Város: </label>
            <input type="text" id="city" class="search-input" placeholder="Search...">
        </div>

        <!-- Posts Section -->
       
        <?php include __DIR__ . '/../components/card.php'; ?>
        <?php include __DIR__ . '/../components/card.php'; ?>
        <?php include __DIR__ . '/../components/card.php'; ?>
        <?php include __DIR__ . '/../components/card.php'; ?>
    </main>

    <?php if (!App\Helper::isAuth()) : ?>
        <div class="container home-container">
            <?php $this->include('components/flashMessage') ?>
        </div>
    <?php else : ?>
        <?= $content ?>
    <?php endif; ?>

    <?php $this->include('components/footer') ?>

    <!-- Optional Overlay Element -->
    <div id="overlay" class="overlay" onclick="toggleSidebar()"></div>

</body>

</html>
