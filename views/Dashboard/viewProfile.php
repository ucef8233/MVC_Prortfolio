<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Edit Profile</h4>
          </div>
          <div class="card-body">
            <form method="POST">
              <div class="row">
                <input type="text" class="x" name="id_admin" value="<?= $infos[0]->idadmin() ?>" required>
                <?= Html::input("5", "Nom", "nom_user", $infos[0]->nom()) ?>
                <?= Html::input("3", "Titre", "titre_user", $infos[0]->titre()) ?>
                <?= Html::input("4", "Email", "mail_user", $infos[0]->mail()) ?>
              </div>
              <div class="row">
                <?= Html::input("12", "Adress", "adress_user", $infos[0]->adress()) ?>
                <button type="submit" name="editprofil" class="btn btn-primary pull-right">Update Profile</button>
              </div>
            </form>
            <div class="row">
              <?= Html::table_header('Experiances') ?>
              <?php
              if ($experiances) :
                foreach ($experiances as $key => $experiance) : ?>
                  <tr>
                    <th scope="row"><?= $key + 1 ?></th>
                    <td><?= $experiance->date_experiance() ?></td>
                    <td><?= $experiance->description_experiance() ?></td>
                    <td><a href="dashboard.php?p=editcv&id= ?>&type=experiances"><i class="fas fa-folder-minus"></i></a></td>
                  </tr>
              <?php endforeach;
              endif; ?>
              <?= Html::table_footer() ?>
              <?= Html::input("4", "Date", "experiance_date") ?>
              <?= Html::input("8", "Description", "experiance_desc") ?>
              <?= Html::form_footer("add_cv", "add Experiance") ?>
              <?= Html::table_header('SoftSkils') ?>
              <?php
              if ($softskills) :
                foreach ($softskills as $key => $softskill) : ?>
                  <tr>
                    <th scope="row"><?= $key + 1 ?></th>
                    <td><?= $softskill->softskills() ?></td>
                    <td><a href=""><i class="fas fa-folder-minus"></i></a></td>
                  </tr>
              <?php endforeach;
              endif; ?>
              <?= Html::table_footer() ?>
              <?= Html::input("12", "Softskills", "softskills") ?>
              <?= Html::form_footer("add_softskills", "add softskills") ?>
            </div>
            <div class="row">
              <?= Html::table_header('Education') ?>
              <?php
              if ($etudes) :
                foreach ($etudes as $key =>  $etude) : ?>
                  <tr>
                    <th scope="row"><?= $key + 1 ?></th>
                    <td><?= $etude->date_etude(); ?></td>
                    <td><?= $etude->description_etude(); ?></td>
                    <td><a href="dashboard.php?p=editcv&id=&type=etudes"><i class="fas fa-folder-minus"></i></a></td>
                  </tr>
              <?php endforeach;
              endif; ?>
              <?= Html::table_footer() ?>
              <?= Html::input("4", "Date", "etude_date") ?>
              <?= Html::input("8", "Description", "etude_desc") ?>
              <?= Html::form_footer("add_etude", "add education") ?>
              <?= Html::table_header('Competences technique') ?>
              <?php
              if ($langages) :
                foreach ($langages as $key =>  $langage) : ?>
                  <tr>
                    <th scope="row"><?= $key + 1 ?></th>
                    <td><?= $langage->langage(); ?></td>
                    <td><a href="dashboard.php?p=editcv&id=&type=langages"><i class="fas fa-folder-minus"></i></a></td>
                  </tr>
              <?php endforeach;
              endif; ?>
              <?= Html::table_footer() ?>
              <?= Html::input("12", "Competences technique", "langage") ?>
              <?= Html::form_footer("add_langage", "add ompetences technique") ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>