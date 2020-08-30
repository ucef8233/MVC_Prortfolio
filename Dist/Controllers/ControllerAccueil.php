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
  private $_cvManager;
  private $_langageManager;
  private $_softskillsManager;
  private $_etudeManager;
  private $_experianceManager;
  private $_view;
  private $_logoutManager;
  private $_contactManager;

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

    $this->_logoutManager = $this->_contactManager  = new LogsManager;
    $this->_projetManager = $this->_langageManager = $this->_etudeManager = $this->_cvManager = $this->_softskillsManager = $this->_experianceManager = new CvManager;

    /// models
    if (isset($_GET['logout']))
      $this->_logoutManager->getLogout();



    $mail = $this->_contactManager->getContact();
    $projets = $this->_projetManager->getProjets();
    $infos = $this->_cvManager->getCv();
    $langages = $this->_langageManager->getInfoCv('langages');
    $softskills = $this->_softskillsManager->getInfoCv('softskills');
    $etudes = $this->_etudeManager->getInfoCv('etudes');
    $experiances = $this->_experianceManager->getInfoCv('experiances');

    ////view
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
