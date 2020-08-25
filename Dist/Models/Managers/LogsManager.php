<?php

namespace App\Models\Managers;

use App\Models\Setters\LogsSetter;

/**
 *
 */
class LogsManager extends LogsSetter
{
  /// ENVOI MAIL
  public function getContact()
  {
    return $this->getMail();
  }
  //// VALIDATION LOGIN
  public function getLogin()
  {
    return $this->Login();
  }
}