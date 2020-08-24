<?php

use App\Models\Html;
?>
<div class="content">
  <div class="container-fluid">

    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Tableau des Projets</h4>
          </div>
          <div class="card-body table-responsive">
            <table class="table table-hover">
              <thead class="text-warning">
                <th>#</th>
                <th>image</th>
                <th>Mon du projet</th>
                <th>Lien Github</th>
                <th>description</th>
                <th>delet</th>
                <th>update</th>
              </thead>
              <tbody>
                <!-- les projets -->
                <?php
                if ($projets) :
                  foreach ($projets as $key => $projet) : ?>
                <tr>
                  <th scope="row"><?= $key + 1 ?></th>
                  <td><img src="views/assets/image/<?= $projet->image() ?>" alt="image projet" width="500" height="300">
                  </td>
                  <td><?= $projet->nom() ?></td>
                  <td><?= $projet->lien()  ?></td>
                  <td><?= Html::limite_caractere($projet->description())  ?></td>
                  <td><a href="dashboard&projet=delet&id=<?= $projet->id() ?>"><i class="fas fa-folder-minus"></i></a>
                  </td>
                  <td><a href="dashboard&projet=update&id=<?= $projet->id() ?>"> <i class="fas fa-user-edit"></i></a>
                  </td>
                </tr>
                <?php endforeach;
                endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>