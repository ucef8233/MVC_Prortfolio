<?php


require_once 'views/View.php';




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

  public function __construct()
  {
    if (isset($url) && count($url) > 1) {
      throw new \Exception("Page introuvable", 1);
    } else {
      $this->Accueil();
    }
  }
  private function Accueil()
  {
    $this->_projetManager = new ProjetManager;
    $this->_cvManager = new ProjetManager;
    $this->_langageManager = new ProjetManager;
    $this->_softskillsManager = new ProjetManager;
    $this->_etudeManager = new ProjetManager;
    $this->_experianceManager = new ProjetManager;


    $projets = $this->_projetManager->getProjets();
    $infos = $this->_cvManager->getCv();
    $langages = $this->_langageManager->getLangage();
    $softskills = $this->_softskillsManager->getSoftskills();
    $etudes = $this->_etudeManager->getEtude();
    $experiances = $this->_experianceManager->getExperiance();


    $this->_view = new View('Accueil', 'acceuil');
    $this->_view->generate(array(
      'projets' => $projets,
      'infos' => $infos,
      'langages' => $langages,
      'softskills' => $softskills,
      'etudes' => $etudes,
      'experiances' => $experiances
    ));
  }
}
