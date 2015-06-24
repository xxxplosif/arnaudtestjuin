<?php

ob_start();

if(!isset($_SESSION['user'])):

?>

<form action="" method="POST">
    <label for="user">Utilisateur : </label>
    <input type="text" id="user" name="user" />
    <label for="password">Mot de passe : </label>
    <input type="password" id="password" name="password" />
    <input type="submit" value="Se connecter" />
</form>

<?php

endif;



$content = ob_get_clean();

require 'template/master.php';