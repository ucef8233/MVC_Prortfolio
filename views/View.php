<?php



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
    $this->_file = 'views/view' . $action . '.php';
    $this->action = $action;
    $this->_t = 'Page ' . $action;
    $this->_css = $css;
  }


  public function generate($data)
  {

    $content = $this->generateFile($this->_file, $data);
    if ($this->action  == 'Contact' || $this->action  == 'Login' || $this->action  == 'Error') {
      $this->action = 'Accueil';
    }
    if ($this->action  == 'Profile' || $this->action  == 'Update') {
      $this->action = 'Dashboard';
    }
    $view = $this->generateFile('views/templates/' . $this->action . '.php', array('t' => $this->_t, 'content' => $content, 'css' => $this->_css));
    echo $view;
  }



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
