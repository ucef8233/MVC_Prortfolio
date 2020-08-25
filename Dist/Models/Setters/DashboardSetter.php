<?php

namespace App\Models\Setters;

use App\Models\DefaultGetter;

class DashboardSetter extends DefaultGetter
{
  private function Test(): array
  {
    $nom = addslashes($_POST['projet_name']);
    $lien = $_POST['projet_lien'];
    $image = $_POST['projet_image'];
    $description = addslashes($_POST['projet_description']);
    $champs = [
      'nom' => $nom,
      'image' =>  $image,
      'lien' =>  $lien,
      'description' => $description
    ];
    return $champs;
  }

  protected function Add(): void
  {
    if (isset($_POST['add'])) :
      $champs = $this->Test();
      $result = $this->getOne('projet', 'nom', $champs['nom'], 'Projet');
      if ($result)
        header("location:dashboard&projet=add&error=exist");
      $this->getAdd('projet', $champs);
    endif;
  }

  protected function Update(int $id)
  {
    $projetId = $_GET['id'];
    if (!$projetId) :
      header('location:Error');
    endif;
    $result = $this->getOne('projet', 'id', $id, 'Projet');
    if (isset($_POST['edit'])) :
      $champs = $this->Test();
      $this->getUpdate($projetId, $champs, 'projet');
    endif;
    return $result;
  }
  private function Test2(string $table)
  {
    if ($table == "experiances") :
      $date = addslashes($_POST['experiance_date']);
      $description =  addslashes($_POST['experiance_desc']);
      $champs = [
        'date_experiance' => $date,
        'description_experiance' =>  $description,
        'info_admin' => "1"
      ];
    elseif ($table == "etudes") :
      $date = addslashes($_POST['etude_date']);
      $description =  addslashes($_POST['etude_desc']);
      $champs = [
        'date_etude' => $date,
        'description_etude' =>  $description,
        'info_admin' => "1"
      ];
    elseif ($table == "langages") :
      $langage =  addslashes($_POST['langage']);
      $champs = [
        'langage' => $langage,
        'info_admin' => "1"
      ];
    else :
      $softskills =  addslashes($_POST['softskills']);
      $champs = [
        'softskills' => $softskills,
        'info_admin' => "1"
      ];
    endif;
    $this->getAdd($table, $champs);
  }
  protected  function addCv(string $table): void
  {
    if ((isset($_POST['add_cv'])) && ($table == "experiances")) :
      $this->Test2($table);
    endif;
    if ((isset($_POST['add_etude'])) && ($table == "etudes")) :
      $this->Test2($table);
    endif;
    if ((isset($_POST['add_langage'])) && ($table == "langages")) :
      $this->Test2($table);
    endif;
    if ((isset($_POST['add_softskills'])) && ($table == "softskills")) :
      $this->Test2($table);
    endif;
  }
  protected function updateCv(): void
  {
    if (isset($_POST['editprofil'])) :
      $nom = addslashes($_POST['nom_user']);
      $titre =  addslashes($_POST['titre_user']);
      $mail = $_POST['mail_user'];
      $adress = addslashes($_POST['adress_user']);
      $champs = [
        'nom' => $nom,
        'titre' => $titre,
        'mail' => $mail,
        'adress' => $adress
      ];
      // $id = $_POST['idadmin'];
      $this->getUpdate('1', $champs, 'info_admin');

    endif;
  }
}