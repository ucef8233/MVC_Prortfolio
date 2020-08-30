<?php

namespace App\Controllers;

use App\Models\Managers\LogsManager;
use App\Views\View;

require_once 'views/View.php';

/**
 *
 */
class ControllerLogin
{
  private $_loginManager;

  public function __construct()
  {
    if (isset($url) && count($url) > 1) {
      throw new \Exception("Page introuvable", 1);
    } else {
      $this->login();
    }
  }
  ////CONTROLLER LOGIN
  private function login()
  {
    if (!isset($_SESSION['log']) && !isset($_SESSION['mdp'])) :
      $this->_loginManager = new LogsManager;

      $login = $this->_loginManager->getLogin();

      $this->_view = new View('Login', 'login');
      $this->_view->generate(array(
        'login' => $login
      ));
    else :
      header('location:Accueil');
    endif;
  }
}
