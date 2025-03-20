var countdown = 10; // Set the initial countdown time in seconds

function updateTimer() {
  document.getElementById('timer').innerText = 'Redirecting in ' + countdown + ' seconds...';
  countdown--;

  if (countdown < 0) {
    window.location.href = '../index.php'; // Replace 'index.html' with the actual path to your main index page
  } else {
    setTimeout(updateTimer, 1000);
  }
}

// Call the updateTimer function to start the countdown
updateTimer();

function cancelOrder() {
  window.location.href = 'Cancel.html'; // Replace 'cancel.html' with the actual path to your cancel page
}