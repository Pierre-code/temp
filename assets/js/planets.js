
function fetch_planets() {
  $.ajax({
    url: '/planets_list',
    type: 'GET',
    success: function(code) {
      // Mettez le code à exécuter une fois que la requête sera finie.
      // code contient la réponse du serveur, faites console.log(code) pour voir ce qu'il contient !
      $("#planets_list").empty();
      code.forEach(function(planet) {
        $("#planets_list").append(`
          <tr>
            <td>
                ${planet.id}
            </td>
            <td>${planet.name}
            </td>
            <td>
                <button class="btn btn-danger delete_planet_button" id="delete_planet-${planet.id}">Supprimer</button>
            </td>
          </tr>
          `)
        // On redit bien au programme que quand on clique sur les nouveaux boutons on doit déclencher l'événement de suppression
        $(".delete_planet_button").bind('click', delete_planet);
        $(".info_planet_button").bind('hover', info_planet);
      })
    }
  })
}

// C'est la vraie fonction de suppression
function delete_planet(event) {
  event.preventDefault();
  $.post({
    url: `/planet/delete/${event.target.id.split('-')[1]}`,
    success: fetch_planets(),
    async: true,
  });
}

// Ici on dit "quand on clique sur delete_planet_button", on va appeler la fonction delete_planet
// Il faudra faire pareil pour les informations !
$(".delete_planet_button").click((delete_planet));


// Quand on submit l'élément d'id "add_planet_form", alors ...
$("#add_planet_form").submit(function(event) {
  // Voici ce qu'il se passe

  // On empêche le formulaire d'agir normalement, sinon ça nous redirigerait vers une autre page, ce n'est pas ce qu'on veut !
  event.preventDefault();

  // à la place on va lui dire quoi faire ici

  // On récupère le champ "planet_name"
  let planet_name = $("#planet_name");
  let planet_population = $("#planet_population");
  let planet_speciality = $("#planet_speciality");

  $.post({
    url: '/planet/new',
    data: {
      "name": planet_name.val(),
      "population": planet_population.val(),
      "speciality": planet_speciality.val()
    },
    success: fetch_planets(),
    async: false,
  });
});

