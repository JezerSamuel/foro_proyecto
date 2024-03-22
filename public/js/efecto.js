function copyEmail() {
  // Get the email element
  var emailElement = document.createElement("textarea");
  emailElement.value = "registro4FIT@upb.edu.mx";
  document.body.appendChild(emailElement);
  emailElement.select();
  document.execCommand("copy");
  document.body.removeChild(emailElement);
  alert("Correo copiado: registro4FIT@upb.edu.mx");
}

// Initial adjustment based on initial scroll position
var scrollPosition = window.scrollY;
var navbar = document.getElementById("navbar");
var newHeight = 200 - scrollPosition * 0.6; // Faster adjustment
navbar.style.height = newHeight + "px";
var navbarHeight = parseInt(getComputedStyle(navbar).height);
var image = document.querySelector("#navbar img");
image.style.height = navbarHeight + "px";

// Scroll event listener
window.addEventListener("scroll", function () {
  var scrollPosition = window.scrollY;
  var navbar = document.getElementById("navbar");
  var newHeight = 200 - scrollPosition * 0.6; // Faster adjustment

  if (scrollPosition > 200) {
    navbar.style.height = newHeight + "px"; // Gradually decrease height
  } else {
    navbar.style.height = 200 - scrollPosition * 0.6 + "px"; // Gradually increase height
  }

  // Adjust image height to cover the navbar
  var navbarHeight = parseInt(getComputedStyle(navbar).height);
  var image = document.querySelector("#navbar img"); // Select the image
  image.style.height = navbarHeight + "px";
});

// Throttle function to limit the frequency of scroll event handler execution
function throttle(func, delay) {
  let lastCalledTime = 0;
  return function () {
    const now = new Date().getTime();
    if (now - lastCalledTime >= delay) {
      func.apply(this, arguments);
      lastCalledTime = now;
    }
  };
}


document.addEventListener("DOMContentLoaded", function () {
  const ponenteField = document.getElementById("ponenteField");
  const expositorField = document.getElementById("expositorField");
  const participanteRadio = document.getElementById("Participante");
  const ponenteRadio = document.getElementById("Ponente");
  const expositorRadio = document.getElementById("Expositor");

  participanteRadio.addEventListener("change", function () {
    console.log("Participante selected");
    ponenteField.style.display = "none";
    expositorField.style.display = "none";
  });

  ponenteRadio.addEventListener("change", function () {
    console.log("Ponente selected");
    ponenteField.style.display = "block";
    expositorField.style.display = "none";
  });

  expositorRadio.addEventListener("change", function () {
    console.log("Expositor selected");
    ponenteField.style.display = "none";
    expositorField.style.display = "block";
  });
});
