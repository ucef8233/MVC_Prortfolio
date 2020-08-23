<?php
class DashboardSetter extends DefaultGetter
{
  protected function Test()
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
  protected function Add()
  {
    if (isset($_POST['add'])) :
      $champs = $this->Test();
      $result = $this->getOne('projet', 'nom', $champs['nom'], 'Projet');
      if ($result) :
        header("location:dashboard&projet=add&error=exist");
      else :
        $this->getAdd('projet', $champs);
      endif;
    endif;
  }

  protected function Update($id)
  {
    $projetId = $_GET['id'];
    if (!$projetId) :
      header('location:Error');
    endif;
    $result = $this->getOne('projet', 'id', $id, 'Projet');
    if (isset($_POST['edit'])) :
      $champs = $this->Test();
      $id = $_POST['id'];
      $this->getUpdate($projetId, $champs, 'projet');
    endif;
    return $result;
  }
}
