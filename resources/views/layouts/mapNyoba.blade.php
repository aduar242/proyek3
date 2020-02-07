<script>
    var map;
    var pathCoordinates = Array();
    function initMap() {
        var countryLength
        var mapLayer = document.getElementById("map-layer"); 
        var centerCoordinates = new google.maps.LatLng(28.6139, 77.2090);
        var defaultOptions = { center: centerCoordinates, zoom: 8 }
        map = new google.maps.Map(mapLayer, defaultOptions);
        geocoder = new google.maps.Geocoder();
        <?php
        if (! empty($addresses)) {
      ?>
      countryLength = <?php echo count($addresses); ?>
      <?php
          foreach ($addresses as $address)
          {
      ?>  
           geocoder.geocode( { 'address': '<?php echo $address; ?>' }, function(LocationResult, status) {
                  if (status == google.maps.GeocoderStatus.OK) {
                      var latitude = LocationResult[0].geometry.location.lat();
                      var longitude = LocationResult[0].geometry.location.lng();
                      pathCoordinates.push({lat: latitude, lng: longitude});
                      
                      new google.maps.Marker({
                          position: new google.maps.LatLng(latitude, longitude),
                          map: map,
                          title: '<?php echo $address; ?>'
                      });
                      
                      if(countryLength == pathCoordinates.length) {
                          drawPath();
                      }
                      
                  } 
              });
          <?php
          }
      }
      ?>	
    }
      function drawPath() {
          new google.maps.Polyline({
            path: pathCoordinates,
            geodesic: true,
            strokeColor: '#FF0000',
            strokeOpacity: 1,
            strokeWeight: 4,
            map: map
      });
  }
</script>