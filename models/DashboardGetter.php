<?php
abstract class DashboardGetter extends DefaultGetter
{
  /// GET ADD 
  protected function getAdd($table, $champs)
  {
    $this->getBdd();
    $implodeColumns = implode(', ', array_keys($champs));
    $implodePlaceholder = implode(", :", array_keys($champs));
    $req = self::$_bdd->prepare('INSERT INTO ' . $table . ' (' . $implodeColumns . ') VALUES (:' . $implodePlaceholder . ')');
    foreach ($champs as $key => $value) :
      $req->bindValue(':' . $key, $value);
    endforeach;
    $reqExec = $req->execute();
    if ($reqExec) :
      header('Location:dashboard?add=ok');
    endif;

    $req->closeCursor();
  }
  protected function getUpdate($id, $champs, $table)
  {
    $this->getBdd();
    $req = self::$_bdd->prepare('UPDATE ' . $table . ' SET nom = :nom,image = :image, lien = :lien, description = :description WHERE id = ' . $id . '');
    foreach ($champs as $key => $value) :
      $req->bindValue(':' . $key, $value);
    endforeach;
    $reqExec = $req->execute();
    if ($reqExec) :
      header('Location:dashboard?edit=ok');
    endif;
  }
  protected function Delet($id,  $where, $table)
  {
    $this->getBdd();
    $req = self::$_bdd->prepare('DELETE  FROM ' . $table . ' WHERE ' . $where . ' = :id');
    $req->bindValue(':id', $id);
    $reqExec = $req->execute();
    header('Location:dashboard?delet=ok');
  }
}
