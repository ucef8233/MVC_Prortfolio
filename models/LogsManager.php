<?php


/**
 *
 */
class LogsManager extends SetterLogs
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
