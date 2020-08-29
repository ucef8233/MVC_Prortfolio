<?php

use App\Models\Html\Form; ?>
<header id="  accueil" class="header">
  <div class="menu">
    <a href=""><img src="views/assets/image/Ysw - Copie.png" alt="Logo Portfolio"></a>
    <i class="animate__animated animate__bounce animate__fast		 animate__repeat-3 fas fa-align-right open"></i>
  </div>
  <div class="container">
    <nav class="nav display">
      <i class="fas fa-times close"></i>
      <div class="nav__links">
        <a href="#accueil">accueil</a>
        <a href="#projet">mes projets</a>
        <a href="#mieu">mieu me connaitre</a>
        <a href="#contact">me contacter</a>
      </div>
    </nav>
    <div class="header__text">
      <h1>Bienvenu sur mon portfolio</h1>
      <blockquote cite="https://citation-celebre.leparisien.fr/citation/web">
        <span>“ </span> Si vous avez un peu de patience, vous découvrirez qu'on peut utiliser les immenses ressources
        du
        Web pour
        perdre
        son temps avec une efficacité que vous n'aviez jamais osé imaginer. <span>„</span>
      </blockquote>
    </div>
    <div class="header__btn">
      <a href="">Portfolio</a>
      <a href="">Mieu me connaitre</a>
    </div>
  </div>
</header>
<main>
  <section id="projet" class="portfolio">
    <div class="portfolio__container">
      <?php
      if ($projets) : ?>
        <?php foreach ($projets as $key => $projet) : ?>
          <article class="block <?php if ($key % 2 == 0) : echo "block__right";
                                else : echo "block__left";
                                endif; ?>">
            <div class=" block__img">
              <img src="views/assets/image/<?= $projet->image() ?>" alt="">
            </div>
            <div class="block__text">
              <h2 class="block__title"><?= $projet->nom() ?></h2>
              <p><?= Form::limite_caractere($projet->description()) ?></p>
              <a href="<?= $projet->lien() ?>">Voir plus</a>
            </div>
          </article>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </section>
  <!-- cv -->
  <section id="mieu" class="main__propos">
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
  <section id="contact" class="contact">
    <div class="contact__container">
      <h2 class="contact__title">Me contacter</h2>
      <form method="POST" class="contact__form">
        <input type="text" name="name_contact" class="field" placeholder="Your Name" required>
        <input type="email" name="mail_contact" class="field" placeholder="Your Email" required>
        <input type="text" name="number_contact" class="field" placeholder="Phone" required>
        <textarea name="message_contact" placeholder="Message" class="field" required></textarea>
        <button type="submit" name="sub_contact" class="btn">Envoyer</button>
      </form>
    </div>
  </section>
</main>