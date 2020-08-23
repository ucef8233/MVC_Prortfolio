<?php



require_once 'views/View.php';
/**
 *
 */
class ControllerContact
{
  private $_contactManager;

  public function __construct()
  {
    if (isset($url) && count($url) > 1) {
      throw new \Exception("Page introuvable", 1);
    } else {
      $this->contact();
    }
  }
  ////CONTROLLER CONTACT FORM
  private function contact()
  {
    $this->_contactManager = new LogsManager;
    $mail = $this->_contactManager->getContact();
    $this->_view = new View('Contact', 'contact');
    $this->_view->generate(array(
      'mail' => $mail
    ));
  }
}
