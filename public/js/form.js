$(document).ready(function() {
    $('#car_filter').on('submit', function(e) {
      e.preventDefault(); // Empêche la soumission normale du formulaire
  
      var formData = $(this).serialize(); // Sérialise les données du formulaire
  
      $.ajax({
        url: '/filtered_cars', // L'URL vers votre action de contrôleur
        method: 'POST',
        data: formData,
        dataType: 'json',
        success: function(response) {
            var carList = $('#car-list'); // Sélectionne l'élément contenant la liste des voitures
            carList.empty(); // Vide le contenu de la liste des voitures
        
            // Génère le HTML pour chaque voiture et ajoute-le à la liste des voitures
            response.forEach(function(car) {
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
        },
        error: function(xhr, status, error) {
          // Gérez les erreurs de requête
        }
      });
    });
  });
  