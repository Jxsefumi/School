var timeleft = 5;
var downloadTimer = setInterval(function(){
  if(timeleft <= 0){
    clearInterval(downloadTimer);
    document.getElementById("countdown").innerHTML = "Returning...";
  } else {
    document.getElementById("countdown").innerHTML = timeleft + " seconds remaining before heading back to the main page.";
  }
  timeleft -= 1;
}, 1000);

const button = document.getElementById("popup-button");
const overlay = document.getElementById("overlay");
const popup = document.getElementById("popup");

  button.addEventListener("click", function () {
    overlay.style.display = "block";
      popup.style.display = "block";
      });

    overlay.addEventListener("click", function () {
      overlay.style.display = "none";
      popup.style.display = "none";
      });