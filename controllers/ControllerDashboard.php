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
    if (isset($_SESSION['log']) && isset($_SESSION['mdp'])) :
      if (isset($url) && count($url) > 1) {
        throw new \Exception("Page introuvable", 1);
      } elseif (isset($_GET['profile'])) {
        $this->profile();
      } else {
        $this->projets();
      }
    else :
      header('location:Login');
    endif;
  }
  //////////////////////////////////////////////////////////////////////////PROJETS
  //// CONTROLLER  PROJETS 
  private function projets()
  {
    ///////////////////// DELET PROJET
    if (isset($_GET['projet']) && $_GET['projet'] == 'delet') :
      $this->_deletManager = new DashboardManager;
      $this->_deletManager->deletProjet($_GET['id']);
    endif;

    ///////////////////// ADD PROJET
    if (isset($_GET['projet']) && $_GET['projet'] == 'add') :
      $this->_addManager = new DashboardManager;
      $projets = $this->_addManager->setProjet();
      $this->_view = new View('Add', 'demo');


    ///////////////////// UPDATE PROJET
    elseif (isset($_GET['projet']) && $_GET['projet'] == 'update') :
      $this->_editManager = new DashboardManager;
      $projets = $this->_editManager->updateProjets($_GET['id']);
      $this->_view = new View('Update', 'demo');


    ///////////////////// READ PROJET
    else :
      $this->_projetManager = new ProjetManager;
      $projets = $this->_projetManager->getProjets();
      $this->_view = new View('Dashboard', 'demo');
    endif;
    $this->_view->generate(array('projets' => $projets));
  }


  //////////////////////////////////////////////////////////////////////////PROJETS
  //// CONTROLLER  PROJETS 
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
  private function  profilUpdate()
  {
  }

  // avoir un tableau default manager qui gere le cv et les inner join a la fois
}
