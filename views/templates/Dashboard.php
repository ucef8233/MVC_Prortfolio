<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    <?= $t ?>
  </title>
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no" name="viewport" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <script src="https://kit.fontawesome.com/5ef935a943.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="views/assets/css/material-dashboard.min.css?v=2.1.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="views/assets/css/demo.css" rel="stylesheet" />
  <style>
    td img {
      width: 20vw;
    }

    td .fas {
      font-size: 2em;
    }

    .x {
      display: none;
    }

    .page404 {
      height: 80vh;
      display: flex;
      justify-content: center;
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


<body class="dark-edition">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="black" data-image="../views/assets/img/sidebar-2.jpg">
      <div class="logo"><a href="Accueil" class="simple-text logo-normal">
          <img src="views/assets/image/Ysb.png" alt="" width="80px">
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item <?php if (!isset($_GET['p'])) : echo "active";
                              endif; ?>">
            <a class="nav-link" href="dashboard">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item <?php if (isset($_GET['p']) && ($_GET['p'] == "editcv")) : echo "active";
                              endif; ?> ">
            <a class=" nav-link" href="dashboard&profile">
              <i class="material-icons">person</i>
              <p>Profile</p>
            </a>
          </li>
          <li class="nav-item <?php if (isset($_GET['p']) && ($_GET['p'] == "add")) : echo "active";
                              endif; ?>  ">
            <a class="nav-link" href="dashboard&projet=add">
              <i class="fas fa-folder-plus"></i>
              <p>Ajouter un Projet</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="Logout">
              <i class="fas fa-sign-out-alt"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:void(0)">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
        </div>
      </nav>
      <!-- End Navbar -->
      <?= $content ?>

    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="views/assets/scripts/core/jquery.min.js"></script>
  <script src="views/assets/scripts/core/popper.min.js"></script>
  <script src="views/assets/scripts/core/bootstrap-material-design.min.js"></script>
  <script src="https://unpkg.com/default-passive-events"></script>
  <script src="views/assets/scripts/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!--  Google Maps Plugin    -->
  <!-- Chartist JS -->
  <script src="../views/assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="views/assets/scripts/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="views/assets/scripts/material-dashboard.min.js?v=2.1.0"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="views/assets/scripts/demo/demo.js"></script>

</body>

</html>