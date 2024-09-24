<!DOCTYPE html>
<html lang="hu">

<head>
    <title><?= $title . ' sheetstack' ?></title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <header>
        <?php include __DIR__ . '/../components/navbar.php'; ?>
    </header>

    <main class="container">
        <?= $content; ?>
    </main>

    <?php include __DIR__ . '/../components/footer.php'; ?>
</body>

</html>
