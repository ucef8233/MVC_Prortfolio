<?php


/**
 *
 */
class DashboardManager extends DefaultGetter
{
  /// RECUPERER UN PROJET
  public function updateProjets($id)
  {
    return $this->getOne('projet', 'id', $id, 'Projet');
  }
  public function addProjets()
  {
    return $this->getAdd('projet', 'id', $id, 'Projet');
  }
}
