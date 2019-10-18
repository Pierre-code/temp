
function fetch_planets() {
  $.ajax({
    url: '/planets_list',
    type: 'GET',
    success: function(code) {
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
              <button class="btn delete_planet_button" id="delete_planet-${planet.id}">Supprimer</button>
          </td>
          `)
        $(".delete_planet_button").bind('click', delete_planet)
      })
    }
  })
}

function delete_planet(event) {
  event.preventDefault();
  $.post({
    url: `/planet/delete/${event.target.id.split('-')[1]}`,
    success: fetch_planets(),
    async: false,
  });
}

$(".delete_planet_button").click((delete_planet));

$("#add_planet_form").submit(function(event) {
  event.preventDefault();
  let planet_form = $("#planet_name");
  $.post({
    url: '/planet/new',
    data: {"name": planet_form.val()},
    success: fetch_planets(),
    async: false,
  });
});

