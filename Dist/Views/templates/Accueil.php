<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <meta name="description" content="Besoin de plus d'info sur moi , Youssef salim développeur web, et etudiant a youcode " />
  <meta name="keywords" content="Portfolio,projet,projets">
  <meta name="author" content="Salim Youssef">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" />
  <script src="https://kit.fontawesome.com/5ef935a943.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <?php
  if ((isset($_GET['mail']) and $_GET['mail'] == 'envoyer')) :
    echo '<script>
    alert("Mail envoyer avec succes");
  </script>';
  endif;
  ?>
  <link rel="stylesheet" href="views/assets/css/<?= $css ?>.css">
  <title>
    <?= $t ?>
  </title>
  <style>
    .page404 {
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-direction: column;
      text-align: center;
    }

    .page404 h1 {
      font-size: 5em;
    }

    .page404 p {
      font-size: 3em;
    }
  </style>
</head>

<body>
  <?= $content ?>
</body>
<script src="views/assets/scripts/index.js"></script>


</html>