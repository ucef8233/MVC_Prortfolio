<?php
//// CLASS JOIN info admin
class Join
{
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
