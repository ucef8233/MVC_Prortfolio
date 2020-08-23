<?php

class ProfilManager extends ModeL
{

  public function getProjets()
  {
    return $this->getAll('info_admin', 'Cv');
  }
}
