<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Ajouter un projet</h4>
          </div>
          <div class="card-body">
            <form method="POST">
              <div class="row">
                <?= Html::input("6", "Mon du projet", "projet_name") ?>
                <?= Html::input("6", "lien Github", "projet_lien") ?>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="custom-file">
                    <label class="custom-file-label  ">Ajouter une image pour le projet</label>
                    <input type="file" class="custom-file-input" name="projet_image" accept="image/png, image/jpeg" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <?= Html::textarea("projet_description") ?>
              </div>
              <button type="submit" class="btn btn-primary pull-right" name="add">Ajouter Projet</button>
              <!-- <div class="clearfix"></div> -->
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>