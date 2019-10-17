// NE PAS TOUCHER SINON VOUS ALLEZ AVOIR DES BRICOLES !
if (document.getElementById("heat-machine") !== null) {
  let man = document.getElementById("man")
  man.src = "/images/chauffage/chaud.jpg"
  let summary = document.getElementById("summary")
  summary.innerText = "Bien joué, il fait encore un peu chaud, ajoute le ventilateur en face de l'homme maintenant ! Fouille dans le dossier /templates"
  let fan = document.getElementById("fan")
  if (fan !== null) {
    man.src = "/images/chauffage/ok.jpg"
    summary.innerText = "Bien joué, on sait maintenant inclure des partials ! C'est encore un peu trop chaud, il faut " +
      "qu'on agrandisse le ventilateur. Pas de problème, on a déjà créé un fichier de style qui le fait " +
      "automatiquement. Tout ce qu'il nous reste à faire est de charger ce fichier." +
      "Consulter le fichier /assets/app.js et y inclure le fichier scss /assets/sass/3-pages/heating.scss"

    let fanImage = document.getElementById("fan-image");
    if (fanImage.offsetWidth >= 500) {
      summary.innerText = "Parfait, notre ami Carlos est au frais avec ça ! Maintenant il nous reste à incliner le " +
        "ventilateur à notre guise. Pour ça nous avons créé un super script qui permet de le faire. " +
        "Consulter le fichier /assets/app.js et y inclure le fichier scss /assets/js/basics.js. " +
        "Vous devriez voir un nouveau bouton apparaître pour nous permettre de l'incliner."
    }
  }
}
