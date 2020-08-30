<?php

namespace App\Models\HTML;
// classe qui genere des erreur html
class Error
{
  public static function error_cnx()
  {
    if (isset($_GET['p']) && isset($_GET['erreur'])) :
      if ($_GET['erreur'] == 'ko')
        return ' <p class="bg-danger p-3 text-center mx-auto w-50">adress mail ou mots de pass incorrect</p>';
    endif;
  }
  public static function valid_edit($name)
  {
    if ((isset($_GET['update']) and $_GET['update'] == 'ok'))
      return '<div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <i class="material-icons">close</i>
        </button>
        <span> ' . $name . ' modifier !</span>
      </div>';
  }
  // public static function envoi_mail()
  // {
  //   if ((isset($_GET['mail']) and $_GET['mail'] == 'envoyer')) :
  //     return   "<script> alert 'mail envoyer '</script>";
  //   endif;
  // }
  public static function valid_delet($name)
  {
    if ((isset($_GET['delet']) and $_GET['delet'] == 'ok'))
      return '<div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <i class="material-icons">close</i>
        </button>
        <span> ' . $name . ' Supprimer !</span>
      </div>';
  }
  public static function valid_add($name)
  {
    if ((isset($_GET['add']) and $_GET['add'] == 'ok'))
      return '<div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <i class="material-icons">close</i>
        </button>
        <span> ' . $name . ' Ajouter !</span>
      </div>';
  }
}
