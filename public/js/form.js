function loadPage(page) {
  var formData = $('#car_filter').serialize(); // Sérialise les données du formulaire

  $.ajax({
    url: '/nos_voitures?page=' + page, // Ajoute le numéro de page à l'URL
    method: 'POST',
    data: formData,
    dataType: 'json',
    success: function (response) {
      var carList = $('#car-list');
      carList.empty();

      response.car.forEach(function (car) {
        var html = '<div class="card m-5 car" style="width: 25rem;">';
        // Ajoute les informations de la voiture au HTML généré
        html += '<img src="../images/cars/' + car.image + '" alt="' + car.brand + ' ' + car.model + '" style="max-width: 10rem;">';
        html += '<div class="card-body">';
        html += '<h3 class="card-title text-center">' + car.brand + ' ' + car.model + '</h3>';
        html += '<p class="card-text text-center">' + car.year + '</p>';
        html += '<p class="card-text text-center">' + car.price + '€</p>';
        html += '<div class="d-flex justify-content-center">';
        html += '<a href="' + car.detailLink + '" class="btn btn-danger stretched-link d-flex justify-content-center" id="car-detail-btn">Détails</a>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        carList.append(html); // Ajoute le HTML de la voiture à la liste des voitures
      });

      var pagination = $('#pagination');
      pagination.empty();
      for (var i = 1; i <= response.totalPages; i++) {
        var link = $('<a></a>')
          .text(i)
          .attr('href', '#')
          .addClass(i == response.currentPage ? 'active' : '')
          .on('click', createPageLoader(i));
        pagination.append(link);
      }
    },
    error: function (xhr, status, error) {
      console.error("Erreur AJAX : " + status + " - " + error);
    }
  });
}

function createPageLoader(page) {
  return function (e) {
    e.preventDefault();
    loadPage(page);
  };
}


$(document).ready(function () {
  $('#car_filter').on('submit', function (e) {
    e.preventDefault();
    loadPage(1);  // Charge la première page lors de la soumission du formulaire
  });
});
