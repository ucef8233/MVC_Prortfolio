<?php



abstract class SetterDefault
{

  private static $_bdd;

  //connexion a la bdd

  private static function setBdd()
  {
    self::$_bdd = new PDO('mysql:host=localhost;dbname=portfolio;charset=utf8', 'root', '');
    self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
  }

  ///GETER DB
  protected function getBdd()
  {
    if (self::$_bdd == null) {
      self::setBdd();
      return self::$_bdd;
    }
  }

  /// COMMUNE
  //// GET ALL
  protected function getAll($table, $obj = null)
  {
    $this->getBdd();
    $var = [];
    $req = self::$_bdd->prepare('SELECT * FROM ' . $table . '');
    $req->execute();

    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
      if ($obj !== null) :
        $var[] = new $obj($data);
      else :
        $var =  $data;
      endif;
    }

    return $var;
    $req->closeCursor();
  }
  ///GET JOIN FOR INFO ADMIN -------> a revoir pour une seul requete SQL POUR JOINTURE DE 5 table sans repetition
  protected function getJoin($join)
  {
    $this->getBdd();
    $var = [];
    $req = self::$_bdd->prepare('SELECT * FROM info_admin AS i INNER JOIN ' . $join . ' AS j ON i.id_admin = j.info_admin');
    $req->execute();

    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {

      $var[] = new  Join($data);
    }

    return $var;
    $req->closeCursor();
  }
  /// GET ONE ELEMENT 
  protected function getOne($table, $type, $id, $obj)
  {
    $this->getBdd();
    $var = [];
    $req = self::$_bdd->prepare('SELECT * FROM ' . $table . ' WHERE ' . $type . ' = :id');
    $req->bindValue(":id", $id);
    $req->execute();
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
      $var[] = new $obj($data);
    }

    return $var;
    $req->closeCursor();
  }
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
}
