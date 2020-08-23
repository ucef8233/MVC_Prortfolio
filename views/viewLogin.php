<?php require_once 'templates/includes/nav.php'; ?>
<div class="container">
  <form class="login__box" method="POST">
    <input type="text" name="username" class="field" placeholder="Username" required><br>
    <input type="password" name="password" class="field" placeholder="Password" required><br>
    <input class="field" type="submit" name="connexion" value="Connexion">
  </form>
</div>