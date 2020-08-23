<?php


/**
 *
 */
class ProjetManager extends Model
{

  public function getProjets()
  {
    return $this->getAll('projet', 'Projet');
  }

  public function getCv()
  {
    return $this->getAll('info_admin', 'Cv');
  }

  public function getLangage()
  {
    return $this->getJoin('langages');
  }

  public function getSoftskills()
  {
    return $this->getJoin('softskills');
  }

  public function getEtude()
  {
    return $this->getJoin('etudes');
  }
  public function getExperiance()
  {
    return $this->getJoin('experiances');
  }
}
