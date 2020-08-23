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

    $this->_cvManager = new ProjetManager;
    $this->_langageManager = new ProjetManager;
    $this->_softskillsManager = new ProjetManager;
    $this->_etudeManager = new ProjetManager;
    $this->_experianceManager = new ProjetManager;


    $infos = $this->_cvManager->getCv();
    $langages = $this->_langageManager->getLangage();
    $softskills = $this->_softskillsManager->getSoftskills();
    $etudes = $this->_etudeManager->getEtude();
    $experiances = $this->_experianceManager->getExperiance();


    $this->_view = new View('Profile', 'demo');
    $this->_view->generate(array(
      'infos' => $infos,
      'langages' => $langages,
      'softskills' => $softskills,
      'etudes' => $etudes,
      'experiances' => $experiances
    ));
  }
}