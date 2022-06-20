<?php
var_dump($page);
?>
<!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="/app/assets/style.css">
        <title>Document</title>
    </head>
    <body>
    <span>hello, template</span>
<!--        --><?php //include_once 'header.php' ?>
        <?php include_once self::PAGES_FOLDER . $page . '.php';?>
<!--        --><?php //include_once 'footer.php' ?>
    </body>
</html>