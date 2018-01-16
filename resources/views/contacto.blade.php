@extends('layouts.app')

@section('content')
    <div class="titulo_verde wrap_fancy fancy noticias_cotas">
        CONTACTO
    </div>
    <div id="mapa_cotas"></div>


        <!-- The element that will contain our Google Map. This is used in both the Javascript and CSS above. -->
        
        <!-- 
            You need to include this script tag on any page that has a Google Map.

            The following script tag will work when opening this example locally on your computer.
            But if you use this on a localhost server or a live website you will need to include an API key. 
            Sign up for one here (it's free for small usage): 
                https://developers.google.com/maps/documentation/javascript/tutorial#api_key

            After you sign up, use the following script tag with YOUR_GOOGLE_API_KEY replaced with your actual key.
                <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_API_KEY&sensor=false"></script>
        -->
           <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCPaYlWp8Ri2ZgIWKjQ1Qo993_kaAwk0ks&callback=initMap">
    </script>
        <script type="text/javascript">
            // When the window has finished loading create our google map below
           
        
            function initMap() {
                // Basic options for a simple Google Map
                // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
                var mapOptions = {
                    // How zoomed in you want the map to start at (always required)
                    zoom: 17,
                    scrollwheel: false,

                    // The latitude and longitude to center the map (always required)
                    center: new google.maps.LatLng(21.647858, -101.477311), // New York

                    // How you would like to style the map. 
                    // This is where you would paste any style found on Snazzy Maps.
                    styles: [   {       "featureType":"landscape",      "stylers":[         {               "hue":"#FFBB00"         },          {               "saturation":43.400000000000006         },          {               "lightness":37.599999999999994          },          {               "gamma":1           }       ]   },  {       "featureType":"road.highway",       "stylers":[         {               "hue":"#FFC200"         },          {               "saturation":-61.8          },          {               "lightness":45.599999999999994          },          {               "gamma":1           }       ]   },  {       "featureType":"road.arterial",      "stylers":[         {               "hue":"#FF0300"         },          {               "saturation":-100           },          {               "lightness":51.19999999999999           },          {               "gamma":1           }       ]   },  {       "featureType":"road.local",     "stylers":[         {               "hue":"#FF0300"         },          {               "saturation":-100           },          {               "lightness":52          },          {               "gamma":1           }       ]   },  {       "featureType":"water",      "stylers":[         {               "hue":"#0078FF"         },          {               "saturation":-13.200000000000003            },          {               "lightness":2.4000000000000057          },          {               "gamma":1           }       ]   },  {       "featureType":"poi",        "stylers":[         {               "hue":"#00FF6A"         },          {               "saturation":-1.0989010989011234            },          {               "lightness":11.200000000000017          },          {               "gamma":1           }       ]   }]
                };

                // Get the HTML DOM element that will contain your map 
                // We are using a div with id="map" seen below in the <body>
                var mapElement = document.getElementById('mapa_cotas');

                // Create the Google Map using our element and options defined above
                var map = new google.maps.Map(mapElement, mapOptions);

                // Let's also add a marker while we're at it
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(21.647858, -101.477311),
                    map: map,
                    title: 'Cotas Ocampo'
                });
            }
        </script>
@endsection