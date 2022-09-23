<?php
    ob_start();
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/style/style.css">
    <script src="./asset/script/script.js" defer></script>
    <title><?php echo $namePage ?></title>
</head>
<?php
    $footer = ob_clean();
?>
