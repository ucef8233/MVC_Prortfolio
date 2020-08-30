<?php

namespace App\Views;


/**
 *
 */
class View
{
  //fichier vue
  private $_file;

  //titre de la page
  private $_t;

  function __construct($action, $css)
  {
    if ($action  == 'Contact' || $action  == 'Login' || $action  == 'Error' || $action  == 'Accueil') {
      //// PATH REQUIRE VIEW ACCUEIL
      $this->_file = 'views/Accueil/view' . $action . '.php';
    } elseif ($action  == 'Profile' || $action  == 'Update' || $action  == 'Add' || $action  == 'Delet' || $action  == 'Dashboard') {
      //// PATH REQUIRE VIEW DASHBOARD
      $this->_file = 'views/Dashboard/view' . $action . '.php';
    }
    $this->action = $action;
    $this->_t = 'Page ' . $action;
    $this->_css = $css;
  }

  ////// INSERT VIEW IN TEMPLATE
  public function generate($data)
  {

    $content = $this->generateFile($this->_file, $data);
    if ($this->action  == 'Contact' || $this->action  == 'Login' || $this->action  == 'Error')
      $this->action = 'Accueil';

    if ($this->action  == 'Profile' || $this->action  == 'Update' || $this->action  == 'Add')
      $this->action = 'Dashboard';

    $view = $this->generateFile('views/templates/' . $this->action . '.php', array('t' => $this->_t, 'content' => $content, 'css' => $this->_css));
    echo $view;
  }



  //// RECUPERER TEMPLATE
  private function generateFile($file, $data)
  {
    if (file_exists($file)) {
      extract($data);
      ob_start();
      require $file;
      return ob_get_clean();
    } else {
      throw new \Exception("Fichier " . $file . " introuvable", 1);
    }
  }
}
