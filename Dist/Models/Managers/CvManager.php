<?php

namespace App\Models\Managers;

use App\Models\Setters\DashboardSetter;

/**
 *
 */
class CvManager extends DashboardSetter
{
  public function getProjets()
  {
    return $this->getAll('projet', 'Projet');
  }
  ///GET ALLINFO PERSO ADMIN
  public function getCv()
  {
    return $this->getAll('info_admin', 'Cv');
  }


  ////  read info cv
  public function getInfoCv($table)
  {
    return $this->getJoin($table);
  }

  /// ADD INFO JOIN CV    ok
  public function addInfoCv($table)
  {
    return $this->addCv($table);
  }

  ///EDIT INFO CV    ok
  public function updateInfoCv($table)
  {
    return $this->updateCv($table);
  }
  ////DELETJOIN CV    ok
  public function deletInfoCv($id, $table)
  {
    return $this->Delet($id, 'id', $table);
  }
}
