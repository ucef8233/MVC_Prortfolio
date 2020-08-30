<?php

use App\Models\Html\{Form, Error};

?>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Edit Profile</h4>
            <?= Error::valid_edit("Profil") ?>
            <?= Error::valid_delet("Element") ?>
            <?= Error::valid_add("Element") ?>
          </div>
          <div class="card-body">
            <form method="POST">
              <div class="row">
                <?= Form::input("5", "Nom", "nom_user", $infos[0]->nom()) ?>
                <?= Form::input("3", "Titre", "titre_user", $infos[0]->titre()) ?>
                <?= Form::input("4", "Email", "mail_user", $infos[0]->mail()) ?>
                <?= Form::input("7", "Adress", "adress_user", $infos[0]->adress()) ?>
                <button type="submit" name="editprofil" class="btn btn-primary col-md-4 ">Edit Profil</button>
              </div>
            </form>
            <div class="row">
              <?= Form::table_header('Experiances') ?>
              <?php
              if ($experiances) :
                foreach ($experiances as $key => $experiance) : ?>
                  <tr>
                    <th scope="row"><?= $key + 1 ?></th>
                    <td><?= $experiance->date() ?></td>
                    <td><?= $experiance->description() ?></td>
                    <td><a href="dashboard&profile=experiances&id=<?= $experiance->id() ?>"><i class="fas fa-folder-minus"></i></a>
                    </td>
                  </tr>
              <?php endforeach;
              endif; ?>
              <?= Form::table_footer() ?>
              <?= Form::input("4", "Date", "date") ?>
              <?= Form::input("8", "Description", "desc") ?>
              <?= Form::form_footer("experiances", "add Experiance") ?>
              <?= Form::table_header('SoftSkills') ?>
              <?php
              if ($softskills) :
                foreach ($softskills as $key => $softskill) : ?>
                  <tr>
                    <th scope="row"><?= $key + 1 ?></th>
                    <td><?= $softskill->softskill() ?></td>
                    <td><a href="dashboard&profile=softskills&id=<?= $softskill->id() ?>"><i class="fas fa-folder-minus"></i></a></td>
                  </tr>
              <?php endforeach;
              endif; ?>
              <?= Form::table_footer() ?>
              <?= Form::input("12", "Softskills", "softskill") ?>
              <?= Form::form_footer("softskills", "add softskills") ?>
            </div>
            <div class="row">
              <?= Form::table_header('Education') ?>
              <?php
              if ($etudes) :
                foreach ($etudes as $key =>  $etude) : ?>
                  <tr>
                    <th scope="row"><?= $key + 1 ?></th>
                    <td><?= $etude->date(); ?></td>
                    <td><?= $etude->description(); ?></td>
                    <td><a href="dashboard&profile=etudes&id=<?= $etude->id() ?>"><i class="fas fa-folder-minus"></i></a>
                    </td>
                  </tr>
              <?php endforeach;
              endif; ?>
              <?= Form::table_footer() ?>
              <?= Form::input("4", "Date", "date") ?>
              <?= Form::input("8", "Description", "desc") ?>
              <?= Form::form_footer("etudes", "add education") ?>
              <?= Form::table_header('Competences technique') ?>
              <?php
              if ($langages) :
                foreach ($langages as $key =>  $langage) : ?>
                  <tr>
                    <th scope="row"><?= $key + 1 ?></th>
                    <td><?= $langage->langage(); ?></td>
                    <td><a href="dashboard&profile=langages&id=<?= $langage->id() ?>"><i class="fas fa-folder-minus"></i></a>
                    </td>
                  </tr>
              <?php endforeach;
              endif; ?>
              <?= Form::table_footer() ?>
              <?= Form::input("12", "Competences technique", "langage") ?>
              <?= Form::form_footer("langages", "add competences technique") ?>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>