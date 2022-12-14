<?php
// end date of each phase of the competition
$fin_envoi = strtotime("2023-02-19 00:00:00");
$debut_vote = strtotime("2023-02-21 00:00:00");
$fin_vote = strtotime("2023-03-20 00:00:00");

// checks that the end date of the sending phase has not ended
if ($fin_envoi > time()) {
  // calculates the time remaining until the end of the send phase
  $temps_restant = $fin_envoi - time();

  // calculates the number of days, hours, minutes and seconds remaining
  $jours = floor($temps_restant / 86400);
  $heures = floor(($temps_restant % 86400) / 3600);
  $minutes = floor(($temps_restant % 3600) / 60);
  $secondes = $temps_restant % 60;

  // returns the remaining time as a string
  echo "<strong>&#8987 TEMPS RESTANT JUSQU'&#192 LA FIN DE LA PHASE D'ENVOI : $jours J : $heures H : $minutes M : $secondes S &#8987</strong><br/>Après cette date, vous ne pourrez plus uploader de photos ! On passera alors à la phase de vote.";
} elseif ($debut_vote > time()){
  // returns a message indicating that the send phase is complete
  echo "La phase d'envoi est terminée !<br/>";

  // calculates the time remaining until the start of the voting phase
  $temps_restant = $fin_vote - time();

  // calculates the number of days, hours, minutes and seconds remaining
  $jours = floor($temps_restant / 86400);
  $heures = floor(($temps_restant % 86400) / 3600);
  $minutes = floor(($temps_restant % 3600) / 60);
  $secondes = $temps_restant % 60;

  // returns the remaining time as a string
  echo "<strong>&#8987 TEMPS RESTANT AVANT LE D&#201PART DE LA PHASE DE VOTE : $jours J : $heures H : $minutes M : $secondes S &#8987</strong><br/>Vous pourrez alors voter pour votre photo préférée !";
}  elseif ($fin_vote > time()){
  // calculates the time remaining until the end of the voting phase
  $temps_restant = $fin_vote - time();

  // calculates the number of days, hours, minutes and seconds remaining
  $jours = floor($temps_restant / 86400);
  $heures = floor(($temps_restant % 86400) / 3600);
  $minutes = floor(($temps_restant % 3600) / 60);
  $secondes = $temps_restant % 60;

  // returns the remaining time as a string
  echo "<strong>&#8987 TEMPS RESTANT JUSQU'&#192 LA FIN DE LA PHASE DE VOTE : $jours J : $heures H : $minutes M : $secondes S &#8987</strong><br/>Après cette date, vous ne pourrez plus voter ! On vous fournira alors les résultats du concours.";
} else {
  // returns a message that the contest is over
  echo "Le concours est terminé.<br/>";
  echo "Voici les résultats du concours :<br/>";
}
