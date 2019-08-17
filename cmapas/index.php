<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
    
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="http://nubecolectiva.com/favicon.ico" />

    <meta name="theme-color" content="#000000" />

    <title>Carga de Ubicaciones </title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style type="text/css">
      #mapa {
            height: 200px;
      }
      .h2s {
        font-size: 3vh;
      }
    </style>          

  </head>

  <body> 

    <header>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="http://nubecolectiva.com"><img src="http://nubecolectiva.com/img/logo.png" class="img-fluid"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample07">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
            <a class="nav-link" href="http://nubecolectiva.com">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://blog.nubecolectiva.com" target="_blank">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contacto</a>
          </li> 
          </ul>
          <form name="bencc" method="get" action="http://www.google.com/search" id="bencc" class="form-inline mt-2 mt-md-0" target="_blank">
            <input type="hidden" name="domains" value="blog.nubecolectiva.com">
            <input type="hidden" name="sitesearch" value="blog.nubecolectiva.com">
            <input class="form-control mr-sm-2" type="text" placeholder="Buscar..." aria-label="Buscar...">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" onclick="document.getElementById('bencc').submit()">Buscar</button>
          </form>
        </div>
      </div>
    </nav>
    </header>


    <main role="main">
        <div class="container text-center mt-5">
          <div class="row">
            <div class="col-md-12">

              <p>"Coloca el puntero del Mouse en cada marcador rojo del Mapa para ver la dirección correspondiente"</p>

              <!-- Contenedor del Mapa de Google --> 
              <div id="mapa"></div>               

            </div>
          </div>
          
          <div class="row mt-3">
            <div class="col-md-12">
              <h2 class="h2s">Direcciónes en la Base de Datos MySQL</h2>
              <!-- Archivo PHP con la lógica para mostrar una tabla con las ubicaciones -->
              <?php include('app.php'); ?>               
            </div>            
          </div>  


                               
        </div>
    </main>
    

    <script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTEEF4cVMUmWxLkuEu0YAeVgHNR8PXvu8&callback=initmap"></script>
    </div>

<script type="text/javascript"> 
var Demo = {
  map: null,
  mapContainer: document.getElementById('mapa'),
  sideContainer: document.getElementById('sideContainer'),
  generateLink: document.getElementById('generateLink'),
  numMarkers: 40,
  markers: [],
  visibleInfoWindow: null,
  generateTriggerCallback: function(object, eventType) {
    return function() {
      google.maps.event.trigger(object, eventType);
    };
  },
  openInfoWindow: function(infoWindow, marker) {
    return function() {
      // Close the last selected marker before opening this one.
      if (Demo.visibleInfoWindow) {
        Demo.visibleInfoWindow.close();
      }
      infoWindow.open(Demo.map, marker);
      Demo.visibleInfoWindow = infoWindow;
    };
  },
  clearMarkers: function() {
    for (var n = 0, marker; marker = Demo.markers[n]; n++) {
      marker.setVisible(false);
    }
  },
  generateRandomMarkers: function(center) {
    // Populate side bar.
    var avg = {
      lat: 0,
      lng: 0
    };
    var ul = Demo.sideContainer;
    ul.style.width = 200 + 'px';
    ul.style.height = Demo.map.getDiv().offsetHeight + 'px';
    // Clear list and map markers.
    ul.innerHTML = '';
    Demo.clearMarkers();
    for (var n = 1; n <= Demo.numMarkers; n++) {
      var html = 'Opening marker #' + n;
      // Place markers on map randomly.
      var randX = Math.random();
      var randY = Math.random();
      randX *= (randX * 1000000) % 2 == 0 ? 1 : -1;
      randY *= (randY * 1000000) % 2 == 0 ? 1 : -1;
      var randLatLng = new google.maps.LatLng(
          center.lat() + (randX * 0.1),
          center.lng() + (randY * 0.1));
      var marker = new google.maps.Marker({
        map: Demo.map,
        title: 'Marker #' + n,
        position: randLatLng,
        draggable: true
      });
      Demo.markers.push(marker);
      // Create marker info window.
      var infoWindow = new google.maps.InfoWindow({
        content: [
          '<h3 style="">',
          'Marker #' + n,
          '</h3>',
          'Located at:',
          '<div style="font-size: 0.8em;">',
          randLatLng.lat() + ', ' + randLatLng.lng(),
          '</div>'
        ].join(''),
        size: new google.maps.Size(200, 80)
      });
      // Add marker click event listener.
      google.maps.event.addListener(
          marker, 'click', Demo.openInfoWindow(infoWindow, marker));
      // Generate list elements for each marker.
      var li = document.createElement('li');
      var aSel = document.createElement('a');
      aSel.href = 'javascript:void(0);';
      aSel.innerHTML = 'Open Marker #' + n;
      aSel.onclick = Demo.generateTriggerCallback(marker, 'click');
      li.appendChild(aSel);
      ul.appendChild(li);
      // Sum up all lat/lng to calculate center all points.
      avg.lat += randLatLng.lat();
      avg.lng += randLatLng.lng();
    }
    // Center map.
    Demo.map.setCenter(new google.maps.LatLng(
        avg.lat / Demo.numMarkers, avg.lng / Demo.numMarkers));
  },
  init: function() {
    var firstLatLng = new google.maps.LatLng(37.4419, -122.1419);
    Demo.map = new google.maps.Map(Demo.mapContainer, {
      zoom: 12,
      center: firstLatLng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });
    // Show generate link only after map tiles finish loading.
    google.maps.event.addListener(Demo.map, 'tilesloaded', function() {
      Demo.generateLink.style.display = 'block';
    });
    // Add onclick handler to generate link.
    google.maps.event.addDomListener(Demo.generateLink, 'click', function() {
      Demo.generateRandomMarkers(Demo.map.getCenter());
    });
    // Generate markers against map center.
    google.maps.event.trigger(Demo.generateLink, 'click');
  }
};
google.maps.event.addDomListener(window, 'load', Demo.init, Demo);
 </script>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </body>

  </html>