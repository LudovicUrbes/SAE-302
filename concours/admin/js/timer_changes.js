// met à jour le contenu de l'élément HTML toutes les secondes (1000 millisecondes)
setInterval(function() {
  // crée une nouvelle instance de l'objet XMLHttpRequest
  var xhttp = new XMLHttpRequest();

  // définit la fonction à exécuter lorsque la réponse est prête
  xhttp.onreadystatechange = function() {
    // vérifie si la réponse est prête et valide
    if (this.readyState == 4 && this.status == 200) {
      // récupère le contenu de l'élément HTML
      var temps_restant = document.getElementById("temps_restant");

      // remplace le contenu de l'élément HTML par le nouveau contenu
      temps_restant.innerHTML = this.responseText;
    }
  };

  // envoie une requête HTTP GET au serveur pour mettre à jour le timer
  xhttp.open("GET", "timer_update.php", true);
  xhttp.send();
}, 1000);