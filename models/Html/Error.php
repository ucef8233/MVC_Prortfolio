<?php

namespace App\Models\HTML;
// classe qui genere des erreur html
class Error
{
  public static function error_cnx()
  {
    if (isset($_GET['p']) && isset($_GET['erreur'])) :
      if ($_GET['erreur'] == 'ko') :
        return ' <p class="bg-danger p-3 text-center mx-auto w-50">adress mail ou mots de pass incorrect</p>';
      endif;
    endif;
  }
  public static function error_exist()
  {
    if (isset($_GET['p']) && isset($_GET['error'])) :
      if ($_GET['error'] == 'exist') :
        return '<div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <i class="material-icons">close</i>
        </button>
        <span> Projet deja existant !</span>
      </div>';
      endif;
    endif;
  }
  public static function valid_edit($name)
  {
    if (isset($_GET['projet']) || isset($_GET['profile'])) :
      if ($_GET['projet'] == 'update' || $_GET['profile'] == 'update') :
        return '<div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <i class="material-icons">close</i>
        </button>
        <span> ' . $name . ' modifier !</span>
      </div>';
      endif;
    endif;
  }
  public static function valid_delet($name)
  {
    if (isset($_GET['projet']) || isset($_GET['profile'])) :
      if ($_GET['projet'] == 'delet' || $_GET['profile'] == 'delet') :
        return '<div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <i class="material-icons">close</i>
        </button>
        <span> ' . $name . ' Supprimer !</span>
      </div>';
      endif;
    endif;
  }
  public static function valid_add($name)
  {
    if (isset($_GET['projet']) || isset($_GET['profile'])) :
      if ($_GET['projet'] == 'add' || $_GET['profile'] == 'add') :
        return '<div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <i class="material-icons">close</i>
        </button>
        <span> ' . $name . ' Ajouter !</span>
      </div>';
      endif;
    endif;
  }
}