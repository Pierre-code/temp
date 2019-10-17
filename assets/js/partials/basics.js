let fanImage = document.getElementById("fan-image");
if (fanImage.offsetWidth >= 500) {
  let summary = document.getElementById("summary");
  var inclinatorButton = document.createElement("BUTTON");   // Create a <button> element
  inclinatorButton.innerHTML = "Incliner";
  inclinatorButton.classList.add("inclinatorButton");
  inclinatorButton.id = "inclinatorButton";
  inclinatorButton.onclick = function() {
    let inclination = prompt("Quelle inclinaison voulez-vous, amigo ?");
    fanImage.style.transform = `rotate(${inclination}deg)`
  };
  summary.appendChild(inclinatorButton)

  if (document.getElementById("inclinatorButton")) {
    summary.innerText = "Félicitations, vous avez complété l'exercice, vous êtes trop chaud !"
    summary.classList.remove('alert-light');
    summary.classList.add('alert-success');
  }
}
