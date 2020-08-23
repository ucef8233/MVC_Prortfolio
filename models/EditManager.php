<?php


/**
 *
 */
class EditManager extends Model
{

  public function getProjets($id)
  {
    return $this->getOne('projet', 'id', $id, 'Projet');
  }
}
