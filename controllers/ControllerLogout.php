<?php

class ControllerLogout
{
  private $_logoutManager;

  public function __construct()
  {

    $this->logout();
  }
  ////CONTROLLER LOGOUT 
  private function logout()
  {

    $this->_logoutManager = new LogsManager;

    $this->_logoutManager->getLogout();
  }
}
