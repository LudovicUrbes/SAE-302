<?php
// démarre une session
session_start();

// vérifie si l'utilisateur a les droits d'accès à la page
if ($_SESSION['niveau_acces'] !== 'connected') {
  // l'utilisateur n'a pas les droits d'accès, redirige-le vers une page d'erreur
  header('Location: index.php');
  exit;
}

// l'utilisateur a les droits d'accès, affiche la page

// date de fin de chaque phase du concours (à changer selon vos besoins)
$fin_envoi = strtotime("2023-01-09 23:49:00");
$debut_vote = strtotime("2023-01-09 23:50:00");
$fin_vote = strtotime("2023-01-09 23:51:00");


// vérifie que la date de fin de la phase d'envoi n'est pas terminée
if ($fin_envoi > time()) {
  // calcule le temps restant jusqu'à la fin de la phase d'envoi
  $temps_restant = $fin_envoi - time();

  // calcule le nombre de jours, d'heures, de minutes et de secondes restantes
  $jours = floor($temps_restant / 86400);
  $heures = floor(($temps_restant % 86400) / 3600);
  $minutes = floor(($temps_restant % 3600) / 60);
  $secondes = $temps_restant % 60;

  // renvoie le temps restant sous forme de chaîne de caractères
  echo "<strong>&#8987 TEMPS RESTANT JUSQU'&#192 LA FIN DE LA PHASE D'ENVOI : $jours J : $heures H : $minutes M : $secondes S &#8987</strong><br/>Après cette date, vous ne pourrez plus uploader de photos ! On passera alors à la phase de vote.";
  $timer=1;
  $_SESSION['timer'] = $timer;
  echo "timer=$timer";
} elseif ($debut_vote > time()){
  // renvoie un message indiquant que la phase d'envoi est terminée
  echo "La phase d'envoi est terminée !<br/>";

  // calcule le temps restant jusqu'au début de la phase de vote
  $temps_restant = $debut_vote - time();

  // calcule le nombre de jours, d'heures, de minutes et de secondes restantes
  $jours = floor($temps_restant / 86400);
  $heures = floor(($temps_restant % 86400) / 3600);
  $minutes = floor(($temps_restant % 3600) / 60);
  $secondes = $temps_restant % 60;

  // renvoie le temps restant sous forme de chaîne de caractères
  echo "<strong>&#8987 TEMPS RESTANT AVANT LE D&#201PART DE LA PHASE DE VOTE : $jours J : $heures H : $minutes M : $secondes S</strong><br/>Vous pourrez alors voter pour votre photo préférée !";
  $timer=2;
  $_SESSION['timer'] = $timer;
  echo "timer=$timer";
}  elseif ($fin_vote > time()){
  // calcule le temps restant jusqu'à la fin de la phase de vote
  $temps_restant = $fin_vote - time();

  // calcule le nombre de jours, d'heures, de minutes et de secondes restantes
  $jours = floor($temps_restant / 86400);
  $heures = floor(($temps_restant % 86400) / 3600);
  $minutes = floor(($temps_restant % 3600) / 60);
  $secondes = $temps_restant % 60;

  // renvoie le temps restant sous forme de chaîne de caractères
  echo "<strong>&#8987 TEMPS RESTANT JUSQU'&#192 LA FIN DE LA PHASE DE VOTE : $jours J : $heures H : $minutes M : $secondes S</strong><br/>Après cette date, vous ne pourrez plus voter ! On vous fournira alors les résultats du concours.";
  $timer=3;
  $_SESSION['timer'] = $timer;
  echo "timer=$timer";
} else {
  // renvoie un message indiquant que le concours est terminé
  echo "Le concours est terminé.<br/>";
  echo "Voici les résultats du concours :<br/>";
  $timer=4;
  $_SESSION['timer'] = $timer;
  echo "timer=$timer";
}
?>