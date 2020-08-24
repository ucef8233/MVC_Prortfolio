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
  public function __construct($url)
  {
    $this->url = $url;
    if (isset($_SESSION['log']) && isset($_SESSION['mdp'])) :
      if (isset($this->url) && count($url) < 1) {
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
      $this->_deletManager = new ProjetManager;
      $this->_deletManager->deletProjet($_GET['id']);
    endif;

    ///////////////////// ADD PROJET
    if (isset($_GET['projet']) && $_GET['projet'] == 'add') :
      $this->_addManager = new ProjetManager;
      $projets = $this->_addManager->setProjet();
      $this->_view = new View('Add', 'demo');


    ///////////////////// UPDATE PROJET
    elseif (isset($_GET['projet']) && $_GET['projet'] == 'update') :
      $this->_editManager = new ProjetManager;
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
    $this->_cvManager = new CvManager;
    $this->_langageManager = new CvManager;
    $this->_softskillsManager = new CvManager;
    $this->_etudeManager = new CvManager;
    $this->_experianceManager = new CvManager;
    if ($_GET['profile'] == 'langages')
      $this->_langageManager->deletLangage($_GET['id']);
    if ($_GET['profile'] == 'softskills')
      $this->_softskillsManager->deletSoftskills($_GET['id']);
    if ($_GET['profile'] == 'etudes')
      $this->_etudeManager->deletEtude($_GET['id']);
    if ($_GET['profile'] == 'experiances')
      $this->_experianceManager->deletExperiance($_GET['id']);

    if ($_POST) :
      ///////////UPDATE INFO 
      $this->_cvManager->updateInfo('info_admin');
      $this->_langageManager->addInfo('langages');
      $this->_softskillsManager->addInfo('softskills');
      $this->_etudeManager->addInfo('etudes');
      $this->_experianceManager->addInfo('experiances');
    ////////AFFICHAGE DES INFO PROFILE
    else :
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
    endif;
  }



  // avoir un tableau default manager qui gere le cv et les inner join a la fois
}