<?php
/// GETTER AND SETTER PROJETS
class Projet
{

  private $_id;
  private $_nom;
  private $_description;
  private $_image;
  private $_lien;

  public function __construct(array $data)
  {
    $this->hydrate($data);
  }

  //hdratation
  public function hydrate(array $data)
  {
    foreach ($data as $key => $value) {
      $method = 'set' . ucfirst($key);
      if (method_exists($this, $method)) {
        $this->$method($value);
      }
    }
  }

  //setters

  public function setId($id)
  {
    $id = (int) $id;
    if ($id > 0) {
      $this->_id = $id;
    }
  }

  public function setNom($nom)
  {
    if (is_string($nom)) {
      $this->_nom = $nom;
    }
  }

  public function setLien($lien)
  {
    if (is_string($lien)) {
      $this->_lien = $lien;
    }
  }

  public function setDescription($description)
  {
    if (is_string($description)) {
      $this->_description = $description;
    }
  }
  public function setImage($image)
  {
    if (is_string($image)) {
      $this->_image = $image;
    }
  }

  //getters
  public function id()
  {
    return $this->_id;
  }

  public function nom()
  {
    return $this->_nom;
  }

  public function lien()
  {
    return $this->_lien;
  }

  public function description()
  {
    return $this->_description;
  }
  public function image()
  {
    return $this->_image;
  }
}
