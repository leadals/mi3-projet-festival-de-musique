<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Accueil - Vercors Music Festival 2022</title>

  <!-- Inclusion du Favicon du site -->
  <link rel="icon" type="image/x-icon" href="images/favicon-VMF.svg">
  <!-- Inclusion du CSS de Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

  <style>
    /* CSS custom */
    :root {
      --bs-border-width: 2px;
    }

    .donnee-bdd {
      color: #427b73;
      font-size: 1.1em;
    }

    .gras {
      font-weight: bold;
    }

    a.lien-card {
      color: var(--bs-body-color);
      text-decoration: none;
    }

    label.required:after {
      content: " *";
      color: red;
    }
  </style>
</head>

<body>
<!-- Connexion à la base de données -->
<?php 
    try{
      $user="ldalstein_festivalmusique";
      $password="Festival22!";
      $dbh = new PDO('pgsql:host=postgresql-ldalstein.alwaysdata.net dbname=ldalstein_festivalmusique', $user, $password);
    }
    catch(PDOException $e){
      die("erreur de connexion:".$e->getMessage());
    }
?>
  <!-- En-tête avec barre de navigation -->
  <header class="container">
    <div class="d-flex flex-wrap justify-content-center px-4 py-3 mb-4 border-bottom">
      <!-- Partie de gauche (Nom du site) -->
      <a id="lien-en-tete" href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-secondary text-decoration-none">
        <span class="fs-4 fw-bold">Vercors Music Festival 2022</span>
      </a>

      <!-- Partie de droite (Menu de navigation) -->
      <ul class="nav nav-pills">
        <li id="nav-accueil" class="nav-item mx-2">
          <a href="index.php" class="nav-link active"> Accueil </a>
        </li>
        <li id="nav-liste-artistes" class="nav-item mx-2">
          <a href="liste-artistes.php" class="nav-link">
            Liste des artistes
          </a>
        </li>
        <li id="nav-prog-par-jour" class="nav-item mx-2">
          <a href="prog-par-jour.php" class="nav-link">
            Programmation par jour
          </a>
        </li>
      </ul>
    </div>
  </header>

  <!-- Contenu principal de la page -->
  <main class="container px-5 mb-5">
    <h1>Récapitulatif de la programmation du festival 2022</h1>

    <p class="lead">
      Cette page affiche un récapitulatif de la programmation du
      <span class="fw-bolder">Vercors Music Festival 2022</span>.
    </p>

    <img src="images/vercors-music-festival-2022-banniere.png" style="display: block; margin: auto; width: 90%; max-width: 600px" alt="Bannière du Vercors Music Festival 2022">

    <section id="principale" class="row my-3">
      <!-- 1ère Card -->
      <article class="col-lg-6 col-sm-12 my-2">
        <div class="card">
          <h5 class="card-header">3 jours de concerts</h5>
          <div class="card-body">
            <ul>
              <!-- 01/07/2022 -->
              <li>
                Vendredi 1er juillet 2022 :
                <span class="donnee-bdd gras">
                <!-- Récupération du nombre de concerts du 1er juillet 2022 -->
                <?php
                  $req="select count(*) as nbconcert from Concert
                  where date_concert = TO_DATE('01/07/2022','DD/MM/YYYY')";
                  $sth=$dbh->query($req);
                  $result=$sth->fetchAll(PDO::FETCH_ASSOC); 
                  echo $result[0]['nbconcert'];                  
                ?>
                </span> concerts à partir de
                <span class="donnee-bdd gras">
                <!-- Récupération de l'heure de début du 1er concert du 1er juillet 2022 -->
                <?php
                  $req="select min(heure_debut_concert) as debut from Concert
                  where date_concert = TO_DATE('01/07/2022','DD/MM/YYYY')";
                  $sth=$dbh->query($req);
                  $result=$sth->fetchAll(PDO::FETCH_ASSOC); 
                    echo $result[0]['debut'];
                ?>
                </span>
              </li>

              <!-- 02/07/2022 -->
              <li>
                Samedi 2 juillet 2022 :
                <span class="donnee-bdd gras">
                <!-- Récupération du nombre de concerts du 2 juillet 2022 -->
                <?php
                  $req="select count(*) as nbconcert from Concert
                  where date_concert = TO_DATE('02/07/2022','DD/MM/YYYY')";
                  $sth=$dbh->query($req);
                  $result=$sth->fetchAll(PDO::FETCH_ASSOC); 
                  echo $result[0]['nbconcert'];                  
                ?>
                </span> concerts à partir de
                <span class="donnee-bdd gras">
                <!-- Récupération de l'heure de début du 1er concert du 2 juillet 2022 -->
                <?php
                  $req="select min(heure_debut_concert) as debut from Concert
                  where date_concert = TO_DATE('02/07/2022','DD/MM/YYYY')";
                  $sth=$dbh->query($req);
                  $result=$sth->fetchAll(PDO::FETCH_ASSOC); 
                    echo $result[0]['debut'];
                ?>
                </span>
              </li>

              <!-- 03/07/2022 -->
              <li>
                Dimanche 3 juillet 2022 :
                <span class="donnee-bdd gras">
                <!-- Récupération du nombre de concerts du 3 juillet 2022 -->
                <?php
                  $req="select count(*) as nbconcert from Concert
                  where date_concert = TO_DATE('03/07/2022','DD/MM/YYYY')";
                  $sth=$dbh->query($req);
                  $result=$sth->fetchAll(PDO::FETCH_ASSOC); 
                  echo $result[0]['nbconcert'];                  
                ?>
                </span> concerts à partir de
                <span class="donnee-bdd gras">
                <!-- Récupération de l'heure de début du 1er concert du 3 juillet 2022 -->
                <?php
                  $req="select min(heure_debut_concert) as debut from Concert
                  where date_concert = TO_DATE('03/07/2022','DD/MM/YYYY')";
                  $sth=$dbh->query($req);
                  $result=$sth->fetchAll(PDO::FETCH_ASSOC); 
                    echo $result[0]['debut'];
                ?>
                </span>
              </li>
            </ul>
          </div>
        </div>
      </article>

      <!-- 2ème Card -->
      <article class="col-lg-6 col-sm-12 my-2">
        <div class="card">
          <h5 class="card-header">3 scènes sur le plateau du Vercors</h5>
          <div class="card-body">
            <ul>
              
                <span class="donnee-bdd">
                <!-- Récupération du nom des différentes scènes, de leur code postal ainsi que leur ville -->
                <?php
                  $req="select nom_scene, code_postal, ville from Scene";
                  $sth=$dbh->query($req);
                  $result=$sth->fetchAll(); 
                  foreach ($result as $row){
                    echo '<li><b>' . $row['nom_scene']. '</b> ('.
                    $row['code_postal'].' '. $row['ville'].
                    ')</li>';
                  };
                ?>
            </ul>
          </div>
        </div>
      </article>
    </section>

    <hr style="margin: 25px -20px" class="border border-1 opacity-100">

    <section id="livre-or">
      <h2 class="mb-3">Livre d'or du festival 2022</h2>
      <p>
        Vous avez participé au festival et vous avez (fortement) apprécié ?
        Laissez donc un message dans le
        <span class="fw-bolder">Livre d'or</span> !
      </p>

      <div class="card mb-4">
        <h5 class="card-header">Laisser un message dans le Livre d'or</h5>
        <form class="card-body" action="ajout-message-livre-or.php" method="post">
          <div class="mb-3 row">
            <label class="col-md-2 col-form-label required">Pseudo</label>
            <div class="col-md-10">
              <input name="pseudo" type="text" class="form-control" size="50" required>
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-md-2 col-form-label required">Message</label>
            <div class="col-md-10">
              <textarea name="message" class="form-control" rows="2" maxlength="200" required></textarea>
            </div>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary">
              Enregistrer votre message dans le livre d'or
            </button>
          </div>
        </form>
      </div>

      <div class="card">
        <h5 class="card-header">Les 5 derniers messages du Livre d'or</h5>
        <div class="card-body text-center">
          <figure>
          <blockquote class="blockquote">
            <!-- Récupération des 5 derniers messages du livre d'or, avec le pseudo de leur auteur ainsi que la date du post, avec le post le plus récent en tête de liste -->
              <?php
                $req="select message_post, date_post, pseudo_post from Livre_or
                order by date_post desc  LIMIT 5";
                $sth=$dbh->query($req);
                $result=$sth->fetchAll(); 
                foreach ($result as $row){
                  echo "<blockquote class='blockquote'>".$row['message_post']; ?></blockquote>
                  <figcaption class="blockquote-footer">
                    <b>
                      <?php
                      echo $row['pseudo_post'].'</b> '.$row['date_post'];
                      ?>
                  </figcaption><?php
                };
              ?>
            </blockquote>
          </figure>
        </div>
      </div>
    </section>
  </main>

  <!-- Inclusion du JS de Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>