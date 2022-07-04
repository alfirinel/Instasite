<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Document</title>
    </head>
    <body>
        <?php include_once PAGES_FOLDER . 'includes\header.php'; ?>
        <?php include_once PAGES_FOLDER . $page . '.php'; ?>
        <?php if($page !== 'start'):?>
            <?php include_once PAGES_FOLDER . 'includes\pagination.php'; ?>
        <?php endif;?>
        <?php include_once PAGES_FOLDER . 'includes\footer.php'; ?>

    </body>
</html>