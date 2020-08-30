<?php


namespace App\Controllers;


use App\Models\Managers\CvManager;
use App\Models\Managers\ProjetManager;
use App\Views\View;

// require_once 'views/View.php';


/**
 *
 */
class ControllerDashboard
{
  private $_lnfoManager;
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
    $this->_deletManager =  $this->_addManager =  $this->_editManager =  $this->_projetManager = new ProjetManager;

    ///////////////////// DELET PROJET
    if (isset($_GET['projet']) && $_GET['projet'] == 'delet')
      $this->_deletManager->deletProjet($_GET['id']);


    ///////////////////// ADD PROJET
    if (isset($_GET['projet']) && $_GET['projet'] == 'add') :
      $projets = $this->_addManager->setProjet();
      $this->_view = new View('Add', 'demo');


    ///////////////////// UPDATE PROJET
    elseif (isset($_GET['projet']) && $_GET['projet'] == 'update') :
      $projets = $this->_editManager->updateProjets($_GET['id']);
      $this->_view = new View('Update', 'demo');


    ///////////////////// READ PROJET
    else :
      $projets = $this->_projetManager->getProjets();
      $this->_view = new View('Dashboard', 'demo');
    endif;
    $this->_view->generate(array('projets' => $projets));
  }


  //////////////////////////////////////////////////////////////////////////PROJETS
  //// CONTROLLER  PROJETS 
  private function profile()
  {
    $this->_lnfoManager = $this->_cvManager = $this->_langageManager = $this->_softskillsManager = $this->_etudeManager = $this->_experianceManager = new CvManager;
    if ($_GET['profile'])
      $this->_lnfoManager->deletInfoCv($_GET['id'], $_GET['profile']);

    if ($_POST) :
      ///////////UPDATE INFO 
      $this->_cvManager->updateInfoCv('info_admin');
      ////////// ADD info
      $this->_lnfoManager->addInfoCv(array_key_last($_POST));
    ////////AFFICHAGE DES INFO PROFILE
    else :
      $infos = $this->_cvManager->getCv();
      $langages = $this->_langageManager->getInfoCv('langages');
      $softskills = $this->_softskillsManager->getInfoCv('softskills');
      $etudes = $this->_etudeManager->getInfoCv('etudes');
      $experiances = $this->_experianceManager->getInfoCv('experiances');
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
}
