<?php



require_once 'views/View.php';


/**
 *
 */
class ControllerDashboard
{
  private $_projetManager;
  private $_cvManager;
  private $_view;

  public function __construct()
  {
    if (isset($url) && count($url) > 1) {
      throw new \Exception("Page introuvable", 1);
    } elseif (isset($_GET['profile']) && $_GET['profile'] == 'update') {
      $this->profile();
    } else {
      $this->projets();
    }
  }
  private function projets()
  {
    if (isset($_SESSION['log']) && isset($_SESSION['mdp'])) :
      $this->_projetManager = new ProjetManager;
      $projets = $this->_projetManager->getProjets();
      $this->_view = new View('Dashboard', 'demo');
      $this->_view->generate(array('projets' => $projets));
    else :
      header('location:Login');
    endif;
  }
  private function profile()
  {
    if (isset($_SESSION['log']) && isset($_SESSION['mdp'])) :
      $this->_cvManager = new ProfilManager;
      $cv = $this->_cvManager->getProjets();
      $this->_view = new View('Profile', 'demo');
      $this->_view->generate(array('cv' => $cv));
    else :
      header('location:Login');
    endif;
  }
}
