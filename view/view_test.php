<?php
    ob_start();
?>
<form action="" method="post">
    <label for="test">Saisir votre nom:</label>
    <p><input type="text" name="text"></p>
    <label for="test">Saisir votre mail:</label>
    <p><input type="email" name="email"></p>
    <p><input type="submit" name="submit">Ajouter</p>
</form>
<?php
    $test = ob_clean();
?>
