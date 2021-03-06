<?php

namespace App\Models\Setters;

use App\Models\DefaultGetter;

class DashboardSetter extends DefaultGetter
{
  private function Test(): array
  {
    $nom = addslashes($_POST['projet_name']);
    $lien = $_POST['projet_lien'];
    $image_name = $_FILES['projet_image']['name'];
    $image_path = 'Views/assets/image/' . $image_name;
    $image_tmp = $_FILES['projet_image']['tmp_name'];
    move_uploaded_file($image_tmp, $image_path);
    $description = addslashes($_POST['projet_description']);
    $champs = [
      'nom' => $nom,
      'image' =>  $image_name,
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
    if (!$projetId)
      header('location:Error');
    $result = $this->getOne('projet', 'id', $id, 'Projet');
    if (isset($_POST['edit'])) :
      $champs = $this->Test();
      $this->getUpdate($projetId, $champs, 'projet');
    endif;
    return $result;
  }
  private function Test2(string $table)
  {
    if (($table == "experiances") or $table == "etudes") :
      $date = addslashes($_POST['date']);
      $description =  addslashes($_POST['desc']);
      $champs = [
        'date' => $date,
        'description' =>  $description,
        'info_admin' => "1"
      ];
    elseif ($table == "langages") :
      $langage =  addslashes($_POST['langage']);
      $champs = [
        'langage' => $langage,
        'info_admin' => "1"
      ];
    else :
      $softskill =  addslashes($_POST['softskill']);
      $champs = [
        'softskill' => $softskill,
        'info_admin' => "1"
      ];
    endif;
    $this->getAdd($table, $champs);
  }
  protected  function addCv(string $table): void
  {
    if ($table == "experiances")
      $this->Test2($table);

    if ($table == "etudes")
      $this->Test2($table);

    if ($table == "langages")
      $this->Test2($table);

    if ($table == "softskills")
      $this->Test2($table);
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
