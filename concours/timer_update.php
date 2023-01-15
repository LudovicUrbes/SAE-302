<?php                      
// Définition des options valides pour le sélecteur
$valid_years = array("2023", "2024", "2025", "2026", "2027", "2028", "2029", "2030");
$valid_months = array("01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12");
$valid_days = array("01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31");
$valid_hours = array("00", "01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23");
$valid_minutes = array("00", "01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31", "32", "33", "34", "35", "36", "37", "38", "39", "40", "41", "42", "43", "44", "45", "46", "47", "48", "49", "50", "51", "52", "53", "54", "55", "56", "57", "58", "59");
$valid_seconds = array("00", "01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31", "32", "33", "34", "35", "36", "37", "38", "39", "40", "41", "42", "43", "44", "45", "46", "47", "48", "49", "50", "51", "52", "53", "54", "55", "56", "57", "58", "59");

// Vérification que la valeur sélectionnée est valide
if (isset($_POST['année'], $_POST['mois'], $_POST['jour'], $_POST['heures'], $_POST['minutes'], $_POST['secondes'])) {
  if (in_array($_POST['année'], $valid_years) && in_array($_POST['mois'], $valid_months) && in_array($_POST['jour'], $valid_days) && in_array($_POST['heures'], $valid_hours) && in_array($_POST['minutes'], $valid_minutes) && in_array($_POST['secondes'], $valid_seconds)) {
    $selected_year = htmlspecialchars($_POST['année'], ENT_QUOTES, 'UTF-8');
    $selected_month = htmlspecialchars($_POST['mois'], ENT_QUOTES, 'UTF-8');
    $selected_day = htmlspecialchars($_POST['jour'], ENT_QUOTES, 'UTF-8');
    $selected_hours = htmlspecialchars($_POST['heures'], ENT_QUOTES, 'UTF-8');
    $selected_minutes = htmlspecialchars($_POST['minutes'], ENT_QUOTES, 'UTF-8');
    $selected_seconds = htmlspecialchars($_POST['secondes'], ENT_QUOTES, 'UTF-8');
  } else {
    // Gestion d'une erreur si la valeur sélectionnée n'est pas valide
    echo "Sélection de date non valide";
    exit();
  }
}

// end date of each phase of the competition
//$fin_envoi = strtotime("$selected_year-$selected_month-$selected_day $selected_hours:$selected_minutes:$selected_seconds");
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

$date1 = date("d/m/Y H:i:s", $fin_envoi);
$date2 = date("d/m/Y H:i:s", $debut_vote);
$date3 = date("d/m/Y H:i:s", $fin_vote);

echo "<br/><br/>fin d'envoi : <strong>$date1</strong> ";
echo "<br/>début des votes : <strong>$date2</strong> ";
echo "<br/>fin des votes : <strong>$date3</strong>";

?>