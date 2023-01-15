<?php
session_start();                     
// Définition des options valides pour le sélecteur
$valid_years = array("2023", "2024", "2025", "2026", "2027", "2028", "2029", "2030");
$valid_months = array("01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12");
$valid_days = array("01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31");
$valid_hours = array("00", "01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23");
$valid_minutes = array("00", "01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31", "32", "33", "34", "35", "36", "37", "38", "39", "40", "41", "42", "43", "44", "45", "46", "47", "48", "49", "50", "51", "52", "53", "54", "55", "56", "57", "58", "59");
$valid_seconds = array("00", "01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31", "32", "33", "34", "35", "36", "37", "38", "39", "40", "41", "42", "43", "44", "45", "46", "47", "48", "49", "50", "51", "52", "53", "54", "55", "56", "57", "58", "59");

// Vérification que la valeur sélectionnée est valide
if (isset($_POST['année1'], $_POST['mois1'], $_POST['jour1'], $_POST['heures1'], $_POST['minutes1'], $_POST['secondes1'])) {
  if (in_array($_POST['année1'], $valid_years) && in_array($_POST['mois1'], $valid_months) && in_array($_POST['jour1'], $valid_days) && in_array($_POST['heures1'], $valid_hours) && in_array($_POST['minutes1'], $valid_minutes) && in_array($_POST['secondes1'], $valid_seconds)) {
    $selected_year = htmlspecialchars($_POST['année1'], ENT_QUOTES, 'UTF-8');
    $selected_month = htmlspecialchars($_POST['mois1'], ENT_QUOTES, 'UTF-8');
    $selected_day = htmlspecialchars($_POST['jour1'], ENT_QUOTES, 'UTF-8');
    $selected_hours = htmlspecialchars($_POST['heures1'], ENT_QUOTES, 'UTF-8');
    $selected_minutes = htmlspecialchars($_POST['minutes1'], ENT_QUOTES, 'UTF-8');
    $selected_seconds = htmlspecialchars($_POST['secondes1'], ENT_QUOTES, 'UTF-8');
  } else {
    // Gestion d'une erreur si la valeur sélectionnée n'est pas valide
    echo "Sélection de date non valide";
    exit();
  }
}

// Vérification que la valeur sélectionnée est valide
if (isset($_POST['année2'], $_POST['mois2'], $_POST['jour2'], $_POST['heures2'], $_POST['minutes2'], $_POST['secondes2'])) {
  if (in_array($_POST['année2'], $valid_years) && in_array($_POST['mois2'], $valid_months) && in_array($_POST['jour2'], $valid_days) && in_array($_POST['heures2'], $valid_hours) && in_array($_POST['minutes2'], $valid_minutes) && in_array($_POST['secondes2'], $valid_seconds)) {
    $selected_year = htmlspecialchars($_POST['année2'], ENT_QUOTES, 'UTF-8');
    $selected_month = htmlspecialchars($_POST['mois2'], ENT_QUOTES, 'UTF-8');
    $selected_day = htmlspecialchars($_POST['jour2'], ENT_QUOTES, 'UTF-8');
    $selected_hours = htmlspecialchars($_POST['heures2'], ENT_QUOTES, 'UTF-8');
    $selected_minutes = htmlspecialchars($_POST['minutes2'], ENT_QUOTES, 'UTF-8');
    $selected_seconds = htmlspecialchars($_POST['secondes2'], ENT_QUOTES, 'UTF-8');
  } else {
    // Gestion d'une erreur si la valeur sélectionnée n'est pas valide
    echo "Sélection de date non valide";
    exit();
  }
}

// Vérification que la valeur sélectionnée est valide
if (isset($_POST['année3'], $_POST['mois3'], $_POST['jour3'], $_POST['heures3'], $_POST['minutes3'], $_POST['secondes3'])) {
  if (in_array($_POST['année3'], $valid_years) && in_array($_POST['mois3'], $valid_months) && in_array($_POST['jour3'], $valid_days) && in_array($_POST['heures3'], $valid_hours) && in_array($_POST['minutes2'], $valid_minutes) && in_array($_POST['secondes2'], $valid_seconds)) {
    $selected_year = htmlspecialchars($_POST['année3'], ENT_QUOTES, 'UTF-8');
    $selected_month = htmlspecialchars($_POST['mois3'], ENT_QUOTES, 'UTF-8');
    $selected_day = htmlspecialchars($_POST['jour3'], ENT_QUOTES, 'UTF-8');
    $selected_hours = htmlspecialchars($_POST['heures3'], ENT_QUOTES, 'UTF-8');
    $selected_minutes = htmlspecialchars($_POST['minutes3'], ENT_QUOTES, 'UTF-8');
    $selected_seconds = htmlspecialchars($_POST['secondes3'], ENT_QUOTES, 'UTF-8');
  } else {
    // Gestion d'une erreur si la valeur sélectionnée n'est pas valide
    echo "Sélection de date non valide";
    exit();
  }
}

// end date of each phase of the competition
//$fin_envoi = strtotime("$selected_year-$selected_month-$selected_day $selected_hours:$selected_minutes:$selected_seconds");
$fin_envoi = strtotime("2023-01-15 06:44:00");
$debut_vote = strtotime("2023-01-15 06:45:00");
$fin_vote = strtotime("2023-01-18 06:46:00");

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
  $_SESSION['time'] = 1;
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
  $_SESSION['time'] = 2;
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
  $_SESSION['time'] = 3;
} else {
  // returns a message that the contest is over
  echo "Le concours est terminé.<br/>";
  echo "Voici les résultats du concours :<br/>";
  $_SESSION['time'] = 4;
}

$date1 = date("d/m/Y H:i:s", $fin_envoi);
$date2 = date("d/m/Y H:i:s", $debut_vote);
$date3 = date("d/m/Y H:i:s", $fin_vote);

echo "<br/><br/>Fin de la période d'envoi : <strong>$date1</strong> ";
echo "<br/>Début de la période des votes : <strong>$date2</strong> ";
echo "<br/>Résultat du concours : <strong>$date3</strong>";

?>