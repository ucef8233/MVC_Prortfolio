<?php
//// CLASS JOIN info admin
class Join
{
  private $_id_experiance;
  private $_id_softskills;
  private $_id_langage;
  private $_id_etude;

  private $_langage;
  private $_softskills;
  private $_date_etude;
  private $_description_etude;
  private $_date_experiance;
  private $_description_experiance;

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
  public function setId_experiance(int  $id_experiance): void
  {
    $id_experiance = (int) $id_experiance;
    if ($id_experiance > 0) {
      $this->_id_experiance = $id_experiance;
    }
  }
  public function setId_softskills($id_softskills): void
  {
    $id_softskills = (int) $id_softskills;
    if ($id_softskills > 0) {
      $this->_id_softskills = $id_softskills;
    }
  }
  public function setId_etude(int  $id_etude): void
  {
    $id_etude = (int) $id_etude;
    if ($id_etude > 0) {
      $this->_id_etude = $id_etude;
    }
  }
  public function setId_langage(int  $id_langage): void
  {
    $id_langage = (int) $id_langage;
    if ($id_langage > 0) {
      $this->_id_langage = $id_langage;
    }
  }
  public function setLangage($langage)
  {
    if (is_string($langage))
      $this->_langage = $langage;
  }
  public function setSoftskills($softskills)
  {
    if (is_string($softskills))
      $this->_softskills = $softskills;
  }
  public function setDate_etude($date_etude)
  {
    if (is_string($date_etude))
      $this->_date_etude = $date_etude;
  }
  public function setDescription_etude($description_etude)
  {
    if (is_string($description_etude))
      $this->_description_etude = $description_etude;
  }
  public function setDate_experiance($date_experiance)
  {
    if (is_string($date_experiance))
      $this->_date_experiance = $date_experiance;
  }
  public function setDescription_experiance($description_experiance)
  {
    if (is_string($description_experiance))
      $this->_description_experiance = $description_experiance;
  }


  //getters
  public function langage()
  {
    return $this->_langage;
  }
  public function id_softskills()
  {
    return $this->_id_softskills;
  }
  public function id_etude()
  {
    return $this->_id_etude;
  }
  public function id_langage()
  {
    return $this->_id_langage;
  }
  public function id_experiance()
  {
    return $this->_id_experiance;
  }
  public function softskills()
  {
    return $this->_softskills;
  }
  public function date_etude()
  {
    return $this->_date_etude;
  }
  public function description_etude()
  {
    return $this->_description_etude;
  }
  public function date_experiance()
  {
    return $this->_date_experiance;
  }
  public function description_experiance()
  {
    return $this->_description_experiance;
  }
}