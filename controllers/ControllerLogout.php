<?php





class ControllerLogout
{
  private $_logoutManager;

  public function __construct()
  {

    $this->logout();
  }
  private function logout()
  {

    $this->_logoutManager = new FormManager;

    $this->_logoutManager->getLogout();
  }
}
