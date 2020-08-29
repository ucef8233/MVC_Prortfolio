<?php

namespace App\Controllers;

use App\Models\Managers\LogsManager;
use App\Models\Managers\CvManager;
use App\Views\View;





/**
 *
 */
class ControllerAccueil
{
  private $_projetManager;
  // private $_contacttManager;
  private $_cvManager;
  private $_langageManager;
  private $_softskillsManager;
  private $_etudeManager;
  private $_experianceManager;
  private $_view;

  public function __construct($url)
  {
    // $this->url = $url;
    // if (!isset($this->url) && count($url) !== 1) {
    //   throw new \Exception("Page introuvable", 1);
    // } else {
    $this->Accueil();
    // }
  }
  //// CONTROLLER READ ACCUEIL  
  private function Accueil()
  {
    if (isset($_GET['logout'])) :
      $this->_logoutManager = new LogsManager;
      $this->_logoutManager->getLogout();
    endif;
    $this->_projetManager = new CvManager;
    $this->_langageManager = new CvManager;
    $this->_etudeManager = new CvManager;
    $this->_cvManager = new CvManager;
    $this->_softskillsManager = new CvManager;
    $this->_experianceManager = new CvManager;
    $this->_contactManager = new LogsManager();



    $mail = $this->_contactManager->getContact();
    $projets = $this->_projetManager->getProjets();
    $infos = $this->_cvManager->getCv();
    $langages = $this->_langageManager->getLangage();
    $softskills = $this->_softskillsManager->getSoftskills();
    $etudes = $this->_etudeManager->getEtude();
    $experiances = $this->_experianceManager->getExperiance();


    $this->_view = new View('Accueil', 'index');
    $this->_view->generate(array(
      'projets' => $projets,
      'infos' => $infos,
      'langages' => $langages,
      'softskills' => $softskills,
      'etudes' => $etudes,
      'experiances' => $experiances,
      'mail' => $mail
    ));
  }
}
