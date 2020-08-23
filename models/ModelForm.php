<?php



class ModelForm extends Model
{
  /// CONTACT
  protected function getMail()
  {
    if (isset($_POST['sub_contact'])) :
      ini_set("SMTP", "smtp.gmail.com");
      ini_set("smtp_port", "25");
      $name = addslashes($_POST['name_contact']);
      $mail = addslashes($_POST['mail_contact']);
      $msg = addslashes($_POST['message_contact']);
      $dist = "ucefsalim@gmail.com";
      $sujet = "contact Form";
      $msg = "Nouveau mail \n
               Nom: $name \n
               Email: $mail\n
               Message: $msg ";

      $entet = "From : $name \n  Reply-To: $mail";
      mail($dist, $sujet, $msg, $entet);
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
