import confetti from './moduleConfetti.mjs';

  function onClick() {
    confetti({
      particleCount: 150,
      spread: 60
    });
  };

var btn = document.getElementById('logo');

btn.addEventListener("click", onClick);