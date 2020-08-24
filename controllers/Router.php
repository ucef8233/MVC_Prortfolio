<?php

namespace App\Controllers;

use App\Controllers\ControllerLogin;
use App\Views\View;


// require 'Views/View.php';


class Router
{
  private $ctrl;
  private $view;

  public function routeReq()
  {

    try {

      $url = '';

      if (isset($_GET['url'])) {
        /// REFORM URL
        $url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));
        /// CREAT SIMPLE URL 
        $controller = ucfirst(strtolower($url[0]));
        /// CREAT CONTROLLER NAME CLASS
        $controllerClass = "Controller" . $controller;
        /// CREAT CONTROLLER PATH
        // $controllerFile = "Controllers/" . $controllerClass . ".php";


        // if (file_exists($controllerFile)) {
        //   ////CHOIX URL
        //   // require_once($controllerFile);
        //   $this->ctrl = new $controllerFile($url);
        // } else {

        //   throw new \Exception("Page introuvable", 1);
        // }
        switch ($controllerClass) {
          case "ControllerAccueil":
            $this->ctrl = new ControllerAccueil($url);
            break;
          case "ControllerDashboard":
            $this->ctrl = new ControllerDashboard($url);
            break;
          case "ControllerContact":
            $this->ctrl = new ControllerContact($url);
            break;
          case "ControllerLogin":
            $this->ctrl = new ControllerLogin($url);
            break;
          case "ControllerLogout":
            $this->ctrl = new ControllerLogout($url);
            break;
          default:
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