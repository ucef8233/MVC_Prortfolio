<?php


namespace App\Models\Setters;

use App\Models\DefaultGetter;

class LogsSetter extends DefaultGetter
{
  /// CONTACT
  protected function getMail()
  {
    if (isset($_POST['sub_contact'])) :
      $name = addslashes($_POST['name_contact']);
      $mail = addslashes($_POST['mail_contact']);
      $msg = addslashes($_POST['message_contact']);
      $to  =  'tonadress@gmail.com';
      $subject = "contact Form";
      $message = "Nouveau mail \n
               Nom: $name \n
               Email: $mail\n
               Message: $msg ";

      $headers  = 'MIME-Version: 1.0' . "\r\n";
      $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
      if (mail($to, $subject, $message, $headers)) {
        header("Location:Accueil&mail=envoyer");
      }
    endif;
  }

  ////CONNEXION
  protected  function Login()
  {
    if (isset($_POST['connexion'])) :
      $result = $this->getAll('info_admin');
      $login = $_POST['username'];
      if ($result) :
        if (($_POST['password'] === $result['mdp']) && ($login === $result['login'])) :
          $_SESSION['log'] = $result['login'];
          $_SESSION['mdp'] = $result['mdp'];
          header("Location:Dashboard");
        else :
          header("Location:Login?login=error");
        endif;
      endif;
    endif;
  }
  public static function getLogout()
  {
    unset($_SESSION["log"]);
    unset($_SESSION["mdp"]);
    header("Location:index.php");
  }
}
