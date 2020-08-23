<?php


/**
 *
 */
class DashboardManager extends SetterDefault
{
  /// RECUPERER UN PROJET
  public function updateProjets($id)
  {
    return $this->getOne('projet', 'id', $id, 'Projet');
  }
  public function addProjets()
  {
  }
}
