<?php


/**
 *
 */
class Cv
{
  private $_idadmin;
  private $_nom;
  private $_titre;
  private $_mail;
  private $_adress;

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
  public function setId($idadmin)
  {
    $idadmin = (int) $idadmin;
    if ($idadmin > 0) {
      $this->_idadmin = $idadmin;
    }
  }
  public function setTitre($titre)
  {
    if (is_string($titre))
      $this->_titre = $titre;
  }

  public function setNom($nom)
  {
    if (is_string($nom))
      $this->_nom = $nom;
  }

  public function setMail($mail)
  {
    if (filter_var($mail, FILTER_VALIDATE_EMAIL))
      $this->_mail = $mail;
  }

  public function setAdress($adress)
  {
    if (is_string($adress)) {
      $this->_adress = $adress;
    }
  }

  //getters
  public function idadmin()
  {
    return $this->_idadmin;
  }

  public function titre()
  {
    return $this->_titre;
  }

  public function nom()
  {
    return $this->_nom;
  }

  public function mail()
  {
    return $this->_mail;
  }

  public function adress()
  {
    return $this->_adress;
  }
}