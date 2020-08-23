<?php




require_once 'views/View.php';

/**
 *
 */
class ControllerLogin
{
  private $_loginManager;

  public function __construct()
  {
    if (isset($url) && count($url) > 4) {
      throw new \Exception("Page introuvable", 1);
    } else {
      $this->login();
    }
  }
  private function login()
  {
    if (!isset($_SESSION['log']) && !isset($_SESSION['mdp'])) :
      $this->_loginManager = new FormManager;

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
