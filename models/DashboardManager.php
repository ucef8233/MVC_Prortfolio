<?php

/**
 *
 */
class DashboardManager extends DashboardSetter
{
  /// RECUPERER UN PROJET
  public function updateProjets($id)
  {
    return $this->Update($id);
  }
  public function setProjet()
  {
    return $this->Add();
  }
}
