<?php


/**
 *
 */
class ProjetManager extends SetterDefault
{
  /// GET ALL PROJETS
  public function getProjets()
  {
    return $this->getAll('projet', 'Projet');
  }
  ///GET AMM INFO PERSO ADMIN
  public function getCv()
  {
    return $this->getAll('info_admin', 'Cv');
  }
  //// GET LANGEGES ADMIN
  public function getLangage()
  {
    return $this->getJoin('langages');
  }
  //// GET SOFTSKILLS ADMIN
  public function getSoftskills()
  {
    return $this->getJoin('softskills');
  }
  //// GET ETUDES ADMIN
  public function getEtude()
  {
    return $this->getJoin('etudes');
  }
  //// GET EXPERIANCES ADMIN
  public function getExperiance()
  {
    return $this->getJoin('experiances');
  }
}
