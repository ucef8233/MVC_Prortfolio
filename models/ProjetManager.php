<?php

/**
 *
 */
class ProjetManager extends DashboardSetter
{
  public function getProjets()
  {
    return $this->getAll('projet', 'Projet');
  }
  /// UPDATE UN PROJET
  public function updateProjets($id)
  {
    return $this->Update($id);
  }
  ///ADD PROJET
  public function setProjet()
  {
    return $this->Add();
  }
  ////DELET PROJETS
  public function deletProjet($id)
  {
    return $this->Delet($id, 'id', 'projet');
  }
}
