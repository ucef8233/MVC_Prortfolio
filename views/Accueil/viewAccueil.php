<header id="acceuil" class="header">

  <!-- annimation js -->

  <div id="particles-js">
  </div>

  <!-- navbar -->

  <nav class="pages">
    <a href="Accueil"> <img src="views/assets/image/Ysb.png" alt=""></a>
    <div class="pages__links none">
      <a href="Contact">Contact</a>
      <a href="<?php

                use App\Models\Html;

                if (!isset($_SESSION['log'])) :
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
    <div class="page__humberger block">

      <i class="fas fa-align-right"></i>
    </div>
  </nav>

  <!-- contenu header -->


  <section class="header__contenu">
    <div class="header__text">

      <h1>Bienvenue sur mon portfolio</h1>
      <p>Moi c'est Youssef Salim, Développeur Web !</p>
      <div class="header__btn">
        <a href="#" class="display__menu--portfolio">Portfolio</a>
        <a href="#" class="display__menu--propos">A propos</a>
      </div>
    </div>
  </section>
</header>

<!-- navigation gauche -->


<nav class="menu none">
  <a class="display__menu display__menu--acceuil active" href="#acceuil"><i class="fas fa-home"></i><span
      class="span__acceuil">Acceuil</span></a>
  <a class="display__menu display__menu--portfolio" href="#portfolio"><i class="fas fa-parking"></i><span
      class="span__portfolio">Portfolio</span></a>
  <a class="display__menu display__menu--propos" href="#propos"><i class="fas fa-address-card"></i><span
      class="span__propos">A propos</span></a>
</nav>

<!-- image social medial -->


<div class="header__social">
  <a href="#"> <img src="views/assets/image/github.svg" alt="github icone"></a>
  <a href="#"> <img src="views/assets/image/linkedin.svg" alt="linkedin icone"></a>
  <a href="#"> <img src="views/assets/image/twitter.svg" alt="twitter icone"></a>
  <a href="#"> <img src="views/assets/image/google.svg" alt="linkedin icone"></a>
  <a href="#"> <img src="views/assets/image/instagram.svg" alt="twitter icone"></a>
</div>
<main>
  <!-- // section portfolio -->
  <div id="portfolio" class="main__acceuil ">
    <section class="portfolio" id="port">
      <div class="display">
        <i class="fas fa-folder-open"></i>
      </div>
      <div class="sidebar bay">
        <h2> <i class="fas fa-folder-open"></i> Portfolio</h2>
        <ul class="projets">
          <?php if ($projets) : ?>
          <?php foreach ($projets as $key => $projet) : ?>
          <li class="onglets" data-anim="<?= $key + 1 ?>"> <i class="fas fa-folder"></i><?= $projet->nom() ?></li>
          <?php endforeach; ?>
          <?php endif; ?>
        </ul>
      </div>
      <?php if ($projets) : ?>
      <?php foreach ($projets as $key => $projet) : ?>
      <div class="portfolio__cards contenu <?php if ($key == 0) : echo "activeContenu";
                                                endif; ?> " data-anim="<?= $key + 1 ?>">
        <div class="portfolio__card">
          <div class="portfolio__image">
            <img src="views/assets/image/<?= $projet->image() ?>" alt="img portfolio">
          </div>
          <div class="portfolio__text">
            <h2><?= $projet->nom() ?></h2>
            <p><?= Html::limite_caractere($projet->description()) ?></p>
          </div>
        </div>
        <a href="<?= $projet->lien() ?>" class="portfolio__btn">Découvrez le projet<i
            class="fas fa-angle-double-right"></i></a>
      </div>
      <?php endforeach; ?>
      <?php endif; ?>
    </section>
  </div>
  <!-- cv -->
  <section id="propos" class="main__propos">
    <pre class="code__propos">
<code class="code">
<span class="code__ligne"><span class="code__braket1"></span></span>
<span class="code__ligne">  <span class="code__ligne--vide"> </span></span>
<span class="code__ligne">..<span class="code__var">Nom</span> <span class="code__value"><?= $infos[0]->nom() ?></span> </span>
<span class="code__ligne">..<span class="code__var">Titre</span>  <span class="code__value"><?= $infos[0]->titre() ?></span> </span>
<span class="code__ligne">..<span class="code__var">Email</span><span class="code__value"><?= $infos[0]->mail() ?></span> </span>
<span class="code__ligne">..<span class="code__var">Adresse</span> <span class="code__value"><?= $infos[0]->adress() ?></span> </span>
<span class="code__ligne">  <span class="code__ligne--vide"> </span></span>
<span class="code__ligne">..<span class="code__var">Mes expériences</span> <span class="code__braket1"> </span> </span>
<span class="code__ligne"> <span class="code__ligne--vide"> </span></span>
<?php
foreach ($experiances as $experiance) : ?>
<span class="code__ligne">....<span class="code__cle"><?= $experiance->date_experiance() ?></span> <span class="code__value"><?= $experiance->description_experiance() ?></span> </span>
<?php endforeach; ?>
<span class="code__ligne"><span class="code__braket2"> </span></span>
<span class="code__ligne"> <span class="code__ligne--vide"> </span></span>
<span class="code__ligne">..<span class="code__var">Competences_technique</span> [<?php
                                                                                  foreach ($langages as $langage) : ?>
<span class="code__value"><?= $langage->langage(); ?></span><?php endforeach; ?>] </span>
<span class="code__ligne"> <span class="code__ligne--vide"> </span></span>
<span class="code__ligne">..<span class="code__var">SoftSkils</span> [ </span>
<?php
foreach ($softskills as  $softskill) : ?>
<span class="code__ligne">....<span class="code__value"><?= $softskill->softskills() ?></span> </span>
<?php endforeach; ?>
<span class="code__ligne">..]<span class="code__ligne--vide"> </span></span>
<span class="code__ligne">..<span class="code__var">Education</span> <span class="code__braket1"></span></span>
<span class="code__ligne"> <span class="code__ligne--vide"> </span></span>
<?php foreach ($etudes as  $etude) : ?>
<span class="code__ligne">....<span class="code__cle"><?= $etude->date_etude(); ?></span> <span class="code__value"><?= $etude->description_etude(); ?></span> </span>
<?php endforeach; ?>
<span class="code__ligne"><span class="code__braket2"> </span></span>
<span class="code__ligne"><span class="code__braket2"></span></span>
</code>
</pre>
  </section>
</main>