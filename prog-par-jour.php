<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Programmation par jour - Vercors Music Festival 2022</title>

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
					<a href="index.php" class="nav-link">
						Accueil
					</a>
				</li>
				<li id="nav-liste-artistes" class="nav-item mx-2">
					<a href="liste-artistes.php" class="nav-link">
						Liste des artistes
					</a>
				</li>
				<li id="nav-prog-par-jour" class="nav-item mx-2">
					<a href="prog-par-jour.php" class="nav-link active">
						Programmation par jour
					</a>
				</li>
			</ul>
		</div>
	</header>
	<!-- Contenu principal de la page -->
	<main class="container px-5">
		<h1>Programmation par jour</h1>

		<p class="lead">Cette page affiche la liste des concert par jour du festival 2022 (ordre chronologique).</p>

		<!-- 01/07/2022 -->
		<section class="row my-5">
			<h2 class="text-primary">Vendredi 1 juillet 2022</h2>

			<?php
                $req="select Artiste.id_artiste as artiste, nom_artiste, date_concert, heure_debut_concert, nom_scene, lien_illustration from Concert, Artiste, Scene
				    where date_concert = TO_DATE('01/07/2022','DD/MM/YYYY')
						and Artiste.id_artiste=Concert.id_artiste
						and Concert.id_scene=Scene.id_scene
					order by heure_debut_concert";
                $sth=$dbh->query($req);
                $result=$sth->fetchAll(PDO::FETCH_ASSOC); 
				foreach($result as $row){?>
                <article class="col-lg-3 col-md-4 col-sm-6 my-2">
				<a href="fiche-artiste.php?id=<?php echo $row['artiste']; ?>" class="lien-card">
					<div class="card">
						<img src="<?php echo $row['lien_illustration']; ?>" class="card-img-top" alt="Illustration artiste">
						<div class="card-body">
							<h5 class="card-title"><span class='donnee-bdd gras'> <?php echo $row['nom_artiste']; ?></span></h5>
							<p class="card-text">
								Heure de début : <span class='donnee-bdd'> <?php echo $row['heure_debut_concert']; ?></span><br>
								Scène : <span class='donnee-bdd'><?php echo $row['nom_scene']; ?></span>
							</p>
						</div>
					</div>
				</a>
			</article>
			<?php ;}
            ?>

		</section>

		<!-- 02/07/2022 -->
		<section class="row my-5">
			<h2 class="text-primary">Samedi 2 juillet 2022</h2>
			<?php
                $req="select Artiste.id_artiste as artiste, nom_artiste, date_concert, heure_debut_concert, nom_scene, lien_illustration from Concert, Artiste, Scene
				    where date_concert = TO_DATE('02/07/2022','DD/MM/YYYY')
						and Artiste.id_artiste=Concert.id_artiste
						and Concert.id_scene=Scene.id_scene
					order by heure_debut_concert";
                $sth=$dbh->query($req);
                $result=$sth->fetchAll(PDO::FETCH_ASSOC); 
				foreach($result as $row){?>
                <article class="col-lg-3 col-md-4 col-sm-6 my-2">
				<a href="fiche-artiste.php?id=<?php echo $row['artiste']; ?>" class="lien-card">
					<div class="card">
						<img src="<?php echo $row['lien_illustration']; ?>" class="card-img-top" alt="Illustration artiste">
						<div class="card-body">
							<h5 class="card-title"><span class='donnee-bdd gras'> <?php echo $row['nom_artiste']; ?></span></h5>
							<p class="card-text">
								Heure de début : <span class='donnee-bdd'> <?php echo $row['heure_debut_concert']; ?></span><br>
								Scène : <span class='donnee-bdd'><?php echo $row['nom_scene']; ?></span>
							</p>
						</div>
					</div>
				</a>
			</article>
			<?php ;}
            ?>
		</section>

		<!-- 03/07/2022 -->
		<section class="row my-5">
			<h2 class="text-primary">Dimanche 3 juillet 2022</h2>
			<?php
                $req="select Artiste.id_artiste as artiste, nom_artiste, date_concert, heure_debut_concert, nom_scene, lien_illustration from Concert, Artiste, Scene
				    where date_concert = TO_DATE('03/07/2022','DD/MM/YYYY')
						and Artiste.id_artiste=Concert.id_artiste
						and Concert.id_scene=Scene.id_scene
					order by heure_debut_concert";
                $sth=$dbh->query($req);
                $result=$sth->fetchAll(PDO::FETCH_ASSOC); 
				foreach($result as $row){?>
                <article class="col-lg-3 col-md-4 col-sm-6 my-2">
				<a href="fiche-artiste.php?id=<?php echo $row['artiste']; ?>" class="lien-card">
					<div class="card">
						<img src="<?php echo $row['lien_illustration']; ?>" class="card-img-top" alt="Illustration artiste">
						<div class="card-body">
							<h5 class="card-title"><span class='donnee-bdd gras'> <?php echo $row['nom_artiste']; ?></span></h5>
							<p class="card-text">
								Heure de début : <span class='donnee-bdd'> <?php echo $row['heure_debut_concert']; ?></span><br>
								Scène : <span class='donnee-bdd'><?php echo $row['nom_scene']; ?></span>
							</p>
						</div>
					</div>
				</a>
			</article>
			<?php ;}
            ?>
		</section>
	</main>

	<!-- Inclusion du JS de Bootstrap -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>