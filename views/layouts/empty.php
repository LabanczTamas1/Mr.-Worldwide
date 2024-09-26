<!DOCTYPE html>
<html lang="hu">

<head>
    <title><?= $title . ' blog' ?></title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $this->include('components/head') ?>
</head>

<body>
    <header>
    <?php $this->include('components/navbar') ?>
    </header>
    <main class="container" style="margin-top: 100px;">
        <?php $this->include('components/flashMessage') ?>
        <?php echo $content ?>
    </main>
</body>

</html>
