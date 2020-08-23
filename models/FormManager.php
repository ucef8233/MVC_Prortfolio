<?php


/**
 *
 */
class FormManager extends ModelForm
{

  public function getContact()
  {
    return $this->getMail();
  }
  public function getLogin()
  {
    return $this->Login();
  }
}
