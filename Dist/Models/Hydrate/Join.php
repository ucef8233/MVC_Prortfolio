<?php
//// CLASS JOIN info admin


namespace App\Models\Hydrate;;

class Join
{
  private $_id;
  private $_langage;
  private $_softskill;
  private $_date;
  private $_description;


  public function __construct(array $data)
  {
    $this->hydrate($data);
  }

  //hdratation
  public function hydrate(array $data)
  {
    foreach ($data as $key => $value) {
      $method = 'set' . ucfirst($key);
      if (method_exists($this, $method))
        $this->$method($value);
    }
  }
  public function setId(int  $id): void
  {
    $id = (int) $id;
    if ($id > 0)
      $this->_id = $id;
  }
  public function setLangage($langage)
  {
    if (is_string($langage))
      $this->_langage = $langage;
  }
  public function setSoftskill($softskill)
  {
    if (is_string($softskill))
      $this->_softskill = $softskill;
  }
  public function setDate($date)
  {
    if (is_string($date))
      $this->_date = $date;
  }
  public function setDescription($description)
  {
    if (is_string($description))
      $this->_description = $description;
  }


  //getters
  public function langage()
  {
    return $this->_langage;
  }
  public function id()
  {
    return $this->_id;
  }
  public function softskill()
  {
    return $this->_softskill;
  }
  public function date()
  {
    return $this->_date;
  }
  public function description()
  {
    return $this->_description;
  }
}
