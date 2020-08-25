<?php

use App\Models\Html\{Form, Error};



if (isset($_GET['projet']) || isset($_GET['profile'])) :
  if ($_GET['projet'] == 'update' || $_GET['profile'] == 'update') :
    echo 'test';
  endif;
endif;