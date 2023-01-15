// updates the content of the HTML element every second (1000 milliseconds)
setInterval(function() {
  // create a new instance of the XMLHttpRequest object
  var xhttp = new XMLHttpRequest();

  // defines the function to execute when the response is ready
  xhttp.onreadystatechange = function() {
    // check if the answer is ready and valid
    if (this.readyState == 4 && this.status == 200) {
      // retrieve the content of the HTML element
      var temps_restant = document.getElementById("temps_restant");

      // replace the content of the HTML element with the new content
      temps_restant.innerHTML = this.responseText;
    }
  };

  // sends an HTTP GET request to the server to update the timer
  xhttp.open("GET", "timer_update.php", true);
  xhttp.send();
}, 1000);