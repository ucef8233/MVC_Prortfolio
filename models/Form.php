<?php

// classe qui genere des erreur html
class Form
{
  public static function input($md, $label, $name, $value = '')
  {
    return '<div class="col-md-' . $md . '">
            <div class="form-group">
              <label class="bmd-label-floating">' . $label . ': </label>
              <input type="text" class="form-control" name="' . $name . '" value ="' . $value . '" required>
            </div>
            </div>';
  }
  public static function textarea($name, $result = "")
  {
    return ' <div class="col-md-12">
    <div class="form-group">
      <label class="bmd-label-floating">Description </label>
      <textarea class="form-control" rows="5" name="' . $name . '">' . $result . '</textarea>
    </div>
  </div>';
  }


  public static function table_header($title)
  {
    return ' <div class="col-lg-6 col-md-12">
  <div class="card">
    <div class="card-header card-header-primary">
      <h4 class="card-title">' . $title . '</h4>
    </div>
    <div class="card-body table-responsive">
      <table class="table table-hover">
        <tbody>';
  }
  public static function table_footer()
  {
    return ' </tbody>
    </table>
    <form action="" method="post">
      <div class="row">';
  }
  public static function form_footer($name, $title)
  {
    return '   </div>
    <button type="submit" name="' . $name . '" class="btn btn-primary col-md-4 ">' . $title . '</button>
    </form>
  </div>
</div>
</div>';
  }
}
