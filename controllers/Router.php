<?php

require 'views/View.php';


class Router
{
  private $ctrl;
  private $view;

  public function routeReq()
  {

    try {


      //AUTOLOADER 
      spl_autoload_register(function (string $class) {
        require_once('models/' . $class . '.php');
      });



      $url = '';

      if (isset($_GET['url'])) {
        /// REFORM URL
        $url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));
        /// CREAT SIMPLE URL 
        $controller = ucfirst(strtolower($url[0]));
        /// CREAT CONTROLLER NAME CLASS
        $controllerClass = "Controller" . $controller;
        /// CREAT CONTROLLER PATH
        $controllerFile = "controllers/" . $controllerClass . ".php";


        if (file_exists($controllerFile)) {
          ////CHOIX URL
          require_once($controllerFile);
          $this->ctrl = new $controllerClass($url);
        } else {

          throw new \Exception("Page introuvable", 1);
        }
      } else {
        ///DEFAULT CHOIX
        require_once('controllers/ControllerAccueil.php');
        $this->ctrl = new ControllerAccueil($url);
      }
    } catch (\Exception $e) {
      ////VIEWS GENERAT
      $errorMsg = $e->getMessage();
      $this->_view = new View('Error', 'contact');
      $this->_view->generate(array('errorMsg' => $errorMsg));
    }
  }
}