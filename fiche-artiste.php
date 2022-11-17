<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Fiche artiste - Vercors Music Festival 2022</title>

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
					<a href="prog-par-jour.php" class="nav-link">
						Programmation par jour
					</a>
				</li>
			</ul>
		</div>
	</header>

	<!-- Contenu principal de la page -->
	<main class="container px-5 mb-5">
		<h1>Fiche artiste</h1>

		<?php
			$id = $_GET["id"] ?? NULL;
			$req="select Artiste.id_artiste, nom_artiste, lien_illustration, lien_video_youtube, nom_video, lien_page from Artiste, Video
				where Artiste.id_artiste=Video.id_artiste
					and Artiste.id_artiste = $id";
			$sth=$dbh->query($req);
			$result=$sth->fetchAll();?>
			<h2 class="display-4 text-center fw-bolder"><?php echo $result[0]['nom_artiste'];?></h2>
			<img class="rounded-pill mx-auto d-block my-4" src="<?php echo $result[0]['lien_illustration'] ?>" alt="Illustration de l'artiste Ben Mazué">
			<hr>
			<h3>Vidéo(s) de l'artiste</h3>
			<?php foreach($result as $row){
				$lien_explode = explode("/", $row['lien_video_youtube']);
				$lien_video = $lien_explode[0].'//'.$lien_explode[2].'/'.'embed/'.$lien_explode[3];?>
			<article class="card m-4">
				<div class="card-body">
					<h4><?php echo $row['nom_video'] ?></h4>
					<div class="ratio ratio-16x9 mt-3">
					<iframe src="<?php echo $lien_video ?>" title="<?php echo $row['nom_video'] ?>" allowfullscreen></iframe>
				</div>
				</div>
			</article>
			<?php ;} ?>
			<hr>
			<p class="fst-italic">Pour plus d'informations, vous pouvez aller voir <a href="<?php echo $result[0]['lien_page'] ?>" target="_blank">la page de l'artiste sur le site officiel du festival</a>.</p>

	</main>

	<!-- Inclusion du JS de Bootstrap -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>