<!DOCTYPE html>
<html lang="hu">

<head>
    <title><?= $title . ' blog' ?></title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include __DIR__ . '/../components/head.php'; ?>
</head>

<body>
    <header>
        <?php include __DIR__ . '/../components/navbar.php'; ?>
    </header>

    <?php
    // Check if 'action' parameter is set, and load the correct component
   // if (isset($_GET['action']) && $_GET['action'] === 'signup') {
     //   include __DIR__ . '/../components/signup.php'; // Load signup component
    //} else {
      //  include __DIR__ . '/../components/login.php'; // Default to loading login component
    //}

    ?>
    <?= $content; ?>

    <?php include __DIR__ . '/../components/flashMessage.php'; ?>
</body>

</html>
