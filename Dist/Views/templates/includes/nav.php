 <nav class="pages">
   <a href="Accueil"> <img src="views/assets/image/Ysb.png" alt=""></a>
   <div class="pages__links none">
     <a href="Contact">Contact</a>
     <a href="<?php if (!isset($_SESSION['log'])) :
                echo "Login";
              else :
                echo "Dashboard";
              endif; ?>">
       <?php if (!isset($_SESSION['log'])) :
          echo "Login";
        else :
          echo "Dashboard";
        endif; ?></a>
   </div>
   </div>
 </nav>