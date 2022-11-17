<?php 
    // Connexion à la base de données
    try{
      $user="ldalstein_festivalmusique";
      $password="Festival22!";
      $dbh = new PDO('pgsql:host=postgresql-ldalstein.alwaysdata.net dbname=ldalstein_festivalmusique', $user, $password);
    }
    catch(PDOException $e){
      die("erreur de connexion:".$e->getMessage());
    }
    $pseudo = $_POST["pseudo"] ?? NULL;
    $message = $_POST["message"] ?? NULL;

    // Retourne l'adresse IP du visiteur actuel du site.
	// @return string Adresse IP
	
	function get_ip() : string {
        // IP si internet partagé
        if (isset($_SERVER['HTTP_CLIENT_IP'])) {
          return $_SERVER['HTTP_CLIENT_IP'];
        }
        // IP derrière un proxy
        elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
          return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        // Sinon : IP normale
        else {
          return (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : NULL);
        }
      }

    $ip = get_ip();
    // Insertion de la date, du pseudo, du message et de l'ip dans la base de données
    $req="INSERT INTO Livre_or (date_post,pseudo_post,message_post, ip_post) VALUES (now(), :psd, :msg, '$ip')";
    $sth=$dbh->prepare($req);
    $sth->execute([
        'psd' => htmlspecialchars($pseudo),
        'msg' => htmlspecialchars($message)
      ]);                

    // Renvoi à la page d'accueil
    $extra = 'index.php';
    header("Location: $extra");
    exit;
?>