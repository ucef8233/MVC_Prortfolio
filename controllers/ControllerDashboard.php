<?php



require_once 'views/View.php';


/**
 *
 */
class ControllerDashboard
{
  private $_projetManager;
  private $_editManager;
  private $_addManager;
  private $_deletManager;
  private $_cvManager;
  private $_langageManager;
  private $_softskillsManager;
  private $_etudeManager;
  private $_experianceManager;
  private $_view;

  /**
   */
  public function __construct()
  {
    if (isset($url) && count($url) > 1) {
      throw new \Exception("Page introuvable", 1);
    } elseif (isset($_GET['profile'])) {
      $this->profile();
    } elseif (isset($_GET['projet']) && $_GET['projet'] == 'update') {
      $this->projetUpdate();
    } elseif (isset($_GET['projet']) && $_GET['projet'] == 'add') {
      $this->projetAdd();
    } elseif (isset($_GET['projet']) && $_GET['projet'] == 'delet') {
      $this->projetDelet();
    } else {
      $this->projets();
    }
  }
  //// CONTROLLER READ PROJETS
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
  //// CONTROLLER UPDATE PROJETS
  private function projetUpdate()
  {
    $this->_editManager = new DashboardManager;
    $projets = $this->_editManager->updateProjets($_GET['id']);
    $this->_view = new View('Update', 'demo');
    $this->_view->generate(array('projets' => $projets));
  }
  /// CONTROLLER ADD PROJETS

  private function projetAdd()
  {
    $this->_addManager = new DashboardManager;
    $projets = $this->_addManager->setProjet();
    $this->_view = new View('Add', 'demo');
    $this->_view->generate(array('projets' => $projets));
  }
  ////// CONTROLLER DELET PROJET
  private function projetDelet()
  {
    $this->_deletManager = new DashboardManager;
    $projets = $this->_deletManager->deletProjet($_GET['id']);
    // $this->_projetManager = new ProjetManager;
    // $projets = $this->_projetManager->getProjets();
    $this->_view = new View('Dashboard', 'demo');
    $this->_view->generate(array('projets' => $projets));
  }

  ////CONTROLLER READ PROFILE
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

  // avoir un tableau default manager qui gere le cv et les inner join a la fois
}
